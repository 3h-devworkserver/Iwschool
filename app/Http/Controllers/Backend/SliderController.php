<?php
namespace App\Http\Controllers\Backend;
//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Html;
use Input;
use App\Models\Page;
use App\Models\Slider;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Request;
class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
//
public function index(){
          $pageheader = "List Slider";

$sliders = DB::table('sliders')->select('*')->groupBy('sliderid')->get();
    return view('backend.slider.index',compact('sliders','pageheader'));
}
public function create()
{
//
    $pageheader = "Create Slider";
    $last = Slider::orderBy('id', 'desc')->first();
    if(empty($last)){
    $lastv = '1';
    }else{
    $lastv = $last['sliderid'] + 1 ;
    }
return view('backend.slider.create',compact('pages','lastv','pageheader'));
}
public function store(){
$rules = array(
'title' => 'required',
'sliderimg.*' => 'required',
);
$validator = Validator::make(Input::all(), $rules);
if($validator->fails())
{
return Redirect::to('slides/create')
->withInput()
->withErrors($validator);
}
else
    {
        $inputs = Input::all();

        foreach( $inputs['counter'] as $key=>$input ){
        $sliderid = $inputs['sliderid'];
        $title = $inputs['title'];
        $caption = $inputs['caption'][$key];
        $link = $inputs['link'][$key];
        $vurl = $inputs['vurl'][$key];
        if(Input::hasFile('sliderimg'))
        {
        $file = Input::file('sliderimg');
        $destinationPath = public_path(). '/img/slider/';
        $bfilename = $file[$key]->getClientOriginalName();
        $file[$key]->move($destinationPath, $bfilename);

        }else{
        $bfilename = '';
        }

        Slider::create([
        'sliderid' => $sliderid,    
        'title' => $title,
        'caption' => $caption,
        'link' => $link,
        'image' => $bfilename,
        'videolink' => $vurl,
        ]);
    }
    return Redirect::to('admin/slider');
    }
    }
        public function edit($id){
                $pageheader = "Edit Slider";
                $sliders = DB::table('sliders')
                ->where('sliderid',$id)
                ->get();
                return view('backend.slider.edit',compact('sliders','id','pageheader'));
        }
        public function update(Request $request, $id){
        $inputs = Input::all();
                    foreach( $inputs['counter'] as $key=>$input ){
                    if(!empty($inputs['id'][$key])){
                        $sid = $inputs['id'][$key];
                    }    
                    $sliderid = $inputs['sliderid'];
                    $title = $inputs['title'];
                    $caption = $inputs['caption'][$key];
                    $link = $inputs['link'][$key];
                    $vurl = $inputs['vurl'][$key];
                    if(Input::hasFile('sliderimg'))
                    {
                        $file = Input::file('sliderimg');
                        $destinationPath = public_path(). '/img/slider/';
                        if(!empty($file[$key])){
                            $bfilename = $file[$key]->getClientOriginalName();
                            $file[$key]->move($destinationPath, $bfilename);
                        }
                       
                    }
                    if( $sid  == $key +1 ){
                    if(!empty($file[$key])){
                         DB::table('sliders')
                        ->where([
                            ['id','=',$sid],
                            ['sliderid','=',$id]
                            ])
                        ->update([
                            'sliderid' => $sliderid,
                            'title' => $title,
                            'caption' => $caption,
                            'link' => $link,
                            'image' => $bfilename,
                            'videolink' => $vurl,
                            ]);
                    }else{
                         DB::table('sliders')
                        ->where([
                            ['id','=',$sid],
                            ['sliderid','=',$id]
                            ])
                        ->update([
                            'sliderid' => $sliderid,
                            'title' => $title,
                            'caption' => $caption,
                            'link' => $link,
                            'videolink' => $vurl,
                            ]);

                   
                }
            }else{
                 Slider::create([
                        'sliderid' => $sliderid,    
                        'title' => $title,
                        'caption' => $caption,
                        'link' => $link,
                        'image' => $bfilename,
                        'videolink' => $vurl,
                        ]);
                }
            }
                return Redirect::to('admin/slider');
        }

        public function destroy($id){
            //
        DB::table('sliders')->where('sliderid', '=', $id)->delete();
        return Redirect::to('admin/slider');
        }
    }