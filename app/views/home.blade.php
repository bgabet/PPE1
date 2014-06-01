@extends('layout')

@section('content')  

<?php if(User::isVisiteur()): ?>
    <p>
        <a href="saisir-frais" class="btn btn-primary center-block">Saisir un frais</a>
    </p>
    <p>
        <a href="voir-fiche-frais" class="btn btn-primary center-block">Voir une fiche de frais</a>
    </p>
<?php endif; ?>

<?php if(User::isComptable()): ?>
    <p>
        <a href="comptable/choix-user" class="btn btn-primary center-block">Voir une fiche frais</a>
    </p>
    <p>
        <a href="comptable/voir-toutes-fiches" class="btn btn-primary center-block">Voir toutes les fiches frais</a>
    </p>
<?php endif; ?>

<?php if(User::isAdmin()): ?>
    <p>
        <a href="/ajouter-user" class="btn btn-primary center-block">Ajouter user</a>
    </p>
<?php endif; ?>

<p>
    <a href="/deconnexion" class="btn btn-primary center-block">Déconnexion</a>
</p>

@stop