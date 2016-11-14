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
use App\RoomType;



class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$rooms = Room::all();
        $rooms = Room::rightJoin('room_types', 'room_types.id', '=', 'rooms.room_type_fk')
        ->selectRaw('rooms.*, room_types.name as types')->get();

        
        $data = array(
            'rooms' => $rooms,
           // 'types' => $types,
            'count'    => Room::count(),
        );
   
          return view('rooms.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        return view('rooms.create')->with('data', RoomType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room_type_fk = RoomType::where('name', $request->input('room_type_fk')) -> first()-> id;
        //validate the data
        $this->validate($request,array(
            'number'        => 'required|max:3',
            'price'         => 'required|max:4',
            'body'          => 'required|max:255',
            'room_type_fk'  => 'required',
            'room_image'        => 'sometimes|image'
            
            ));

        // store in the database
        $room = new Room;

        $room -> number       = $request -> number;
        $room -> price        = $request -> price;
        $room -> body         = $request -> body;
        $room-> room_type_fk   = $room_type_fk;
          
        //save image
        if($request->hasFile('room_image')){
            $room_image = $request->file('room_image');
            $ext = $room_image->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $location = public_path('database/rooms/'. $filename);
            File::isDirectory(public_path('database/rooms/')) or File::makeDirectory(public_path('database/rooms/'), 0777, true, true);
            //File::makeDirectory(public_path('database/rooms/'));
            $img = Image::make($room_image)->resize(250, 250)->save($location);

            //database
            $photo = new Photo;
            $photo->url     = 'database/rooms/' . $filename;
            $photo->ext     = $ext;
            $photo->size    = $img->filesize();
            $photo->cover   = 1;
            $photo->save();
            $room -> photo_fk = $photo->url;
        }

        $room -> save();

        Session::flash('succsess', 'Naujas kambarys pridėtas.');
        //redirect to another page
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
        
        return view('rooms.show')->with('room',Room::find($id));
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
        $room = Room::find($id);
         $cat = array();
        foreach(RoomType::all() as $ct){$cat[]= $ct -> name;}

            $data = array(
                'room' => $room,
                'cat' => $cat,
            );
           return view('rooms.edit')->with('data',$data);
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
        // Validate the data
        $this->validate($request,array(
            'number'        => 'required|max:3',
            'price'         => 'required|max:4',
            'body'          => 'required|max:255',
            'room_type_fk'  => 'required',
            'room_image'    => 'image'
            ));

        // Save to the database
        $room = Room::find($id);

        $room -> number       = $request -> input('number');
        $room -> price        = $request -> input('price');
        $room -> body         = $request -> input('body');
        $room-> room_type_fk   = $request -> input('room_type_fk');


            $photo;
            if($request->hasFile('room_image'))
            {
            $room_image = $request->file('room_image');
            $ext = $room_image->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $location = public_path('database/rooms/'. $filename);
            //File::makeDirectory(public_path('database/rooms/'));
            $img = Image::make($room_image)->resize(250, 250)->save($location);
            $oldFilename = $room->photo_fk;
            //update
            $room->photo_fk = 'database/rooms/'. $filename;
             //$room -> photo_fk = $img -> url;
            //delete
            File::delete(public_path($oldFilename));

            }
        
          $room -> save();
        //set flash data with success message
          Session::flash('succsess', 'Informacija atnaujinta');
        // redirect wth flash data to rooms.show
          return redirect() -> route('rooms.show',$room->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id2)
    {
        //
        $room = Room::find($id2);
        if($room->photo_fk != NULL){

        $id = Photo::where('url', $room->photo_fk) -> first() -> id;
        $photo = Photo::find($id);
        $photo -> delete();
        File::delete(public_path($room->photo_fk));
        $room->delete();    
        }else{$room->delete(); }


        Session::flash('succsess', 'Kambarys pašalintas');
        return redirect()->route('rooms.index');
    }
}
