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
use Storage;
use App\Room;
use App\Rate;
use App\RatedRooms;
use App\RoomType;
use App\StarsValue;
use App\Amenities;
use App\AmenityRooms;


class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            if( Auth::user()->Role->id == 1)
            {
            $cat=Amenities::all();
            $cat1=Amenities::count('id');
            $data = array(
                'cat' => $cat,
                'cat1' =>$cat1+1,
            );
            Session::flash('success', 'Patogumas pridėtas į sąrašą');
            return view('amenities.create')->with('data',$data);
            }
        }else{ 
                return redirect('/rooms');
             }
}

    public function store(Request $request)
    {
        if(Auth::check()){
            if(Auth::user()->Role->id == 1)
            {  
                $this->validate($request, array(
                'name'      =>  'required|max:255'
                ));

                $v = Validator::make($request->all(), []);  
                if(Amenities::where('name', $request->input('name'))->exists())
                {
                    Session::flash('warning', 'Patogumas jau egzistuoja');
                    return redirect()->back()->withErrors($v->errors())->withInput();
                } 
                $amenity = new Amenities;
                $amenity->name = $request->name;
                $amenity->save();     
                Session::flash('success', 'Patogumas pridėtas į sąrašą');
                return redirect()->route('amenities.create');
            }
        }else{ return redirect('/rooms');}
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $amenity = Amenities::find($id);
        $amenity_room = AmenityRooms::where('amenity_id',$amenity->id)-> count();
        if($amenity_room != NULL)
        {
            Session::flash('warning', 'Patogumas negali būti pašalintas! Jis yra naudojamas');
        }else{
            $amenity -> delete();
            Session::flash('succsess', 'Patogumas pašalintas'); 
        }

        return redirect()->route('amenities.create');
    }
}
