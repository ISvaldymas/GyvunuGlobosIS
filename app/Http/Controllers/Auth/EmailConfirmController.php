<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\EmailConfirm;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class EmailConfirmController extends Controller
{
    public function confirmEmail(Request $request, $token = null)
    {
        $email = $request->input('email');
        $email_check = EmailConfirm::where('email', $email)->first();

        if($token === $email_check->token && $email_check->state_fk != 1)
        {
            $email_check->state_fk = 1;
            Auth::user()->state_fk = 2;
            $email_check->save();
            Auth::user()->save();
        }
        $message = "Elektroninis paštas(". $email . ") sėkmingai patvirtintas.";
        Session::flash('succsess', $message);
        return redirect('/registration');
    }

    public function resendConfirmEmail()
    {
        $token = Auth::user()->confirmed_email->token;
        $data = array(
            'user'  => Auth::user(),
            'token'  => $token,
        );
        Mail::send('Auth.emails.confirm', $data, function ($message) {
            $message->from('kambariurezervacija@gmail.com', 'Informaciniai pagrindai');
            $message->to(Auth::user()->email)->subject('Kambarių rezervacija - el. pašto patvirtinimas:');
        });
        $message = "Į elektroninis paštą(". Auth::user()->email . ") patvirtinimo nuoroda išsiųsta sėkmingai.";
        Session::flash('succsess', $message);
        return redirect('/home');
    }
}
