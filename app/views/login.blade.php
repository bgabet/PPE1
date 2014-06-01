@extends('layout')

@section('content')

    {{ Form::open(array('url' => '/login', 'method' => 'post')) }}
        
        <div class="form-group">
            <label for="nom">Nom d'utilisateur : </label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="password">Nom d'utilisateur : </label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>    
        
    {{ Form::close() }}
    
@stop
