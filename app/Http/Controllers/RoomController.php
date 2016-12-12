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

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        $data = array(
            'rooms'    => $rooms,
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
        //tikrinu ar vartotojos prisijunges
        if(Auth::check()){
        if(Auth::user()->Role->id == 1)
        {
        foreach(RoomType::all() as $ce){$room[]= $ce -> name;}
        foreach(Amenities::all() as $ct){$cat[]= $ct; }
            $data = array(
                'room' => $room,
                'cat' => $cat,
            );
        return view('rooms.create')->with('data', $data);
        }
        }
       return redirect('/rooms');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //tikrinu ar vartotojas prisijunges
        if(Auth::check()){
        if(Auth::user()->Role->id == 1)
        {
        //validate the data
        $this->validate($request,array(
            'number'        => 'required|max:3',
            'price'         => 'required|max:4',
            'body'          => 'required',
            'room_type_fk'  => 'required',
            'room_image'    => 'sometimes|image'
            
            ));
            //tikrinu ar kambario numeris neegzistuoja
            $v = Validator::make($request->all(), []);  
            if(Room::where('number', $request->input('number'))->exists())
            {
                Session::flash('warning', 'Kambario numeris jau egzistuoja!');
                return redirect()->back()->withErrors($v->errors())->withInput();
            }

        // store in the database
        $room = new Room;
        $room -> number       = $request -> number;
        $room -> price        = $request -> price;
        $room -> body         = $request -> body;
        $room -> room_type_fk = $request -> room_type_fk;

        //save image
        if($request->hasFile('avatar')){
            $room_image = $request->file('avatar');
            $ext = $room_image->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $location = public_path('database/rooms/'. $filename);
            File::isDirectory(public_path('database/rooms/')) or File::makeDirectory(public_path('database/rooms/'), 0777, true, true);
            $img = Image::make($room_image)->resize(250, 250)->save($location);

        //Photo
            $photo = new Photo;
            $photo->url       = 'database/rooms/' . $filename;
            $photo->ext       = $ext;
            $photo->size      = $img->filesize();
            $photo->cover     = 1;
            $photo->save();
            $room -> photo_fk = $photo->url;
        }
        
        $room -> save();

        //save_amenities
         if($request->input('amenities')!= NULL){
                    foreach ($request->input('amenities') as $amenitie) {
            $amenitie_room = new AmenityRooms;
            $amenitie_room->room_id = $room->id;
            $amenitie_room->amenity_id = $amenitie;
            $amenitie_room -> save();
        }
        }
        //sėkmės pranešimas
        Session::flash('succsess', 'Naujas kambarys pridėtas.');
        //redirect to another page
        return redirect() -> route('rooms.show',$room->id);          
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

       $room=Room::find($id);
       $average=Rate::where('room_id', $id) -> avg('value_id');
       foreach(Amenities::all() as $ce){$catt[]= $ce;}
        foreach(Photo::all() as $cee){$foto[]= $cee;}
       
       foreach(AmenityRooms::all() as $cem){$cat1[]= $cem;}
       foreach(StarsValue::all() as $ct){$cat[]= $ct -> value;}
       if($cat1!=NULL){
                $data = array(
                'room' => $room,
                'cat' => $cat,
                'average' => $average,
                'catt' => $catt,
                'cat1' => $cat1,
                'foto'  => $foto,
                );
       }else{
                $data = array(
                'room' => $room,
                'cat' => $cat,
                'average' => $average,
                'catt' => $catt,
                'foto'  => $foto,
                );
       }
        return view('rooms.show')->with('data',$data); 
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function selected($selected_amenities, $id)
    {
      foreach ($selected_amenities as $selected_amenity) {
        if($selected_amenity->amenity_id == $id) return true;
      }
      return false;
    }

    public function edit($id)
    {

        if(Auth::check() && Auth::user()->Role->id == 1)
        {
          $room = Room::find($id);
          $cat = array();
          $amenities = Amenities::all();
          $amenities_result = array();
          foreach(RoomType::all() as $ct){$cat[]= $ct -> name;}
          foreach($amenities as $amenitiy)
          {
            $amenities_result[] = (object)array(
              'id' => $amenitiy->id,
              'name' => $amenitiy->name,
              'checked' => ($this->selected(AmenityRooms::where('room_id', $id)->get(), $amenitiy->id)) ? 'checked' : '',
            );
          }
          $data = array(
            'room' => $room,
            'cat' => $cat,
            'catt' => $amenities_result,
          );
          return view('rooms.edit')->with('data',$data);
        }
      return redirect('/rooms');
    }

    public function update(Request $request, $id)
    {

        // Validate the data
        $this->validate($request,array(
            'number'        => 'required|max:3',
            'price'         => 'required|max:4',
            'body'          => 'required',
            'room_type_fk'  => 'required',
            'room_image'    => 'image'
            ));

        // Save to the database
        $room = Room::find($id);
        $room -> number       = $request -> input('number');
        $room -> price        = $request -> input('price');
        $room -> body         = $request -> input('body');
        $room-> room_type_fk   = $request -> input('room_type_fk');

            if($request->hasFile('avatar'))
            {
              //tikrinu ar yra nuotrauka
            $photo;
            if(Photo::where('url',$room->photo_fk)->exists())
            {
                  $id = Photo::where('url', $room->photo_fk) -> first() -> id;
                  $photo = Photo::find($id);
                  //$photo->delete();
            }else
            {
                $photo = new Photo;
            }

            $room_image = $request->file('avatar');
            $ext = $room_image->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $location = public_path('database/rooms/'. $filename);
            
            $img = Image::make($room_image)->resize(250, 250)->save($location);
            $oldFilename = $room->photo_fk;
            //update
            $room->photo_fk = 'database/rooms/'. $filename;
            //Photo
            $photo->url     = 'database/rooms/' . $filename;
            $photo->ext     = $ext;
            $photo->size    = $img->filesize();
            $photo->cover   = 1;
            $photo->save();
            $room -> photo_fk = $photo->url;
            //delete
            File::delete(public_path($oldFilename));
            }

        //amenitie_remove
        $id_amenity_room = AmenityRooms::where('room_id', $room->id) -> count();
        if($id_amenity_room != NULL){
          for ($x = 0; $x < $id_amenity_room; $x++) {
            $id_amenity_roomm = AmenityRooms::where('room_id', $room->id) -> first() -> id;
            $amenity = AmenityRooms::find($id_amenity_roomm);
            $amenity->delete();
          }  
        }
        //save_amenities
         if($request->input('amenities')!= NULL){
            foreach ($request->input('amenities') as $amenitie) {
              $amenitie_room = new AmenityRooms;
              $amenitie_room->room_id = $room->id;
              $amenitie_room->amenity_id = $amenitie;
              $amenitie_room -> save();
        }}        
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
        if(Auth::check()){
        if(Auth::user()->Role->id == 1)
        {
      
        $room = Room::find($id2);
        if($room->photo_fk != NULL){
        $id = Photo::where('url', $room->photo_fk) -> first() -> id;
        $photo = Photo::find($id);
        $photo -> delete();
        File::delete(public_path($room->photo_fk));

        //amenitie_remove
        $id_amenity_room = AmenityRooms::where('room_id', $room->id) -> count();
        if($id_amenity_room != NULL){
          for ($x = 0; $x < $id_amenity_room; $x++) {
            $id_amenity_roomm = AmenityRooms::where('room_id', $room->id) -> first() -> id;
            $amenity = AmenityRooms::find($id_amenity_roomm);
            $amenity->delete();
            }  
        }

        }else{
             //amenitie_remove
             $id_amenity_room = AmenityRooms::where('room_id', $room->id) -> count();
             for ($x = 0; $x < $id_amenity_room; $x++) {
                $id_amenity_roomm = AmenityRooms::where('room_id', $room->id) -> first() -> id;
                $amenity = AmenityRooms::find($id_amenity_roomm);
                $amenity->delete();
                }
            //rate_remove
             $id_rated_room = RatedRooms::where('room_id', $room->id) -> count();
             for ($x = 0; $x < $id_rated_room; $x++) {
                $id_rated_roomm = RatedRooms::where('room_id', $room->id) -> first() -> id;
                $rates = RatedRooms::find($id_rated_roomm);
                $rates->delete();
                } 
          }
        $room->delete();
        Session::flash('succsess', 'Kambarys pašalintas');
        return redirect()->route('rooms.index');
    }
    }
    return redirect('/rooms');
}
}