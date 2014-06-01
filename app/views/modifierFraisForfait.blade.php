@extends('layout')

@section('content')  

<?php if(User::isVisiteur()): ?>
<?php
$fiche = FicheFrais::find($fiche_id);
$forfait = Forfait::find($forfait_id);
?>
<div class="pull-right">
<a href="/" class="btn btn-default">Retour</a>
</div>
<p class="lead">Modification d'un frais forfait</p>

<table class="table table-hover">
    <tr>
        <th>Libellé</th>
        <th>Date</th>
        <th>Quantité</th>
        <th>Prix total</th>
        <?php if(FicheFrais::isCloture($fiche->mois, $fiche->annee) === false): ?>
            <th>&nbsp;</th>
        <?php endif; ?>
    </tr>
    <?php foreach(FraisForfait::getFrais($forfait_id, $user_id, $fiche->mois, $fiche->annee) as $frais): ?>
    <tr>
        <td><?php echo $forfait->libelle; ?></td>
        <td><?php echo sprintf('%02d', $frais->mois, 2) . "/" . $frais->annee; ?></td>
        <td><?php echo $frais->quantite; ?></td>
        <td><?php echo $forfait->montant * $frais->quantite; ?></td>
        <?php if(FicheFrais::isCloture($fiche->mois, $fiche->annee) === false): ?>
            <td><a href="{{{ URL::route('supprimer-frais-forfait', $frais->id) }}}"><i class="fa fa-times"></i></a></td>
        <?php endif; ?>
        
    </tr>
    <?php endforeach; ?>
    
    
</table>

<?php endif; ?>

@stop