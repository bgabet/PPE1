@extends('layout')

@section('content')  

{{ Form::open(array('url' => 'comptable/fiche', 'method' => 'post')) }}
<p>Selectionnez une fiche</p>
<select name="fiche">
    <?php foreach(FicheFrais::getWithIdUser($id_user) as $key => $fiche): ?>
    <option value="<?php echo $fiche->id; ?>"><?php echo sprintf('%02d', $fiche->mois, 2) . " - " . $fiche->annee; ?></option>
    <?php endforeach; ?>
</select>
{{ Form::submit('OK') }}

{{ Form::close() }}

