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
        <link rel="stylesheet" href="{{ asset('css/pure-css-extra.css') }}">
        <link rel="stylesheet" href="{{ asset('css/swipebox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sidemenu.css') }}" media="all">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}" media="all">
</head>
<body>
    
    <div id="layout">

        <a href="#menu" id="menuLink" class="menu-link">
            <span></span>
        </a>

        <div class="connected-header">
        @if(Auth::check())
            Bonjour, <strong>{{{ Auth::user()->username }}}</strong> {{ link_to('logout', 'Déconnexion') }}
        @endif
        </div>

        <div id="menu">
            <div class="pure-menu pure-menu-open">
                <a class="pure-menu-heading" href="#">Teacup</a>

                <ul>
                    <li class="menu-item-divided pure-menu-selected">
                        <a href="{{ url('/chocolat/projects') }}">Projects</a>
                    </li>
                </ul>

                <div class="quick-form-project">
                @if(isset($project))
                    {{ Form::model($project, 
                        array(
                            'method' => "POST", 
                            'files' => true,
                            'id' => "quick-form", 
                            'url' => '/chocolat/projects/' )) 
                    }}
                    
                    <input type="hidden" name="name" value="Sans titre">
                    <input type="hidden" name="category_id" value="4">

                    {{ Form::file('screenshots[]', 
                        array( 
                            'class' => "quick-dropzone",
                            'id' => "quick-file-upload",
                            'multiple' => true )) 
                    }}
                    
                    {{ Form::close() }}
                @endif
                </div>

            </div>
        </div>
        
        <div id="main">

            <div class="header">
                @yield('header')
            </div>

            <div class="content">
                
                @if(Session::has('message'))
                <p></p>
                <div class="pure-alert">
                    {{Session::get('message')}}
                </div>
                @endif

                @if(Session::has('error'))
                <p></p>
                <div class="pure-alert pure-alert-error">
                    {{Session::get('error')}}
                </div>
                @endif 

                @yield('content') 
            </div>
        </div>

    </div>

    <script>
    (function (window, document) {

        var layout   = document.getElementById('layout'),
            menu     = document.getElementById('menu'),
            menuLink = document.getElementById('menuLink');

        function toggleClass(element, className) {
            var classes = element.className.split(/\s+/),
                length = classes.length,
                i = 0;

            for(; i < length; i++) {
              if (classes[i] === className) {
                classes.splice(i, 1);
                break;
              }
            }
            // The className is not found
            if (length === classes.length) {
                classes.push(className);
            }

            element.className = classes.join(' ');
        }

        menuLink.onclick = function (e) {
            var active = 'active';

            e.preventDefault();
            toggleClass(layout, active);
            toggleClass(menu, active);
            toggleClass(menuLink, active);
        };

    }(this, this.document));

    $("document").ready(function(){

        $( '.swipebox' ).swipebox();
        
        $( '#quick-file-upload' ).change(function() {
            
            $( '#quick-form' ).submit();
        });

    });

    </script>

</body>
</html>