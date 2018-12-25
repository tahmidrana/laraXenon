<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

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

        $user_res = DB::table('users')->where('userid', $username);
        
        if($user_res->count()) {
            // user exists
            $user = $user_res->get();
            if(Hash::check($password, $user->password)) {
                //user credentials correct
                $resp['accessGranted'] = true;
            } else {
                $resp['errors'] = '<strong>Invalid login!</strong><br />Please enter valid userid and password.<br />';
            }

            /*if($user->status == 0) {
                $resp['errors'] = '<strong>Invalid login!</strong><br />Your account has been deactivated.<br />';
            }*/


        } else {
            $resp['errors'] = '<strong>Invalid login!</strong><br />User not found.<br />';
        }
        echo json_encode($resp);
    }
}
