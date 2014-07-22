@extends('master')

@section('content')
    
    <div class="container-home">

        <div data-id="1" id="photo-box-1" class="photo-box photo-box-web">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>

        <div data-id="2" id="photo-box-2" class="photo-box photo-box-app">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>

        <div data-id="3" id="photo-box-3" class="photo-box photo-box-design">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>        

        <div data-id="4" id="photo-box-4" class="photo-box photo-box-game">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>

        <div data-id="5" id="photo-box-5" class="photo-box photo-box-art">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>

    </div>

    <div id="preload">
        <img src="{{ asset('img/web/1-ng.jpg') }}" />
    </div>

    <script type="text/javascript">
    $(function() {
        var xPrev = 0;
        // 0 => left
        // 1 => right;
        var direction = 0;
        var hoveredId = 0;

        $('.photo-box').on('mouseenter', function(e) {
            hoveredId = $(this).data("id");
        });

        $('.photo-box').on('mouseleave', function(e) {
            move(hoveredId, direction, true);
        });

        $(document).mousemove(function(e) {
            if(xPrev<e.pageX) {
                direction = 1;
            } else {
                direction = 0;
            }
            xPrev=e.pageX;
            move(hoveredId, direction, false);
        });

        function move(id, direction, inertia) {
            if(inertia) {
                if(direction == 1) {
                    $('#photo-box-'+id+' .dust-bg').stop(true, true).animate({left:'+=3'}, 1000, "linear");
                    $('#photo-box-'+id+' .dust-one').stop(true, true).animate({left:'+=10'}, 1000, "linear");
                    $('#photo-box-'+id+' .dust-two').stop(true, true).animate({left:'+=30'}, 1000, "linear");
                } else {
                    $('#photo-box-'+id+' .dust-bg').stop(true, true).animate({left:'-=3'}, 1000, "linear");
                    $('#photo-box-'+id+' .dust-one').stop(true, true).animate({left:'-=10'}, 1000, "linear");
                    $('#photo-box-'+id+' .dust-two').stop(true, true).animate({left:'-=30'}, 1000, "linear");
                }
            } else {
                $('#photo-box-'+id+' .dust-bg').stop(true, true);
                $('#photo-box-'+id+' .dust-one').stop(true, true);
                $('#photo-box-'+id+' .dust-two').stop(true, true);

                if(direction == 1) {
                    $('#photo-box-'+id+' .dust-bg').css({left:'+=1'});
                    $('#photo-box-'+id+' .dust-one').css({left:'+=2'});
                    $('#photo-box-'+id+' .dust-two').css({left:'+=3'});
                } else {
                    $('#photo-box-'+id+' .dust-bg').css({left:'-=1'});
                    $('#photo-box-'+id+' .dust-one').css({left:'-=2'});
                    $('#photo-box-'+id+' .dust-two').css({left:'-=3'});
                }
            }
            
        }
    });
    </script>

@stop