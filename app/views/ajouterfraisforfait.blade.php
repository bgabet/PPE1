@extends('layout')

@section('content')    

<?php
    $errors = Session::get('errors');
    if(isset($errors) && !empty($errors)){
        echo '<div class="alert alert-danger">Les données rentrées ne sont pas exactes</div>';
    }

    $success = Session::get('success');
    if(isset($success)){
        echo '<div class="alert alert-success">' . $success . '</div>';
    }
?>
<p class="lead ">
    <strong>Ajouter des frais forfait </strong><small>(justificatifs obligatoires).</small>
</p>
<hr>
{{ Form::open(array('url' => 'ajouter-frais-forfait', 'method' => 'post')) }} 

    <?php $date = sprintf('%02d', Carbon::now()->day) . "/" . sprintf('%02d', Carbon::now()->month) . "/" . Carbon::now()->year; ?>

    <div class="form-group">
        <label for="mois">Entrez le mois (2 chiffres) : </label>
        <input type="text" class="form-control" id="mois" name="mois" value="<?php echo sprintf('%02d', Carbon::now()->month) ?>">
    </div>
    <div class="form-group">
        <label for="annee">Entrez l'année (4 chiffres) : </label>
        <input type="text" class="form-control" id="annee" name="annee" value="<?php echo Carbon::now()->year ?>">
    </div>

    <?php foreach(Forfait::get() as $forfait): ?>
        <div class="form-group">
            <label for="forfait-<?php echo $forfait->id; ?>"><?php echo $forfait->libelle; ?> : </label>
            <input type="text" class="form-control" id="forfait-<?php echo $forfait->id; ?>" name="forfait-<?php echo $forfait->id; ?>" value="0">
        </div>
    <?php endforeach; ?>

    <button type="submit" class="btn btn-primary">Ajouter</button>
    <a href="saisir-frais" class="btn btn-default">Retour</a>

{{ Form::close() }} 
    
@stop