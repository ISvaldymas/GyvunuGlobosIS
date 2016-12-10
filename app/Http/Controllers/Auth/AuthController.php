<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\EmailConfirm;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => ['logout', 'register']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    //override:
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        
        $user = null;
        $token = hash_hmac('sha256', uniqid(), Str::random(40));
        if(Auth::check())
        {
            $this->create($request->all());
            $user = User::where('email', $request->input('email'))->first();
            $user->state_fk = 2;
            $user->role_fk = 2;
            $user->save();
        }else
        {
            Auth::guard($this->getGuard())->login($this->create($request->all()));
            $user = Auth::user();
            $data = array(
                'user'  => Auth::user(),
                'token'  => $token,
                'email'  => Auth::user()->email,
            );
            Mail::send('Auth.emails.confirm', $data, function ($message) {
                $message->from('kambariurezervacija@gmail.com', 'Informaciniai pagrindai');
                $message->to(Auth::user()->email);
                $message->subject('Kambarių rezervacija - el. pašto patvirtinimas:');
            });
        }
        
        $email_confirm = new EmailConfirm;
        $email_confirm->email = $user->email;
        $email_confirm->token = $token;
        $email_confirm->user_fk = $user->id;



        if(Auth::check() && Auth::user()->role_fk == 1){ $email_confirm->state_fk = 1; }
        $email_confirm -> save();

        if(Auth::check() && Auth::user()->role_fk == 1){ return redirect()->route('staff.edit', $user->id); }

        return response()->json([
            'state' => 'succses'
        ]);
    }

    //override:
    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::guard($this->getGuard())->user());
        }
        return response()->json([
            'state' => 'succses'
        ]);
    }

    //override:
    protected function sendFailedLoginResponse(Request $request)
    {

        return response()->json([
            'state' => 'error',
            $this->loginUsername() => $this->getFailedLoginMessage()
        ]);
    }
}
