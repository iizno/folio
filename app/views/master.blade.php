<!doctype html>
<html lang="en-US">
<head>
        <meta charset="UTF-8">
        <title>Teacup</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="stylesheet" href="{{ asset('styles.css') }}" media="all">
</head>
<body>
    <div class="container">
        
        <div class="page-header">
            @yield('header')
        </div>

        @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif 

        @yield('content') 
    </div>
</body>
</html>