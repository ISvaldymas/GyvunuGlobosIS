<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\EmailConfirm;
use App\User;
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
            $user = User::where('email', $email_check->email)->first();
            $email_check->state_fk = 1;

            if($user->state_fk == 4)
            {
                $user->state_fk = 1;
            }else
            {
                $user->state_fk = 2;
            }
            
            $email_check->save();
            $user->save();

            if(Auth::check())
            {
                $message = "Elektroninis paštas(". $email . ") sėkmingai patvirtintas.";
                Session::flash('succsess', $message);
                if(Auth::user()->state->id == 1)
                {
                    return redirect('/home');
                }
                return redirect('/registration');
            }else
            {
                $message = "Elektroninis paštas(". $email . ") sėkmingai patvirtintas. Prisijunkite, kad pabaigtumėte registracija.";
                Session::flash('succsess', $message);
                return redirect('/');
            }
        }
        else if(!($token === $email_check->token))
        {
            $message = "Neteisinga nuoroda.";
            Session::flash('error', $message);
            return redirect('/home');
        }else if($email_check->state_fk == 1)
        {
            if(Auth::check())
            {
                $message = "Elektroninis paštas(". $email_check->email .") jau patvirtintas.";
                Session::flash('warning', $message);
                return redirect('/home'); 
            }
                $message = "Elektroninis paštas(". $email_check->email .") jau patvirtintas.";
                Session::flash('warning', $message);
                return redirect('/');
        }
        return redirect('/home');
    }

    public function resendConfirmEmail()
    {
        $token = Auth::user()->confirmed_email->token;
        $data = array(
            'user'  => Auth::user(),
            'token'  => $token,
            'email'  => Auth::user()->email,
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
