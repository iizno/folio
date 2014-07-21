@extends('master')

@section('content')
    
    <div class="container-home">

        <div data-id="1" id="photo-box-1" class="photo-box photo-box-web">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg grayscale"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>

        <div data-id="2" id="photo-box-2" class="photo-box photo-box-app">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg grayscale"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>

        <div data-id="3" id="photo-box-3" class="photo-box photo-box-design">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg grayscale"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>        

        <div data-id="4" id="photo-box-4" class="photo-box photo-box-game">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg grayscale"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>

        <div data-id="5" id="photo-box-5" class="photo-box photo-box-art">
            <a href="#">
                <img src="{{ asset('img/web/0.png') }}" />
            </a>
            <div class="dust-bg grayscale"></div>
            <div class="dust-one"></div>
            <div class="dust-two"></div>
        </div>

    </div>

    <script type="text/javascript">
    $(function() {
        
        // Gestion du hover noir et blanc
        $(".photo-box").mouseenter(function () {
            $("#photo-box-"+$(this).data("id")+" .dust-bg").addClass("nongrayscale");
        });
        $(".photo-box").mouseout(function () {
            $("#photo-box-"+$(this).data("id")+" .dust-bg").removeClass("nongrayscale");
        });

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
            
            vitesse = Math.abs(xPrev - e.pageX);
            xPrev=e.pageX;

            //console.log(vitesse);

            if(direction == 1) {
                $('#photo-box-'+hoveredId+' .dust-bg').css({left:'+=1'});
                $('#photo-box-'+hoveredId+' .dust-one').css({left:'+=2'});
                $('#photo-box-'+hoveredId+' .dust-two').css({left:'+=3'});
            } else {
                $('#photo-box-'+hoveredId+' .dust-bg').css({left:'-=1'});
                $('#photo-box-'+hoveredId+' .dust-one').css({left:'-=2'});
                $('#photo-box-'+hoveredId+' .dust-two').css({left:'-=3'});
            }
        });
    });
    </script>

@stop