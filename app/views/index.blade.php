@extends('master')

@section('content')
    
    <div class="container-home">

        <div data-id="1" id="photo-box-1" class="photo-box photo-box-web">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg" style="background-position: 50% 50%"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>

        <div data-id="2" id="photo-box-2" class="photo-box photo-box-app">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg" style="background-position: 50% 50%"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>

        <div data-id="3" id="photo-box-3" class="photo-box photo-box-design">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg" style="background-position: 50% 50%"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>        

        <div data-id="4" id="photo-box-4" class="photo-box photo-box-game">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg" style="background-position: 50% 50%"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>

        <div data-id="5" id="photo-box-5" class="photo-box photo-box-art">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg" style="background-position: 50% 50%"></div>
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

        $('.photo-box').mousemove(function(e){
            
            var x = 50 - e.pageX/400;
            console.log(x);
            $('#photo-box-'+$(this).data('id')+' .dust-bg').css('background-position',x+'% 50%');

        }); 

        function move(id, direction, inertia) {

            if(inertia) {
                $('#photo-box-'+id+' .dust-bg').stop(true, true).animate({'background-position':'50% 50%'}, 1000, "linear");
                if(direction == 1) {
                    $('#photo-box-'+id+' .dust-one').stop(true, true).animate({left:'+=10'}, 1000, "linear");
                    $('#photo-box-'+id+' .dust-two').stop(true, true).animate({left:'+=30'}, 1000, "linear");
                } else {
                    $('#photo-box-'+id+' .dust-one').stop(true, true).animate({left:'-=10'}, 1000, "linear");
                    $('#photo-box-'+id+' .dust-two').stop(true, true).animate({left:'-=30'}, 1000, "linear");
                }
            } else {
                $('#photo-box-'+id+' .dust-one').stop(true, true);
                $('#photo-box-'+id+' .dust-two').stop(true, true);

                if(direction == 1) {
                    $('#photo-box-'+id+' .dust-one').css({left:'+=2'});
                    $('#photo-box-'+id+' .dust-two').css({left:'+=3'});
                } else {
                    $('#photo-box-'+id+' .dust-one').css({left:'-=2'});
                    $('#photo-box-'+id+' .dust-two').css({left:'-=3'});
                }
            }
            
        }
    });
    </script>

@stop