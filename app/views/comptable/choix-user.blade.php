@extends('layout')

@section('content')  

{{ Form::open(array('url' => 'comptable/choix-fiche', 'method' => 'post')) }}
<p>Selectionner un utilisateur</p>
<select name="user">
    <?php foreach(User::get() as $key => $user): ?>
    <option value="<?php echo $user->id; ?>"><?php echo ucfirst($user->nom) . " - " . ucfirst($user->prenom); ?></option>
    <?php endforeach; ?>
</select>
{{ Form::submit('OK') }}

{{ Form::close() }}

