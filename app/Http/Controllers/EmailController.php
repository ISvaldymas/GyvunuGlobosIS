<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
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
    public function show()
    {  
       //$message = Message::all();
       // $data = array(
       //     'message' => $message,
       //     'count'    => Room::count(),
       // );
       //   return view('email.show')->with('data', $data);
        return view('email.show');
    }

    public function getContact()
    {  
        return view('email.contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, array(
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'));

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
            );


        Mail::send('email.contact', $data, function($message) use ($data){
            $message->from('kambariurezervacija@gmail.com', 'Informaciniai pagrindai');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });
        $message = "Žinutė gavėjui (". $data['email'] .") išsiųsta sėkmingai!.";
        Session::flash('succsess', $message);
        return view('email.show')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$room_type_fk = RoomType::where('name', $request->input('room_type_fk')) -> first()-> id;
        //validate the data
        $this->validate($request,array(
            'email'        => 'required|email',
            'subject'      => 'required|min:3',
            'bodyMessage'  => 'required|min:10'
            
            ));

        // store in the database
        $message = new Message;

        $message -> email       = $request -> email;
        $message -> subject     = $request -> subject;
        $message -> bodyMessage = $request -> bodyMessage;

        $message -> save();
        //redirect to another page
        return redirect() -> route('email.show', $message->id);          
        }
}
