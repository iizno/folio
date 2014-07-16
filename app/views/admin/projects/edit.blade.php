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
                'url' => '/chocolat/projects/' )) 
        }}
    @else($method == 'put')
        {{ Form::model($project, 
            array(
                'method' => $method, 
                'url' => '/chocolat/project/'.$project->id )) 
        }}
    @endif

    @unless($method == 'delete')
        <div class="form-group">
            {{ Form::label('Name') }}
            {{ Form::text('name') }}
        </div>
        <div class="form-group">
            
        </div>
        <div class="form-group">
            {{ Form::label('Category') }}
            {{ Form::select('category_id', $categoriesOptions) }}
        </div>
        {{ Form::submit("Valider", array('class' => "button-success button-xsmall pure-button")) }}
    @else
        {{ Form::submit("Oui, je veux supprimer ce projet", array('class' => "button-success button-xsmall pure-button")) }}
    @endif

    @if(isset($project->id))
    <p>
        <a href="{{ ('/chocolat/project/'.$project->id.'') }}" class="button-xsmall button-danger pure-button">&larr; Annuler </a>
    </p>
    @else
    <p>
        <a href="{{ ('/chocolat/projects') }}" class="button-xsmall button-danger pure-button">&larr; Annuler </a>
    </p>
    @endif

    {{ Form::close() }}
@stop