@extends('admin.master')

@section('header')
    
    <h1>Projets</h1>
    <h2>Visualisation</h2>

@stop

@section('content')
    <h2>Projet : {{{ $project->name }}}</h2>

    <p>
    @if($project->category)
        Catégorie :
        {{ link_to('/chocolat/projects/categories/' . $project->category->name, $project->category->name) }}
    @endif
    </p>

    <p>
        Créer le : {{ $project->created_at }}<br>
        Dernière modification : {{ $project->updated_at }}<br>
        <a href="{{ url('/chocolat/projects') }}" class="button-xsmall button-warning pure-button">Retour à la liste</a>    
        <a href="{{ url('chocolat/project/'.$project->id.'/edit') }}" class="button-xsmall button-success pure-button">Modifier</a>
        <a href="{{ url('chocolat/project/'.$project->id.'/delete') }}" class="button-xsmall button-danger pure-button">Supprimer</a>
    </p>

    
    
@stop