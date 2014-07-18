<!doctype html>
<html lang="en-US">
<head>
        <meta charset="UTF-8">
        <title>Teacup</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.swipebox.min.js') }}"></script>

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="stylesheet" href="{{ asset('css/teacup.css') }}" media="all">
</head>
<body>
    <div class="container">
        
        <div>

            <div class="header">    
                <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
                    <a class="pure-menu-heading" href="">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo Teacup blanc">
                    </a>

                    <ul>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">A propos</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif 

            @yield('content') 

        </div>
    </div>

    <script type="text/javascript">
    $(function() {
        $(window).on( 'resize', function () {
            var height = ( $(window).height() - 60 ) / 2 ;
            $('.photo-box').height( height );
            console.log($(window).height());
            console.log(height);
        }).resize();
    });
    </script>

</body>
</html>