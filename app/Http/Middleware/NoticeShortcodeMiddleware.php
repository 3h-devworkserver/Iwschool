<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Notice;


class NoticeShortcodeMiddleware
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
        $notices = Notice::get();
        $html = '';
         foreach( $notices as $key => $notice) {
            $old_date = date($notice->n_date);              // returns Saturday, January 30 10 02:06:34
            $old_date_timestamp = strtotime($old_date);
            $new_date = date('F d, Y', $old_date_timestamp);
            $html .= '<div class="event-content">
                        
                        <div class="project-img">
                            <a href="#"><img src="'.asset('/img/notice/'.$notice->image).'"></a>
                        </div>

                        <div class="discription-page">
                            <h2><a href="#">'.$notice->title.'</a></h2>
                            <div class="current-time">
                                <i class="fa fa-calendar"></i>
                                <span id="clock">
                                    <small>'.$new_date.'</small>
                                </span>
                            </div>
                            <p>'.$notice->excerpt.' </p>
                        </div>

                    </div>';
         }  

        $content = str_replace('[notice]', $html, $response->content());
        $response->setContent($content);
        return $response;
    }
}
