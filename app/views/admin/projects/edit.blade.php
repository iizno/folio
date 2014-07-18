@extends('admin.master')

@section('header')
    
    <h1>Projets</h1>
    <h2>Visualisation</h2>

@stop

@section('content')
    
    <h2>
        @if($method == 'post')
            Ajouter un nouveau projet
        @elseif($method == 'delete')
            Supprimer le projet : {{ $project->name }}?
        @else
            Modifier le projet : {{ $project->name }}
        @endif 
        
    </h2>


    @if($method == 'post')
        {{ Form::model($project, 
            array(
                'method' => $method, 
                'files' => true,
                'class' => 'pure-form pure-form-stacked',
                'url' => '/chocolat/projects/' )) 
        }}
    @else($method == 'put')
        {{ Form::model($project, 
            array(
                'method' => $method, 
                'files' => true,
                'class' => 'pure-form pure-form-stacked',
                'url' => '/chocolat/project/'.$project->id )) 
        }}
    @endif

    @unless($method == 'delete')

        <div class="pure-g">

            <div class="pure-u-2-5">

                {{ Form::label('Name') }}
                {{ Form::text('name') }}

                <br>

                {{ Form::label('Category') }}
                {{ Form::select('category_id', $categoriesOptions) }}
                
                <br>

                <label for="delete_all">
                    <input type="checkbox" value="delete_all" id="delete_all" name="delete_all">
                    Supprimer tous les screenshots
                </label>
                
                <br>

                {{ Form::submit("Valider", array('class' => "pure-button pure-button-success")) }}
                <a href="{{ ('/chocolat/projects') }}" class="pure-button pure-button-error">&larr; Annuler </a>

            </div>

            <div class="pure-u-3-5">

                <h3>Drag & Drop les screenshots dans la case suivante</h3>

                {{ Form::file('screenshots[]', 
                    array( 
                        'class' => "dropzone",
                        'multiple' => true )) 
                }}

            </div>

        </div>

        <div class="pure-g">

            <div class="pure-u-1-1">

                <div class="currents-screenshots">
                
                    <h3>Screenshots déjà associés </h3>
                    
                    <ul class="pure-thumbnails pure-g-r">

                        @foreach($project->screenshots as $screenshot)
                        <li class="pure-u-1-4">
                            
                            <a rel="gallery" href="{{ asset('upload/' . $screenshot->name) }}" class="swipebox pure-thumb pure-thumb-bordered">
                                
                                <img src="{{ asset('upload/tn-' . $screenshot->name) }}">

                            </a>
                            <div class="caption">
                                <p>
                                <label>
                                    <input type="checkbox" name="deleteFiles[]" value="{{ $screenshot->id }}"> Supprimer
                                </label>
                                </p>
                            </div>

                        </li>
                        @endforeach

                    </ul>

                </div>
            </div>
        </div>

    @else
    
        <div class="pure-controls">
            {{ Form::submit("Oui, je veux supprimer ce projet", array('class' => "pure-button pure-button-small pure-button-success")) }}
            <a href="{{ ('/chocolat/projects') }}" class="pure-button pure-button-small pure-button-error">&larr; Annuler </a>
        </div>

    @endif

    {{ Form::close() }}

@stop