@extends('layout')

@section('content')  

<?php
    $errorslogin = Session::get('login');
    if(isset($errorslogin) && !empty($errorslogin)){
        echo '<div class="alert alert-danger">Le login est déjà utilisé</div>';
    }

    $errors = Session::get('errors');
    if(isset($errors) && !empty($errors)){
        echo '<div class="alert alert-danger">Les données rentrées ne sont pas exactes</div>';
    }
   
    if(isset($success) && !empty($success)){
        echo '<div class="alert alert-success">' . $success . '</div>';
    }
?>

{{ Form::open(array('url' => '/ajout-user', 'method' => 'post')) }} 
    <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom : </label>
        <input type="text" class="form-control" id="prenom" name="prenom">
    </div>
    <div class="form-group">
        <label for="email">Email : </label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="login">Login : </label>
        <input type="text" class="form-control" id="login" name="login">
    </div>
    <div class="form-group">
        <label for="password">Password : </label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="adresse">Adresse : </label>
        <input type="text" class="form-control" id="adresse" name="adresse">
    </div>
    <div class="form-group">
        <label for="cp">Code postal : </label>
        <input type="text" class="form-control" id="cp" name="cp">
    </div>
    <div class="form-group">
        <label for="ville">Ville : </label>
        <input type="text" class="form-control" id="ville" name="ville">
    </div>
    <div class="form-group">
        <label for="dateembauche">Date d'embauche (jj/mm/aaaa) : </label>
        <input type="text" class="form-control" id="dateembauche" name="dateembauche">
    </div>
    <div class="form-group">
        <label for="fonction">Fonction : </label>
        <select name="fonction" id="fonction" class="form-control">
            <?php foreach(Fonction::get() as $fonction): ?>
            <option value="<?php echo $fonction->id; ?>"><?php echo $fonction->libelle; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button> 
    <a href="/" class="btn btn-default">Retour</a>

{{ Form::close() }} 



@stop