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

        $(document).mousemove(function(e) {
            if(xPrev<e.pageX) {
                direction = 1;
            } else {
                direction = 0;
            }
            vitesse = xPrev<e.pageX;
            xPrev=e.pageX;
            enabledDustEffect(hoveredId, direction, vitesse);
        });
    });

    function enabledDustEffect(id, direction, vitesse) {
        if(direction == 1) {
            $('#photo-box-'+id+' .dust-one').stop(true, true).animate({left:'+=4'}, 3000, "linear");
            $('#photo-box-'+id+' .dust-two').stop(true, true).animate({left:'+=7'}, 3000, "linear");
        } else {
            $('#photo-box-'+id+' .dust-one').stop(true, true).animate({left:'-=4'}, 3000, "linear");
            $('#photo-box-'+id+' .dust-two').stop(true, true).animate({left:'-=7'}, 3000, "linear");
        }
    }
    </script>

@stop