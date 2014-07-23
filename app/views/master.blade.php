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
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.swipebox.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bgPos.js') }}"></script>

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="stylesheet" href="{{ asset('css/teacup.css') }}" media="all">
</head>
<body>
    <div class="container">
        
        <div>

            <div class="header">    
                <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
                    <a class="pure-menu-heading" href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo Teacup blanc">
                    </a>

                    <ul>
                        <li class="nav-link-li @if($activeSection == 'services') pure-menu-selected @endif nav-link-li-services">
                            <a class="nav-link nav-link-services" data-ref="services" href="{{ url('/services') }}" title="What we do !">Services</a>
                        </li>
                        <li class="nav-link-li @if($activeSection == 'about') pure-menu-selected @endif nav-link-li-about">
                            <a class="nav-link nav-link-about" data-ref="about" href="{{ url('/about') }}" title="Who we are !">About us</a>
                        </li>
                        <li class="nav-link-li @if($activeSection == 'contact') pure-menu-selected @endif nav-link-li-contact">
                            <a class="nav-link nav-link-contact" data-ref="contact" href="{{ url('/contact') }}" title="Talk to us !">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif 

            @yield('content') 

            <div class="section-wrapper about-wrapper @if($activeSection != "about") section-wrapper-hide @endif">
                <p>
                This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. 
                Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. 
                Duis sed odio sit amet nibh vulputate . Etiam pharetra, erat sed fermentum feugiat, 
                velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.
                This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. 
                Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. 
                Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.
                </p>
            </div>

            <div class="section-wrapper services-wrapper @if($activeSection != "services") section-wrapper-hide @endif">
                <p>
                This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. 
                Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. 
                Duis sed odio sit amet nibh vulputate . Etiam pharetra, erat sed fermentum feugiat, 
                velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.
                This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. 
                Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. 
                Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.
                </p>
            </div>

            <div class="section-wrapper contact-wrapper @if($activeSection != "contact") section-wrapper-hide @endif">
                <p>
                This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. 
                Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. 
                Duis sed odio sit amet nibh vulputate . Etiam pharetra, erat sed fermentum feugiat, 
                velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.
                This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. 
                Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. 
                Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.
                </p>
            </div>

        </div>
    </div>

    <script type="text/javascript">
    $(function() {

        // Resize the photo-box to the good for in order to take all page
        $(window).on( 'resize', function () {
            var height = ( $(window).height() - 60 ) / 2 ; // 60px for the header menu
            $('.photo-box').height( height );
        }).resize();

        $('.nav-link').on( 'click', function () {
            var section = $(this).data('ref');
            showSection(section);
            // Break "normal" link
            return false;
        });

        // Back / Forward button gestion
        window.onpopstate = function(event) {
            // Get the section to load
            var section = window.location.pathname.substring(1);
            if(section.length > 0)
                showSection(section);
        };

        function showSection(section) {
            // Get normal url from the link
            var url = $(".nav-link-"+section).attr("href");
            // PushState to ssimulate some navigation
            window.history.pushState('object', 'Teacup // ' + section, url);
            // hide all
            $('.section-wrapper').hide();
            // Deaactivate all active class on menu
            $('.nav-link-li').removeClass('pure-menu-selected');
            // activate the good link
            $('.nav-link-li-'+section).addClass('pure-menu-selected');
            // show the one
            $('.'+section+"-wrapper").show();
        }

    });
    </script>

</body>
</html>