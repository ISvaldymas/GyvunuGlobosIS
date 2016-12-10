<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AgeGroup;
use App\UserInformation;
use App\Photo;
use App\User;
use App\EmailConfirm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Session;
use Image;

class UserInformationController extends Controller
{
	public function registration()
	{
		return view('KambariuRezervacija.registration')->with('data', AgeGroup::all());
	}   

	public function store(Request $request)
	{
		$age_group_fk = AgeGroup::where('name', $request->input('age_group_fk')) -> first()->id;
		$newsletter_fk;
	    if($request->input('newsletter_fk')) $newsletter_fk=1; else $newsletter_fk=0;

	    $this -> validate($request, array(
	        'name'          	 => 'required|max:50|min:5',
	        'lastname'   		 => 'required|max:50|min:5',
	         (int)$age_group_fk  => 'integer',
	        'phone'      		 => 'required|max:20|min:9|regex:/^(\+370)/',
	        'adress'        	 => 'required|max:200|min:5',
	        'age_group_fk'       => 'required',
	         $newsletter_fk      => 'integer',
                 'avatar'        => 'sometimes|image',
	    ));

        $staffID = Session::get('staffID', null);
        $user = Auth::user();
        if($staffID){ $user = User::find($staffID); }

        $UserInformation = new UserInformation;
        $UserInformation->name = $request -> name;
        $UserInformation->lastname = $request -> lastname;
        $UserInformation->phone = $request -> phone;
        $UserInformation->adress = $request -> adress;
        $UserInformation->age_group_fk = $age_group_fk;
        $UserInformation->newsletter_fk = $newsletter_fk;

        if($request->hasFile('avatar')){
        	$avatar = $request->file('avatar');
        	$ext = $avatar->getClientOriginalExtension();
        	$filename = time(). '.' . $ext;
        	$location = public_path('database/users/' . $user->id . '/' . $filename);
        	File::makeDirectory(public_path('database/users/' . $user->id));
        	$img = Image::make($avatar)->resize(250, 250)->save($location);

        	//database
        	$photo = new Photo;
        	$photo->url 	= 'database/users/' . $user->id . '/' . $filename;
        	$photo->ext 	= $ext;
        	$photo->size 	= $img->filesize();
        	$photo->cover 	= 1;
        	$photo->save();
            $UserInformation -> photo_fk = $photo->id;
        }
        $UserInformation -> save();
        $user->state_fk = 1;
        $user->information_fk = $UserInformation->id;
        $user->save();
        if($user != Auth::user())
        {
            $message = "Darbuotojas sėkmingai priregistruotas";
            Session::flash('succsess', $message);
            return redirect('/staff');   
        }
        $message = "Registracija baigta. Dėkojame, kad naudojatės Kambarių rezervacijos sistema.";
        Session::flash('succsess', $message);
		return redirect('/home');
	} 

    public function edit($id)
    {
        if(Auth::check() && $id == Auth::user()->id || Auth::user()->Role->id == 1)
        {
            $data = array(
                'user' => User::find($id),
                'age_groupes'       => AgeGroup::all(),
                'confirmed_emails'  => EmailConfirm::where('user_fk', $id)->where('state_fk', 1)->get(),
            );
            return view('KambariuRezervacija.profile')->with('data', $data);
        }
        else
        {
            return redirect('/home');
        }
        
    }

