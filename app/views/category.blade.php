@extends('master')

@section('content')
    
    <div class="container-category">
    
        <ul id="projects" class="projects-wrapper">
        @for ($i=0; $i<10; $i++)
        @foreach ( $projects as $key => $project )
            <li class="project">
                <img src="{{ asset('upload/tn-' . $project->screenshots[0]->name) }}" width="200">
            </li>
        @endforeach
        @endfor
        </ul>

    </div>


    <script type="text/javascript">
    (function ($){

        var handler = $('#projects li');
        handler.wookmark();

    })(jQuery);
    </script>
@stop