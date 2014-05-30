@extends('layout')

@section('content')  

<a href="/">Retour</a>
<br><br>

<?php
if(isset($id_fiche) && !empty($id_fiche)){
    $fichechoisi = FicheFrais::getWithId($id_fiche);
    $month = $fichechoisi->mois;
    $year = $fichechoisi->annee;
    $user_id = $fichechoisi->user_id;
}else{
    $month = Carbon::now()->month;
    $year = Carbon::now()->year;
    $user_id = Auth::user()->id;
    $fichechoisi = FicheFrais::getWithDate($month, $year, $user_id);
}

?>
<?php if(User::isVisiteur() || User::isAdmin()): ?>
<form action="voir-fiche-frais" method="post">
    <p>Fiche frais du 
        <select name="choix-fiche" id="choix-fiche-frais">
            <?php
                foreach(FicheFrais::getWithIdUser($user_id) as $key => $fiche){
                    if($fichechoisi == $fiche){
                        echo "<option selected value=" . $fiche->id . ">" . sprintf('%02d', $fiche->mois, 2) . " - " . $fiche->annee . "</option>";
                    }else{
                        echo "<option value=" . $fiche->id . ">" . sprintf('%02d', $fiche->mois, 2) . " - " . $fiche->annee . "</option>";
                    }
                }
            ?>
        </select>
        {{ Form::submit('OK') }}
    </p>
</form>
<?php endif; ?>
<br><br>
<table>
    <tr>
        <td>Forfaits</td>
        <td>quantité</td>
        <td>Prix total</td>
        <?php if((User::isVisiteur()) && (FicheFrais::isCloture($month, $year) === false)): ?>
            <td>Action</td>
        <?php endif; ?>
    </tr>
    <?php
    foreach(Forfait::get() as $forfait):
        echo "<tr>";
        $quantity = FraisForfait::sumForForfait($forfait->id, $month, $year, $user_id);
        if(!isset($quantity) || empty($quantity)){
            $quantity = 0;
        } 
        $data = array(
            'forfait_id' => $forfait->id, 
            'user_id'    => Auth::user()->id,
            'fiche_id'   => $fichechoisi->id
        );
          
        echo '<td>' . $forfait->libelle . '</td>';
        echo '<td>' . $quantity . '</td>';
        echo '<td>' . $quantity * $forfait->montant . '</td>';
        if((User::isVisiteur()) && (FicheFrais::isCloture($month, $year) === false)){
            echo '<td><a href="' . URL::route('modifier-frais-forfait', $data) . '">Modifier</a></td>';
        }
        echo "</tr>";
    endforeach;
    ?>
    
    
</table>
<a href="ajouter-frais-forfait">ajouter-frais-forfait</a>


<br><br>

<table>
    <tr>
        <th>Date</th>
        <th>libellé</th>
        <th>Montant</th>
        <th>Quantité</th>
        <?php if((User::isVisiteur()) && (FicheFrais::isCloture($month, $year) === false)): ?>
            <th>Action</th>
        <?php endif; ?>
    </tr>
    <?php 
    foreach (FraisHorsForfait::getWithDate($month, $year, $user_id) as $fhf):
        $d = array($fhf->jour, sprintf('%02d', $fhf->mois, 2), $fhf->annee);
        echo "<tr>";
            echo "<td>" . implode('/', $d) . "</td>";
            echo "<td>" . $fhf->libelle . "</td>";
            echo "<td>" . $fhf->montant . "</td>";
            echo "<td>" . $fhf->quantite . "</td>";
            if((User::isVisiteur()) && (FicheFrais::isCloture($month, $year) === false)):
                echo '<td><a href="' . URL::route('supprimer-frais-hors-forfait', $fhf->id) . '">Supprimer</a><td>';
            endif;
        echo "</tr>";
    endforeach; 
    ?>   
</table>
<a href="ajouter-frais-hors-forfait">ajouter-frais-hors-forfait</a>

@stop