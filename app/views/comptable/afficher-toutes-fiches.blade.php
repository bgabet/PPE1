@extends('layout')

@section('content')  

<?php if(User::isComptable()): ?>
    
<table>
    <tr>
        <th>date (mm/aaaa)</th>
        <th>nom</th>
        <th>prénom</th>
        <th>état</th>
        <th>action</th>
    </tr>
    <?php foreach(FicheFrais::get() as $fiche): ?>
    <tr>
        <?php $user = User::getWithId($fiche->user_id); ?>
        <?php $etat = Etat::getWithId($fiche->etat_id); ?>
        <td><?php echo sprintf('%02d', $fiche->mois, 2) . '/' . $fiche->annee; ?></td>
        <td><?php echo $user->nom; ?></td>
        <td><?php echo $user->prenom; ?></td>
        <td><?php echo $etat->libelle; ?></td>
        <td><a href="{{ URL::route('voir_fiche', $fiche->id) }}">accéder</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php endif; ?>


@stop