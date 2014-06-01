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

{{ Form::open(array('url' => 'ajouter-frais-hors-forfait', 'method' => 'post')) }} 

    <?php $date = sprintf('%02d', Carbon::now()->day) . "/" . sprintf('%02d', Carbon::now()->month) . "/" . Carbon::now()->year; ?>
    
    <div class="form-group">
        <label for="date">Entrez la date (jj/mm/aaaa) : </label>
        <input type="text" class="form-control" id="date" name="date" value="<?php echo $date; ?>">
    </div>
    <div class="form-group">
        <label for="libelle">Libellé : </label>
        <input type="text" class="form-control" id="libelle" name="libelle">
    </div>
    <div class="form-group">
        <label for="montant">Montant unitaire : </label>
        <input type="text" class="form-control" id="montant" name="montant">
    </div>
    <div class="form-group">
        <label for="quantite">Quantité : </label>
        <input type="text" class="form-control" id="quantite" name="quantite">
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
    <a href="saisir-frais" class="btn btn-default">Retour</a>

{{ Form::close() }} 
    
@stop