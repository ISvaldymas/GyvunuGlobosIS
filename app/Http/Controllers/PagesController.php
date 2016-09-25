<?php
namespace App\Http\Controllers;

class PagesController extends Controller
{
	public function getIndex() {return view("KambariuRezervacija.index");}
	public function home() {return view("KambariuRezervacija.index");}
}