<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Gallery;

class HomeShortcodeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response =  $next($request);
        if(!method_exists($response, 'content')){
            return $response;
        }
        $gallery = Gallery::get();
        $html = '<div id="gallery">
                 <div class="list-group gallery">
            ';
         foreach( $gallery as $key => $g) {
            $html .= '<div class="col-sm-4 col-xs-6 col-md-4 col-lg-4">             
                            <div class="hover ehover9">
                                <img class="img-responsive" src="'.asset('/img/gallery/'.$g->images).'" alt="">
                                <div class="img-overlay"></div>
                                <div class="overlay">
                                    <div class="overlay-icon">
                                        <a class="thumbnail fancybox" rel="ligthbox" href="'.asset('/img/gallery/'.$g->images).'">
                                                <i class="fa fa-search circle-icon"></i>
                                        </a>
                                        <a href="#">
                                                <i class="fa fa-link circle-icon"></i>
                                        </a>
                                    </div>
                                    <h2>'. $g->title.'</h2>
                                </div>              
                            </div>
                        </div>';
         }  

        $html .= '</div></div>';    
        $content = str_replace('[gallery]', $html, $response->content());
        $response->setContent($content);
        return $response;
    }
}
