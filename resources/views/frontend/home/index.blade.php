@extends('frontend.master')

@section('content')
@if($sliders)
<section id="myCarousel" class="carousel slide banner">
        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
        @foreach( $sliders as $key => $slider)
            <div class="item <?php if($key == 0 ){ echo 'active'; } ?>">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url({{ asset('img/slider/'.$slider->image) }}"></div>
            </div>
            @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

</section>
@endif

    <section class="flower">
    <div id="flower_browser" class="browser_width"></div>
    </section><!-- background flower ending -->

    <section class="courses_offer top-space">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

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
                            <h1>COURSES WE OFFER</h1>
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
                <div class="circle-link">
                    <div class="container">
                        <div class="row">
                            <div class="circle-content">
                                @if($posts)
                                 @foreach( $posts as $key => $post )
                                <div class="col-md-4 col-sm-4 circle-content-link">
                                    <a href="#" class="nontext museBGSize">
                                        <div class="hover-circle-content">
                                            <img src="{{ asset('/img/post/'.$post->image) }}">
                                            <p><span>{{ $post->title }}</span></p>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section><!-- courses offer ending -->

@if($blocks)

@foreach( $blocks as $key => $block)
@if( $block->ordering == 0 )
<section class="methodology">
 @if( $block->boption == 'img')
   <div class="methodology-container" style="background-image:url({{ asset('img/'.$block->background_image) }})">
    @else
    <div class="methodology-container">
        @endif
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
                                <h1>{{ $block->static_title}}</h1>
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

                    <div class="colelem" id="colelem-content"><!-- content -->
                        <p>{{ $block->sub_title}}</p>
                   </div>
                    
                    <div class="learn-more">
                        <a class="nonblock nontext rounded-corners clearfix colelem" id="learn-more" href="{{URL::to($block->url)}}">LEARN MORE</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</section><!-- INTERACTIVE METHODOLOGY ending -->
@endif

@if( $block->ordering == 1 )
<section class="facilities">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @if(!empty($block->featured_image))
                <div class="clip_frame facilities-banner" ><!-- image -->
                    <img class="block" id="u5321_img" src="{{ asset('img/'.$block->featured_image) }}" alt="">
                </div>
                @endif
                <div class="fullwidth-stick"><!-- group -->
                    <div class="rounded-corners grpelem" id="left-round"><!-- simple frame --></div>
                    <div id="long-stick" class="grpelem"><!-- simple frame --></div>
                    <div class="rounded-corners grpelem" id="right-round"><!-- simple frame --></div>
                </div>
                <div class="facilities-content-header"><!-- content -->
                    <h1>{{ $block->static_title}}</h1>

                </div>
                <div class="facilities-content" id="u5297-4" ><!-- content -->
                    <p>{{ $block->sub_title}}</p> 
                </div>
                <div class="learn-more">
                    <a class="nonblock nontext rounded-corners clearfix colelem" id="learn-more" href="{{URL::to($block->url)}}">LEARN MORE</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endforeach
@endif

@stop


