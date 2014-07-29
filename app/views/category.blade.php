@extends('master')

@section('content')
    
    <div class="container-category">
    
        <ul id="projects" class="projects-wrapper">
        @for ($i=0; $i<10; $i++)
        @foreach ( $projects as $key => $project )
            <li class="project">
                <img src="{{ asset('upload/tn-' . $project->screenshots[0]->name) }}">
            </li>
        @endforeach
        @endfor
        </ul>

    </div>


    <script type="text/javascript">
    $(function() {

        $('#projects .project').wookmark({
            autoResize: true, // This will auto-update the layout when the browser window is resized.
            container: $('#projects'), // Optional, used for some extra CSS styling
            offset: 0, // Optional, the distance between grid items
            itemWidth: "25%", // Optional, the width of a grid item
            align: "center",
            flexibleWidth: true,
        });

    });
    </script>
@stop