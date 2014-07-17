@extends('admin.master')

@section('header')
    <h2>Connexion</h2>
@stop

@section('content')
    {{ Form::open( array('class' => "pure-form pure-form-stacked")) }}

        <h2></h2>

        {{ Form::label('Login') }} 
        {{ Form::text('username') }}
        
        {{ Form::label('Password') }} 
        {{ Form::password('password') }}

        {{ Form::submit('se connecter', array('class' => "pure-button")) }}

    </fieldset>

    
    {{ Form::close() }}
@stop