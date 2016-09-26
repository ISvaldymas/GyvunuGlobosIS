<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\EmailConfirm;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

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
        //Flash Message padaryt!!!!!!!!!
        return redirect('/home');
    }
}