@extends('layout')

@section('content')  

{{ Form::open(array('url' => 'comptable/fiche', 'method' => 'post')) }}
<div class="pull-right">
    <a href="/" class="btn btn-default">Retour</a>
</div>
<p class="lead">Selectionnez une fiche</p>

<div class="form-group">
    <select name="fiche" class="form-control">
        <?php foreach(FicheFrais::getWithIdUser($id_user) as $key => $fiche): ?>
        <option value="<?php echo $fiche->id; ?>"><?php echo sprintf('%02d', $fiche->mois, 2) . " - " . $fiche->annee; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<button type="submit" class="btn btn-primary">Ok</button>  

{{ Form::close() }}

@stop