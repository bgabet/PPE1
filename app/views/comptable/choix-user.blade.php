@extends('layout')

@section('content')  

{{ Form::open(array('url' => 'comptable/choix-fiche', 'method' => 'post')) }}
<div class="pull-right">
    <a href="/" class="btn btn-default">Retour</a>
</div>
<p class="lead">Selectionner un utilisateur</p>
<div class="form-group">
    <select name="user" class="form-control">
        <?php foreach(User::get() as $key => $user): ?>
            <?php if($user->fonction_id == 3): ?>
                <option value="<?php echo $user->id; ?>"><?php echo ucfirst($user->nom) . " - " . ucfirst($user->prenom); ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
</div>

<button type="submit" class="btn btn-primary">Ok</button>   

{{ Form::close() }}

@stop