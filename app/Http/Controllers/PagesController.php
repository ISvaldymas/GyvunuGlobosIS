<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Room;
use App\RatedRooms;
class PagesController extends Controller
{
	public function getIndex() {

		//$cat=array();
		$rooms = Room::orderBy('id', 'asc')->take(4)->get();
       /* foreach($rooms = Room::orderBy('id', 'asc')->take(4)->get() as $ct)
         {
         	$users  = RatedRooms::where('room_id',$ct->id)->leftJoin('rooms', 'rated_rooms.room_id', '=', 'rooms.id') -> avg('rate_id');
         	$cat[]= $users;
         }  */
		$data = array(
            'rooms' 	=> $rooms,
            //'users'		=> $users,
            //'cat'		=> $cat,
        );
		return view("KambariuRezervacija.index")->with('data', $data);
	}

	public function home() {

		//$cat=array();
		$rooms = Room::orderBy('id', 'asc')->take(4)->get();
		//$users  = RatedRooms::leftJoin('rooms', 'rated_rooms.room_id', '=', 'rooms.id') -> avg('rate_id');

        /* foreach($rooms = Room::orderBy('id', 'asc')->take(4)->get() as $ct)
         {	
         	$average=RatedRooms::where('room_id', $ct->id) -> avg('rate_id');
         	if($average!=NULL){
         		$arr=$ct->id;
         	}else $arr=0;
         	$cat[]= $average;
         	$cat2[]=$arr;
         }    */ 	
		$data = array(
            'rooms' 	=> $rooms,
            //'users'		=> $users,
            //'cat'		=> $cat,
            //'cat2'		=> $cat2,
             
        );
		if(Auth::user()->state->id == 2){
			return redirect('/registration');
		}
		return view("KambariuRezervacija.index")->with('data', $data);
	}

}
