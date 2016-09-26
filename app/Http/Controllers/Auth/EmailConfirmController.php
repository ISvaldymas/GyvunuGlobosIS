<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
        return view('errors.503')->with(compact('token', 'email'));
    }
}