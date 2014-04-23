@extends('layout')

@section('content')    
    
    {{ Form::open(array('url' => 'login', 'method' => 'post')) }} 
        {{ Form::label('nom', "Nom d'utilisateur : ") }}
        {{ Form::text("nom") }}
        {{ Form::label('password', 'Mot de passe : ') }}
        {{ Form::password('password') }}
        {{ Form::submit('Connexion') }}
    {{ Form::close() }} 
    
@stop
