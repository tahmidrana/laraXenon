<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('guest')->except('logout');
    }

    public function get_login()
    {
        return view('auth.login');
    }

    public function post_login(Request $request)
    {
        $resp = array('accessGranted' => false, 'errors' => '');

        $username = $request->username;
        $password = $request->passwd;
        //echo $password;

        //$user_res = DB::table('users')->where('userid', $username);
        
        if(Auth::attempt(['email' => $username, 'password' => $password, 'status'=>1])) {
            // user exists
            $resp['accessGranted'] = true;

            /*if($user->status == 0) {
                $resp['errors'] = '<strong>Invalid login!</strong><br />Your account has been deactivated.<br />';
            }*/


        } else {
            $resp['errors'] = '<strong>Invalid login!</strong><br />Please enter valid userid and password.<br />';
        }
        echo json_encode($resp);
    }

    public function logout()
    {
        Auth::logout ();
        //return Redirect::back();
        return redirect('/login');
    }
}
