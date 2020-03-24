<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use App\Client;
use App\User;
use Auth;
use Token;
class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createagent()
    {
        $data = Agent::OrderBy('id', 'desc')->get();
        return view('data.agent',compact('data'));
    }



      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createclient()
    {
        $data = Client::OrderBy('id', 'desc')->get();
        return view('data.client',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeagent(Request $request)
    {
              $token = Token::Unique('agents','token',5);
      $t = date("Y",strtotime("now"));
      $token = strtoupper('AGNT-'.$token);
        $data = new Agent();
        $data->token = $token;
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->phy_address = $request->input('phy_address');
        $data->tin = $request->input('tin');
        $data->cert_corp = $request->input('cert_corp');
        $data->status = 'Active';
         $data->creator = Auth::id();
        $data->save();
        return back()->with('status','Successfully Registered');

    }


 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeclient(Request $request)
    {

      $token = Token::Unique('clients','token',5);
      $t = date("Y",strtotime("now"));
      $token = strtoupper('CLNT-'.$token);
        $data = new Client();
         $data->token = $token;
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->phy_address = $request->input('phy_address');
        $data->contract = $request->input('contract');
        $data->status = 'Active';
         $data->creator = Auth::id();
        $data->save();
        return back()->with('status','Successfully Registered');

    }


      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateagent(Request $request)
    {
        $id = Agent::all()->where('token',$request->input('token'))->first();
        $data = Agent::findorfail($id->id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->phy_address = $request->input('phy_address');
        $data->tin = $request->input('tin');
        $data->cert_corp = $request->input('cert_corp');
        $data->status = 'Active';
        $data->creator = Auth::id();
        $data->save();
        return back()->with('status','Successfully Updated');

    }


 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateclient(Request $request)
    {
        $id = Client::all()->where('token',$request->input('token'))->first();
        $data = Client::findorfail($id->id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->phy_address = $request->input('phy_address');
        $data->contract = $request->input('contract');
        $data->status = 'Active';
        $data->creator = Auth::id();
        $data->save();
        return back()->with('status','Successfully Updated');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editagent($id)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editclient($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dropagent($ids)
    {
         $id = Agent::all()->where('token',$ids)->first();
         return $id;
        $data = Agent::findorfail($id->id);
        $data->delete();
        return back()->with('status','Done');
        
    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dropclient($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

// Maker
// Checker
// Admin
// View Only
// Management





// Commission 
// Effective Date
// Contract Details
// Contract Tenor

}
