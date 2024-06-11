<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $data = [ 'page' => 'Sign In' ];
		View::share('data', $data);
    }

    public function loginform(Request $request) {
        $msg = $request->session()->pull('session_msg', '');

        // cache requested protected url before login
        $return_url = url()->previous(); 
        if(($return_url != route('users.loginform')) && ($return_url != route('users.login'))) {
            $request->session()->put('return_url', $return_url);
        }

        return view('auth.login', compact('msg'));
    }

    public function login(Request $request) {
        $return = $request->session()->get('return_url', url($this->redirectTo));
    
        // Validate the input
        $validator = Validator::make($request->all(), [
            'email_or_username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect(route('users.loginform'))->withErrors($validator)->withInput();
        }
    
        // Get the input
        $input = $request->input('email_or_username');
        $password = $request->input('password');
    
        // Check if the input is an email or username
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            // Input is an email
            $credentials = [
                'email' => $input,
                'password' => $password,
                'u_enabled' => 1
            ];
        } else {
            // Input is a username
            $credentials = [
                'username' => $input,
                'password' => $password,
                'u_enabled' => 1
            ];
        }
    
        // Attempt to log in
        if (Auth::attempt($credentials)) {
            return redirect(route('home'));
        }
    
         // If login fails, redirect back to the login form with an error message
        return redirect(route('users.loginform'))->with([
            'message' => 'Invalid Username or Password!',
        ]);
    }
    
    public function logout() {
        Auth::logout();
        session(['session_msg' => 'You have been signed-out.']);
        return redirect(route('users.loginform'));
    }

    public function registerform (Request $request) {
        $msg = $request->session()->pull('session_msg', '');

        return view('auth.register', compact('msg'));
    }

    public function register(Request $request){
        // RegisterValidation
        // $input = $request->validated();

        $user   = User::create($request->all());
        
        $request->session()->put('session_msg', 'Account Registered. Kindly Notify the admin for credentials.');

        // Notify admins
        $this->notifyAdminsAboutNewUser($user);

        return redirect(route('users.loginform'));
    }
}
