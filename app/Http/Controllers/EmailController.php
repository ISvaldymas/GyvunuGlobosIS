<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
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
          return view('email.index');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('email.create');
    }

    public function getContact()
    {  
        return view('email.contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10']);

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
        return redirect('/home');
    }
}
