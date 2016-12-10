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
        $message = Message::all();
        $data = array(
             'message' => $message,
             'count'    => Message::count(),
         );
          return view('email.index')->with('data', $data);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $mes=Message::find($id);
            $data = array(
                'mes' => $mes,
            );
        return view('email.show')->with('data', $data);
    }

     /**
     * Send emails
     *
     * @return \Illuminate\Http\Response
     */
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
            'bodyMessage' => $request->message,
            );


        Mail::send('email.contact', $data, function($message) use ($data){
            $message->from('kambariurezervacija@gmail.com', 'Informaciniai pagrindai');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });
        $message = "Žinutė gavėjui (". $data['email'] .") išsiųsta sėkmingai!.";
        Session::flash('succsess', $message);

        // // store in the database
         $message = new Message;

         $message -> email       = $request -> email;
         $message -> subject     = $request -> subject;
         $message -> bodyMessage = $request -> message;

         $message -> save();
        // //redirect to another page
         return redirect() -> route('email.index', $message->id);   

        return view('email.index')->with('data', $data);
    }


    public function create()
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
         
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
    public function destroy($id2)
    {
         $message = Message::find($id2);
         $message->delete();
         Session::flash('succsess', 'Pranešimas pašalintas');
         return redirect()->route('email.index');
    }
}
