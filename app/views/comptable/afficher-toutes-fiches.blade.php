@extends('layout')

@section('content')  

<?php if(User::isComptable()): ?>
    <div class="pull-right">
        <a href="/" class="btn btn-default">Retour</a>
    </div>    
    <p class="lead">Liste de toutes les fiches frais</p>
    <table class="table table-hover">
        <tr>
            <th>Date</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Etat</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach(FicheFrais::get() as $fiche): ?>
        <tr>
            <?php $user = User::getWithId($fiche->user_id); ?>
            <?php $etat = Etat::getWithId($fiche->etat_id); ?>
            <td><?php echo sprintf('%02d', $fiche->mois, 2) . '/' . $fiche->annee; ?></td>
            <td><?php echo $user->nom; ?></td>
            <td><?php echo $user->prenom; ?></td>
            <td><?php echo $etat->libelle; ?></td>
            <td><a href="{{ URL::route('voir_fiche', $fiche->id) }}"><i class="fa fa-pencil"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </table>

<?php endif; ?>


@stop