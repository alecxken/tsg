<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;
     use Illuminate\Support\Facades\Hash;
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

    // use AuthenticatesUsers;
 public function showLoginForm ()
    {
        return view('auth.login');
    }

     public function login(Request $request)
    {
      
        $email = $request->input('username');
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
 return back()->with('danger','Invalid Username');
}
     $user = $request->input('username');
     $password = $request->input('password');


    $user = User::where('username', $user)->first();

                 if(!empty($user))
                    {
                      Auth::loginUsingId($user->id);
                     return redirect()->intended('/home');
                }
            else
                {
                  $users = new User();
                  $users->username = $request->input('username');
                    $users->name = $request->input('username');
                  $users->email = $request->input('username').'@ecobank.com';
                    $users->password = Hash::make(12345678);
                  $users->save();
                   Auth::loginUsingId($users->id);
                   return redirect('home')->with('danger','Kindly Update Your Profile !!!');
                    // return back()->with('error','Kindly Contact Your ICT department');
                 }

      if(empty($user) || empty($password)) return back()->with('danger','Kindly input all credentials');
       $ldap_host = "10.32.1.18";
       $ldap = ldap_connect($ldap_host) or die("Could not connect to LDAP server.");
       ldap_set_option($ldap,LDAP_OPT_PROTOCOL_VERSION,3);
      
      if($bind = @ldap_bind($ldap, $user.'@ecobank.group', $password))
           {
            $user = User::where('username', $user)->first();
                 if(!empty($user))
                    {
                      Auth::loginUsingId($user->id);
                     return redirect()->intended('/home');
                }
            else
                {

                  $users = new User();
                $users->username = $request->input('username');
                    $users->name = $request->input('username');
                  $users->email = $request->input('username').'@ecobank.com';
                    $users->password = Hash::make(12345678);
                 $users->save();
                   Auth::loginUsingId($users->id);
                   return redirect('home')->with('danger','Kindly Update Your Profile !!!');
                    //return back()->with('error','Kindly Contact Your ICT department');
                 }
             }
               else
               {
       return back()->with('danger','Wrong Username or Password!');
       }

    }

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

public function logout()
    {
Auth::logout();
return redirect('/');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

      // $user = User::where('username', $user)->first();
      //            if(!empty($user))
      //               {
      //                 Auth::loginUsingId($user->id);
      //                return redirect()->intended('/home');
      //           }
      //       else
      //           {
      //               return back()->with('error','Kindly Contact Your ICT department');
      //            }