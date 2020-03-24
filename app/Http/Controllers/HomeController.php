<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use Token;
    use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

public function system()
   {
     $t = Token::UniqueNumber('ess_reports', 'token', 4 );
      $token = 'ESS-'.$t.'-'.date('Y').'';
         return view('ess.view',compact('token'));
   }

      public function profile()
    {      
      return view('admin.profile');
    }
   public function profileupdate(Request $request)
    {

      $this->validate($request, [
              'name'=>'required|max:120',                      
              
          ]);

          $id = $request->input('id');
          $user = User::findOrFail($id); //Get role specified by id
          $user->email = $request->input('email');
          $user->name = $request->input('name');
          $user->save();
          return redirect('profile')->with('status','successfully Updated');
    }

}
