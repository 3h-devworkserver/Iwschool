<?php

namespace App\Http\Controllers\Backend;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\Models\Notice;
use File;
use DB;
use Html;
use Input;
use Illuminate\Support\Facades\Redirect;
use Request;

class NoticeController extends Controller
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
        $pageheader = 'Notice List';
        //$posts = Posts::all();
        $notices = DB::table('notices')
        ->select('*')
        ->get();
        return view('backend.notice.index', compact('notices','pageheader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pageheader ="Create Notice";
        return view('backend.notice.create', compact('pageheader'));
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
        'title' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails())
        {
            return Redirect::to('admin/notice/create')
            ->withInput()
            ->withErrors($validator);
        }
        else
        {
             $input = Input::all();
           

               if(Input::hasFile('upload'))
                {
                    $file = Input::file('upload');
                    $destinationPath = public_path(). '/img/notice';
                    $featured = $file->getClientOriginalName();
                    $file->move($destinationPath, $featured);
                }
                else
                {
                    $featured = '';
                }
                $slug = str_replace(' ', '-', strtolower( $input['title'] ) );
                $newslug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
               $event = Notice::create([
                        'title' => $input['title'],
                        'excerpt' => $input['excerpt'],
                        'content' => $input['content'],
                        'n_date' => $input['n_date'],
                        'image' => $featured,
                        'notice_order' => $input['post_order'],
                        'slug' => $newslug,
                ]);
         
            return redirect('admin/notice');
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
        $pageheader ="Edit Notice";
        $posts = Notice::findOrFail($id);
        return view('backend.notice.edit', compact('posts', 'pageheader'));
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
        $input = Input::all();
              $imgname = Notice::findOrFail($id);
               if(Input::hasFile('upload'))
                {
                    $file = Input::file('upload');
                    $destinationPath = public_path(). '/img/notice';
                    $featured = $file->getClientOriginalName();
                    $file->move($destinationPath, $featured);
                }
                else
                {
                    if(!empty($imgname->image)){
                        $featured = $imgname->image;
                    }
                }
                $slug = str_replace(' ', '-', strtolower( $input['title'] ) );
                $newslug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
               $event = Notice::where('id',$id)->update([
                        'title' => $input['title'],
                        'excerpt' => $input['excerpt'],
                        'content' => $input['content'],
                        'n_date' => $input['n_date'],
                        'image' => $featured,
                        'notice_order' => $input['post_order'],
                        'slug' => $newslug,
                ]);

             
             
            return redirect('admin/notice');
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
        DB::table('notices')->where('id', '=', $id)->delete();
        return Redirect::to('admin/notice');
    }
}
