@extends('admin.master')

@section('header')
    <h1>Projets</h1>
    <h2>
        Tous les projets 
        @if(isset($projectegory)) 
        de la catégorie {{$category->name}} 
        @endif
    </h2>
@stop

@section('content')
    
    <h2>
        Liste des projets existants 
        <small>
            <a href="{{ url('chocolat/project/create') }}" class="pure-button pure-button-small">Nouveau</a>
        </small>
    </h2>

    <table class="pure-table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Catégorie</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{{ $project->name }}}</td>
                <td>{{{ $project->category->name }}}</td>
                <td>
                    <a href="{{ url('/chocolat/project/'.$project->id) }}" class="pure-button pure-button-small">Voir</a>
                    <a href="{{ url('/chocolat/project/'.$project->id.'/edit') }}" class="pure-button pure-button-small pure-button-secondary">Modifier</a>
                    <a href="{{ url('/chocolat/project/'.$project->id.'/delete') }}" class="pure-button pure-button-small pure-button-error">Supprimer</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
@stop
