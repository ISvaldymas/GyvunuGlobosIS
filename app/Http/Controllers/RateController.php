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

use App\Room;
use App\Rate;
use App\RatedRooms;
use App\StarsValue;
use Session;

class RateController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $room_id)
    {
        $value_id = StarsValue::where('value', $request->input('value_id')) -> first()-> id;
        $this->validate($request, array(
            'name'      =>  'required|max:255',
            'email'     =>  'required|email|max:255',
            'comment'   =>  'required|min:5|max:2000',
            'value_id'  =>  'required',
            'photo_fk'  =>  'required',
            ));

        $room = Room::find($room_id);

        $comment = new Rate();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->value_id = $request->value_id;
        $comment->photo_fk = $request->photo_fk;
        $comment->approved = true;
        $comment->room()->associate($room);

        $comment->save();

        $comment1 = Rate::find( $comment->id);        

        //$fcomment = Rate::find($rate_id);

        $rated = new RatedRooms();   
        $rated->room()->associate($room);
        $rated->rate()->associate($comment1);

        $rated->save();


        Session::flash('success', 'Įvertinimas pridėtas');

        return redirect() -> route('rooms.show',$room->id);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
