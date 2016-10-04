<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Room;
use App\RoomType;
use Session;

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
            'number'        => 'required|max:3|min:2',
            'price'         => 'required|max:4|min:3',
            'body'          => 'required|max:255|min:10',
            'room_type_fk'  => 'required',
            
            ));

        // store in the database
        $room = new Room;

        $room -> number       = $request -> number;
        $room -> price        = $request -> price;
        $room -> body         = $request -> body;
        $room-> room_type_fk   = $room_type_fk;
          
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
