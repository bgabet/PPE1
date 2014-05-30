<?php if(User::isVisiteur()): ?>
<?php
$fiche = FicheFrais::find($fiche_id);
$forfait = Forfait::find($forfait_id);
?>
<a href="/voir-fiche-frais">Retour</a>
<br><br>

<table>
    <tr>
        <th>Libellé</th>
        <th>Date</th>
        <th>Quantité</th>
        <th>Prix total</th>
        <?php if(FicheFrais::isCloture($fiche->mois, $fiche->annee) === false): ?><th>Action</th><?php endif; ?>
    </tr>
    <?php foreach(FraisForfait::getFrais($forfait_id, $user_id, $fiche->mois, $fiche->annee) as $frais): ?>
    <tr>
        <td><?php echo $forfait->libelle; ?></td>
        <td><?php echo sprintf('%02d', $frais->mois, 2) . "/" . $frais->annee; ?></td>
        <td><?php echo $frais->quantite; ?></td>
        <td><?php echo $forfait->montant * $frais->quantite; ?></td>
        <?php if(FicheFrais::isCloture($fiche->mois, $fiche->annee) === false): ?>
            <td><a href="{{{ URL::route('supprimer-frais-forfait', $frais->id) }}}">Supprimer de frais</a></td>
        <?php endif; ?>
        
    </tr>
    <?php endforeach; ?>
    
    
</table>

<?php endif; ?>