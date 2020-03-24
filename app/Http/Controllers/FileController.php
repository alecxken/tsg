<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\File;
use Token;
class FileController extends Controller
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
    public function create()
    {        
      return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          #______Storing Uploaded file__#
      $this->validate($request, [
              'file' => 'required',
              'file.*' => 'mimes:pdf,doc,xls'
      ]);
        $t = Token::UniqueNumber('files', 'token', 9 );
        $token = 'ES-'.$t.'-'.date('Y').'';
        $data = new File();
        $data->token = $token;
        $data->category = $request->input('access');
        $data->user_name = Auth::id();
        $data->file_name = $request->input('file_name');       
        $data->access = $request->input('access');
        $data->status = 'Ok';
        $data->comments = $request->input('comments');
        $media = $request->file('file');
        // return $media;
        if($request->hasfile('file'))
             {  
               
                    $destinationPath = storage_path('app\files');
                    $filename1 = time().'-'.$media->getClientOriginalName();
                    // $filename = $media->getClientOriginalName();
                    $media->move($destinationPath, $filename1);
                    $files1 = $filename1;
                
            }

        $data->file = $files1;
        $data->save();

        
     return back()->with('status','Success');
             
    }

     public function read()
    {
        $data = FIle::all();
        return view('files.index',compact('data'));
        return back()->with('status','Success');
    }

    public function viewfiles($file)
    {
        $filename = $file;
        $path = storage_path('app/files/'.$file);
        return \Response::make(file_get_contents($path), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="'.$filename.'"'
    ]);

    
    }

    public function filedesroy($id)
    {
        $files = FIle::all()->where('token',$id)->first();
        $filef = File::findorfail($files->id);
        $filef->delete();

         if(file_exists(public_path('files/'.$files->file)))
           {
            unlink(public_path('files/'.$files->file));
           }

        if(file_exists(storage_path('app/files/'.$files->file)))
           {
            unlink(storage_path('app/files/'.$files->file));
           }
        
        
        return back()->with('status','Success');
    }


    Public function getfiles(){

        $path = storage_path('app\files');
        $rii = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        $files = array();
        return $rii;
        foreach ($rii as $file) {
            if ($file->isDir()){
                continue;
            }
            $files[] = $file->getPathname();
        }

        foreach ($files as $key => $value) {
         $datas[] = json_decode(file_get_contents($value),true);
        }

        return $datas;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
}
