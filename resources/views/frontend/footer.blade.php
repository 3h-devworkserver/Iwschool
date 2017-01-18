<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="footer-content">
                    <div class="footer-button">
                        <a class="broucher" href="{{ URL::to('/download/pdf/broucher') }}">download broucher</a>
                        <a class="form" href="{{ URL::to('/download/pdf/form') }}">download form</a>
                    </div>

                    <div class="footer-menu">
                        <ul class="list-unstyled link-nav">
                                <li>
                                    <a href="{{ URL::to('/') }}">home</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/notice') }}">notice</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/newsletter') }}">news letter</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/gallery') }}">photo gallery</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/contact') }}">contact</a>
                                </li>
                        </ul>   
                    </div>
                    
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

                </div>
            </div>
        </div>
    </div>
</footer>