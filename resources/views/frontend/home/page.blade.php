@extends('frontend.master')
@section('content')
@if($pagedetails )
@foreach( $pagedetails as $key => $page )
<section class="page-banner">
    @if(!empty($page->featured_image))
    <div class="page-banner-img" style="background-image:url({{ asset('/img/'.$page->featured_image) }})"></div>
    @else
    <div class="page-banner-img" style="background-image:url({{ asset('/assets/images/banner2.jpg') }})"></div>
    @endif
    <div id="flower_browser" class="browser_width">
        <!-- <img src="assets/images/flower.png"> -->
    </div>
</section><!-- banner ending -->

<section class="{{$class}} width-gap page-container top-space">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="stick-head-title">
                    <div class="col-md-4 col-sm-4">
                        <div class="left-stick">
                            <div id="long-stick" class="grpelem"></div>
                            <div class="rounded-corners grpelem" id="left-round"><!-- simple frame --></div>
                            <div class="rounded-corners grpelem" id="right-round"><!-- simple frame --></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="title-page">
                            <h1>{{ $page->title }}</h1>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="right-stick">
                            <div id="right-long-stick" class="grpelem"></div>
                            <div class="rounded-corners grpelem" id="right-left-round"><!-- simple frame --></div>
                            <div class="rounded-corners grpelem" id="right-right-round"><!-- simple frame --></div>
                        </div>
                    </div>
                </div>
                 @if( !empty( $page->quotes ) )
                <div class="blockquote">
                    
                    <div id="blockquote"><!-- group -->
                    
                    
                        <!-- m_editable region-id="editable-static-tag-U7129-BP_infinity" template="team.html" data-type="image" -->
                         <div class="clip_frame"><!-- image -->
                           <img class="block" id="u7129_img" src="{{ asset('assets/images/-.png') }}" alt="" data-muse-src="images/-.png">
                         </div>
                      <!-- /m_editable -->

                      <!-- m_editable region-id="editable-static-tag-U7133-BP_infinity" template="team.html" data-type="html" data-ice-options="disableImageResize,link" -->
                    <div class="blockquote-content"><!-- content -->
                        {!! $page->quotes !!}
                    </div>
                    <!-- /m_editable -->


                      <!-- m_editable region-id="editable-static-tag-U7131-BP_infinity" template="team.html" data-type="image" -->
                        <div class="clip_frame clip_frame_right"><!-- image -->
                            <img class="block" id="u7131_img" src="{{ asset('assets/images/-.png') }}" alt="" data-muse-src="images/-.png">
                        </div>
                    <!-- /m_editable -->
                     </div>
                   

                </div>
                @endif
                @if( !empty( $page->description ) )
                <div class="features-content page-content" id="{{$class}}"><!-- content -->
                 {!! $page->description !!}  
                </div>
                @endif    
            </div>
        </div>
    </div>
</section><!-- team ending -->

  @endforeach
@endif
@stop