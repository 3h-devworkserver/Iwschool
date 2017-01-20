<?php

namespace App\Http\Controllers\Backend;

//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Html;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pageheader = "User List";
        $users = DB::table('users')->get();
        return view('backend.users.index',compact('users','pageheader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pageheader = "Create Users";
        return view('backend.users.create',compact('pageheader'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $rules = array(
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'password_confirmation' => 'required|same:password',
        );
        $validator = Validator::make(Request::all(), $rules);
        if($validator->fails())
        {
            return Redirect::to('admin/user/create')
            ->withInput()
            ->withErrors($validator);
        }
        else
        {
            $request = Request::all();
            if(Request::hasFile('upload'))
        {
        $file = Request::file('upload');
        $destinationPath = public_path(). '/img/user/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);

        }else{
        $filename = '';
        }
                User::create([
                        'name' => $request['name'],
                        'email' => $request['email'],
                        'password' => Hash::make($request['password']),
                        'remember_token' => $request['_token'],
                        'image' => $filename,
                        ]);
            return Redirect::to('admin/user/list');

        }
       
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
        $pageheader = "Edit Users";
        $users = User::FindOrFail($id);
        return view('backend.users.edit',compact('pageheader','users'));
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
            $request = Request::all();
              $imgname = User::findOrFail($id);
               if(Request::hasFile('upload'))
                {
                    $file = Request::file('upload');
                    $destinationPath = public_path(). '/img/user/';
                    $filename = $file->getClientOriginalName();
                    $file->move($destinationPath, $filename);
                }
                else
                {
                    if(!empty($imgname->image)){
                        $filename = $imgname->image;
                    }
                }
                
               User::where('id',$id)->update([
                        'name' => $request['name'],
                        'email' => $request['email'],
                        'remember_token' => $request['_token'],
                        'image' => $filename,
                ]);

             
             
            return redirect('admin/user/list');
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
        DB::table('users')->where('id', '=', $id)->delete();
        return Redirect::to('admin/user/list');
    }
}
