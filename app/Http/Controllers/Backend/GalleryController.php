<?php

namespace App\Http\Controllers\Backend;
//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Html;
use Input;
use App\Models\Gallery;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Request;

class GalleryController extends Controller
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
        $pageheader = "Gallery List";

        $galleries = DB::table('gallery')->select('*')->get();
        return view('backend.gallery.index',compact('galleries','pageheader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pageheader = "Create Slider";
        return view('backend.gallery.create',compact('pageheader'));
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
        'title.*' => 'required' ,
        'galleryimg.*' => 'required',
        );
        $messages = [
            'title.*' => 'The title field is required.',
            'galleryimg.*' => 'Please upload the image.',
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if($validator->fails())
        {
            return Redirect::to('admin/gallery/create')
            ->withInput()
            ->withErrors($validator);
        }
        else
        {
        
        $inputs = Input::all();
        
        foreach( $inputs['counter'] as $key => $input ){
            
            $title = $inputs['title'][$key];
            $caption = $inputs['caption'][$key];
           
        if(Input::hasFile('galleryimg'))
        {
            $file = Input::file('galleryimg');
            $destinationPath = public_path(). '/img/gallery/';
            $bfilename = $file[$key]->getClientOriginalName();
            $file[$key]->move($destinationPath, $bfilename);

        }else{
            $bfilename = '';
        }
        $slug = str_replace(' ', '-', strtolower( $title ) );
         $newslug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);       
        Gallery::create([
        'title' => $title,
        'caption' => $caption,
        'images' => $bfilename,
        'slug' => $newslug,
        ]);
        }
        return Redirect::to('admin/gallery');
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
        $pageheader = "Edit Gallery";
        $galleries = DB::table('gallery')->select('*')->where('id',$id)->first();
        return view('backend.gallery.edit',compact('galleries','pageheader'));
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
        $filenames = DB::table('gallery')->select('images')->where('id',$id)->first();
        if(Request::hasFile('galleryimg'))
                {
                    $file = Request::file('galleryimg');
                    $destinationPath = public_path(). '/img/gallery/';
                    $filename = $file->getClientOriginalName();
                    $file->move($destinationPath, $filename);
                }
                else
                {
                    $filename = $filenames->images;
                }
                $slug = str_replace(' ', '-', strtolower( $request['title'] ) );
                $newslug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
                DB::table('gallery')
                    ->where('id', $id)
                    ->update([
                        'title' => $request['title'],
                        'caption' => $request['caption'],
                        'images' => $filename,
                        'slug' => $newslug,
                        ]);
        return Redirect::to('admin/gallery');
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
        DB::table('gallery')->where('id',$id)->delete();
        return Redirect::to('admin/gallery');
    }
}
