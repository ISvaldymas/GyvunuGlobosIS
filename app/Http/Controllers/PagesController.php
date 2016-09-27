<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
	public function getIndex() {return view("KambariuRezervacija.index");}

	public function home() {
		if(Auth::user()->state->id == 2)
			return redirect('/registration');
		return view("KambariuRezervacija.index");
	}
}