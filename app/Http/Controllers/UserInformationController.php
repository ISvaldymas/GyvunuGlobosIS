<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AgeGroup;
use App\UserInformation;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
        	$location = public_path('database/users/' . Auth::user()->id . '/' . $filename);
        	File::makeDirectory(public_path('database/users/' . Auth::user()->id));
        	$img = Image::make($avatar)->resize(250, 250)->save($location);

        	//database
        	$photo = new Photo;
        	$photo->url 	= 'database/users/' . Auth::user()->id . '/' . $filename;
        	$photo->ext 	= $ext;
        	$photo->size 	= $img->filesize();
        	$photo->cover 	= 1;
        	$photo->save();
                $UserInformation -> photo_fk = $photo->id;
        }
        $UserInformation -> save();
        Auth::user()->state_fk = 1;
        Auth::user()->information_fk = $UserInformation->id;
        Auth::user()->save();
        $message = "Registracija baigta. Dėkojame, kad naudojatės Kambarių rezervacijos sistema.";
        Session::flash('succsess', $message);
		return redirect('/home');
	} 

    public function edit($id)
    {
        if(Auth::check() && $id == Auth::user()->id)
        {
            return view('KambariuRezervacija.profile')->with('data', AgeGroup::all());
        }
        else
        {
            return redirect('/home');
        }
        
    }

    public function update(Request $request, $id)
    {

    }
}
