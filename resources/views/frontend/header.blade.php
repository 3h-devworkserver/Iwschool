<header>
  <section class="top-header">
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-sm-2">
          <div class="logo">
              <a class="" href="{{ URL::to("") }}">
                <img src=" @if(!empty($home)) {{ asset('/img/'.$home->logo ) }} @endif" alt="" id="logo" />
              </a>
          </div>
        </div>
        
        <div class="col-md-8 col-sm-8 main-header">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="btn navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                  <!-- <span class="sr-only">Toggle navigation</span> -->
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse pull-top" id="navbar-collapse">
                  <ul class="nav navbar-nav" data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
                    @if($menus)
                       @foreach( $menus as $menu)
                         <?php 
                                $sub_menu = \DB::table('menus')->where('parent_id', $menu->id)->orderby('order', 'asc')->get();
                        ?>
                        @if($slug != '')
                            <li class="<?php if($menu->url == $slug){ echo 'active';}?> <?php if($sub_menu){ echo 'dropdown';}?>">
                              @else
                            <li>
                        @endif      
                              <a href="@if($menu->url != '#' || $menu->url != '' ){{ URL::to('/'.$menu->url) }} @else {{ 'javascript:;' }}@endif"><span class="link_text">{{ $menu->title }}</span></a>
                              
                                  @if($sub_menu)
                                  <ul class="dropdown-menu <?php if($menu->url == $slug){ echo 'nav-active';}?>">
                                    @foreach($sub_menu as $s_menu)
                                      <li><a href="{{URL::to('/'.$s_menu->url)}}"><span class="link_text">{{$s_menu->title}}</span></a></li>
                                    @endforeach 
                                  </ul>
                                  @endif
                            </li>
                       @endforeach
                    @endif
                  </ul>
                </div><!--/.nav-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
        
        <div class="col-md-2 col-sm-2 header-social-icon">
                
          <div class="social-icon">
            <ul class="list-unstyled list-inline social-network">
                            @if($sociallink->facebook != '#')
                            <li class="facebook"><a href="{{$sociallink->facebook}}" target="_blank"></a></li>
                            @endif
                            @if($sociallink->twitter != '#')
                            <li class="twitter"><a href="{{$sociallink->twitter}}" target="_blank"></a></li>
                            @endif
                            @if($sociallink->google_plus != '#')
                            <li class="google">
                              <a href="{{$sociallink->google_plus}}" target="_blank">
                              </a></li>
                            @endif
                            @if($sociallink->youtube != '#')
                            <li class="youtube"><a href="{{$sociallink->youtube}}" target="_blank"></a></li>
                            @endif
                            @if($sociallink->tumblr != '#')
                            <li class="tumblr"><a href="{{$sociallink->tumblr}}" target="_blank"></a></li>
                            @endif
                            @if($sociallink->pinterest != '#')
                            <li class="pinterest"><a href="{{$sociallink->pinterest}}" target="_blank">></a></li>
                            @endif
                            @if($sociallink->linkedin != '#')
                            <li class="linkedin"><a href="{{$sociallink->linkedin}}" target="_blank"></a></li>
                            @endif
                            @if($sociallink->vimeo != '#')
                            <li class="vimeo"><a href="{{$sociallink->vimeo}}" target="_blank">></a></li>
                            @endif
                        </ul>
          </div>      
        </div><!--end social icon-->

      </div>
    </div>
  </section>
</header><!-- main header ending -->

