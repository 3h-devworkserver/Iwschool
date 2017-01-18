<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use URL;
use App\Models\StaticBlock;
use App\Models\BlockStatic;
use App\Models\Posts;
use App\Models\PostCategory;
use App\Social;
use DB;
use App\Models\Page;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $slug = '';
        $menus = DB::table('menus')->where('parent_id','0')->get();
        $home = DB::table('generals')->first();
        $metavalues = DB::table('seos')->first();
        $sliders = DB::table('pages')
            ->join('sliders', 'pages.slider', '=', 'sliders.sliderid')
            ->select('pages.slider', 'sliders.*')
            ->get();
        $blocks = BlockStatic::where('page_id', 1)->whereOr('position','top')->get();
        $sociallink = Social::first();
        $posts = Posts::orderBy('post_order','ASC')->get();

        return view('frontend.home.index',compact('metavalues','slug','menus','home','blocks','sociallink','sliders','posts'))->withClass('home');
    }

      public function page($slug)
    {
        //
        $menus = DB::table('menus')->where('parent_id','0')->get();
        $home = DB::table('generals')->first();
        $metavalues = DB::table('seos')->first();
        $pagedetails = Page::where('slug',$slug)->get();
        $sociallink = Social::first();
        return view('frontend.home.page',compact('metavalues','home','menus','pagedetails','sociallink','slug'))->withClass($slug);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