    public function update(Request $request, $id)
    {
        $age_group_fk = AgeGroup::where('name', $request->input('age_group_fk')) -> first()->id;
        $newsletter_fk;
        if($request->input('newsletter_fk')) $newsletter_fk=1; else $newsletter_fk=0;
            $this -> validate($request, array(
            'email'              => 'required|max:255|min:5|email',
            'name'               => 'required|max:50|min:5',
            'lastname'           => 'required|max:50|min:5',
             (int)$age_group_fk  => 'integer',
            'phone'              => 'required|max:20|min:9|regex:/^(\+370)/',
            'adress'             => 'required|max:200|min:5',
            'age_group_fk'       => 'required',
             $newsletter_fk      => 'integer',
                 'avatar'        => 'sometimes|image',
            'new_password'       => 'sometimes|confirmed',
        ));

        $v = Validator::make($request->all(), []);
        $user = User::find($id);

        if(!$request->has('old_password') && $request->has('new_password'))
        {
            $v->errors()->add('old_password', 'Neįvestas senas slaptažodis.');
            return redirect()->back()->withErrors($v->errors())->withInput();
        }else if ($request->has('old_password') && !$request->has('new_password'))
        {
            $v->errors()->add('new_password', 'Neįvestas naujas slaptažodis.');
            return redirect()->back()->withErrors($v->errors())->withInput();
        }else if($request->has('old_password') && $request->has('new_password') && $request->input('old_password') == $request->input('new_password')){
            $v->errors()->add('new_password', 'Naujas ir senas slaptažodžiai negali būti vienodi.');
            return redirect()->back()->withErrors($v->errors())->withInput();
        }else if($request->has('old_password') && $request->has('new_password'))
        {
            if(!Hash::check($request->input('old_password'), Auth::user()->getAuthPassword()))
            {
                $v->errors()->add('old_password', 'Neteisingas senas slaptažodis.');
                return redirect()->back()->withErrors($v->errors())->withInput();
            }else
            {
                $user->password = Hash::make($request->input('new_password'));
            }
        }

        //Patikrinti emaila:(naujas)
        if(!EmailConfirm::where('email', $request->input('email'))->where('user_fk', $id)->first())
        {
            //patikrinti ar unikalus emailas:
            if(EmailConfirm::where('email', $request->input('email'))->exists())
            {
                $v->errors()->add('email', 'El. paštas jau egzistuoja.');
                return redirect()->back()->withErrors($v->errors())->withInput();
            }else
            {
                $token = hash_hmac('sha256', uniqid(), Str::random(40));
                $data = array(
                    'user'  => $user,
                    'token'  => $token,
                    'email'  => $request->input('email'),
                );
                $new_email = new EmailConfirm;
                $new_email->email = $request->input('email');
                $new_email->token = $token;
                $new_email->state_fk = 2;
                $new_email->user_fk = $id;
                $user->state_fk = 4;
                $new_email->save();
                $user->email = $request->input('email');

                Mail::send('Auth.emails.confirm', $data, function ($message) use ($data){
                    $message->from('kambariurezervacija@gmail.com', 'Informaciniai pagrindai');
                    $message->to($data['email'])->subject('Kambarių rezervacija - el. pašto patvirtinimas:');
                });

            }
        }else
        {
            $user->email = $request->input('email');
        }

        //Pakeisti duomenis:
        $information = UserInformation::find($user->information_fk);

        $information->name          = $request -> input('name');
        $information->lastname      = $request -> input('lastname');
        $information->age_group_fk  = $age_group_fk;
        $information->phone         = $request -> input('phone');
        $information->adress        = $request -> input('adress');
        $information->newsletter_fk = $newsletter_fk;

        if($request->hasFile('avatar')){
            $avatar     = $request->file('avatar');
            $ext        = $avatar->getClientOriginalExtension();
            $filename   = time(). '.' . $ext;
            $location   = public_path('database/users/' . $id . '/' . $filename);

            //Patikrinti ar turi nuotrauka:
            $photo;
            if(Photo::where('id', $user->user_information->photo_fk)->exists())
            {
                $photo = Photo::find($user->user_information->photo->id);
            }else
            {
                $photo = new Photo;
            }


            if(!File::exists(public_path('database/users/' . $id))) {
                File::makeDirectory(public_path('database/users/' . $id));
            }else
            {
                File::delete(public_path($photo->url));
            }

            $img = Image::make($avatar)->resize(250, 250)->save($location);

            $photo->url     = 'database/users/' . $id . '/' . $filename;
            $photo->ext     = $ext;
            $photo->size    = $img->filesize();
            $photo->cover   = 1;
            $photo->save();
            $information -> photo_fk = $photo->id;
        }
        $information -> save();
        $user->save();
        $message = "Informacija sėkmingai atnaujinta.";
        Session::flash('succsess', $message);
        return redirect()->back();
    }
}
