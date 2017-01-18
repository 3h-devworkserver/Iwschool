<!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->
<head id="www-sitename-com" data-template-set="html5-reset">
    <meta charset="utf-8">
    
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <title>IWSchool</title>
    @if( !empty($metavalues))
    <meta name="title" content="{{ $metavalues->meta_title }}" />
    <meta name="description" content="{{ $metavalues->meta_desc }}" />
    <meta name="author" content="{{ $metavalues->meta_keyword }}" />
    @endif
    <!-- Google will often use this as its description of your page/site. Make it good. -->
    
    <meta name="google-site-verification" content="" />
    <!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
    
    <!-- <meta name="author" content="" /> -->
    <meta name="Copyright" content="" />
    
    <!--  Mobile Viewport Fix
    http://j.mp/mobileviewport & http://davidbcalhoun.com/2010/viewport-metatag
    device-width : Occupy full width of the screen in its current orientation
    initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
    maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width
    -->
    <!-- Uncomment to use; use thoughtfully!-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    

    <!-- Iconifier might be helpful for generating favicons and touch icons: http://iconifier.net -->
    @if(!empty($home))
    <link rel="shortcut icon" href="{{ asset('/img/'.$home->favicon ) }}" />
    @endif
    <!-- This is the traditional favicon.
        - size: 16x16 or 32x32
    - transparency is OK -->
    
    <link rel="apple-touch-icon" href="{{asset('/img/apple-touch-icon.png')}}" />
   <!-- Application-specific meta tags -->
    <!-- Windows 8 -->
    <meta name="application-name" content="" /> 
    <meta name="msapplication-TileColor" content="" /> 
    <meta name="msapplication-TileImage" content="" />
    <!-- Twitter -->
    <meta name="twitter:card" content="">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:url" content="">
    <!-- Facebook -->
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Arimo|Lato:300,400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/jquery.fancybox.min.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/effects.min.css') }}" /> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/fonts/stylesheet.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/responsive.css') }}">

    <!-- Custom CSS -->
    <script type="text/javascript" src="{{ asset('/assets/js/jquery-1.9.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/TweenMax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() { 
            var win = $(window).height() - parseInt($('header').height());
            win = (win < 79) ? 557 : win;
            $('#myCarousel').height(win);
        }); 
    </script>
</head>

<body class="{{$class}}">


    @include('frontend.header')

    @yield('content')

    @include('frontend.footer')

<script type="text/javascript" src="{{ asset('/assets/js/jquery.fancybox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/functions.js') }}"></script>

<script type="text/javascript">
    
$(document).ready(function(){

    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
    });
})

</script>
</body>
</html>