<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AgeGroup;
use App\UserInformation;
use Illuminate\Support\Facades\Auth;
use Session;

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
	        'phone'      		 => 'required|max:20|min:9',
	        'adress'        	 => 'required|max:200|min:5',
	        'age_group_fk'       => 'required',
	         $newsletter_fk         => 'integer',
	    ));

        $UserInformation = new UserInformation;
        $UserInformation->name = $request -> name;
        $UserInformation->lastname = $request -> lastname;
        $UserInformation->phone = $request -> phone;
        $UserInformation->adress = $request -> adress;
        $UserInformation->age_group_fk = $age_group_fk;
        $UserInformation->newsletter_fk = $newsletter_fk;
        $UserInformation->user_id_fk = Auth::user()->id;
        $UserInformation -> save();
        Auth::user()->state_fk = 1;
        Auth::user()->save();
        $message = "Registracija baigta. Dėkojame, kad naudojatės Kambarių rezervacijos sistema.";
        Session::flash('succsess', $message);
		return redirect('/home');
	} 
}
