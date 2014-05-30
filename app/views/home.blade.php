@extends('layout')

@section('content')  

<?php if(User::isVisiteur()): ?>
    <ul>
        <li><a href="saisir-frais">Saisir un frais</a></li>
        <li><a href="voir-fiche-frais">Voir une fiche de frais</a></li>
        <li><a href="deconnexion">Déconnexion</a></li>
    </ul>
<?php endif; ?>

<?php if(User::isComptable()): ?>
    <ul>
        <li><a href="comptable/choix-user">Voir une fiche frais</a></li>
        <li><a href="comptable/voir-toutes-fiches">Voir toutes les fiches frais</a></li>
        <li><a href="deconnexion">Déconnexion</a></li>
    </ul>
<?php endif; ?>

<?php if(User::isAdmin()): ?>
    <ul>
        <li><a href="saisir-frais">ajouter user</a></li>
        <li><a href="voir-fiche-frais">ajouter fonction</a></li>
        <li><a href="deconnexion">Déconnexion</a></li>
    </ul>
<?php endif; ?>


@stop