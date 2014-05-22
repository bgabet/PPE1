<?php

// récupérer id de la fiche sélectionné par le formulaire en dessous
// ajouter le selected sur le foreach en dessous

$month = Carbon::now()->month;
$year = Carbon::now()->year;

$id_fiche = Session::get('id_fiche');
if(isset($id_fiche) && !empty($id_fiche)){
    $fichefrais = FicheFrais::getWithId($id_fiche);
    $month = $fichefrais->mois;
    $year = $fichefrais->annee;
}

?>

<form action="voir-fiche-frais" method="post">
    <p>Fiche frais du  
        <select name="choix-fiche" id="choix-fiche-frais">
            <?php
                foreach(FicheFrais::getWithIdUser() as $key => $fiche){
                    if($month == $fiche->mois && $year == $fiche->annee){
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

<br><br>
<table>
    <tr>
        <td>Forfaits</td>
        <td>quantité</td>
        <td>Prix total</td>
    </tr>
    <?php
    foreach(Forfait::get() as $forfait):
        echo "<tr>";
        $quantity = FraisForfait::sumForForfait($forfait->id, $month, $year);
        if(!isset($quantity) || empty($quantity)){
            $quantity = 0;
        } 
        
        echo '<td>' . $forfait->libelle . '</td>';
        echo '<td>' . $quantity . '</td>';
        echo '<td>' . $quantity * $forfait->montant . '</td>';
        echo "</tr>";
    endforeach;
    ?>
    
    
</table>


<br><br>

<table>
    <tr>
        <th>Date</th>
        <th>libellé</th>
        <th>Montant</th>
        <th>Quantité</th>
        <th>Action</th>
    </tr>
    <?php 
    foreach (FraisHorsForfait::getWithDate($month, $year) as $fhf):
        $d = array($fhf->jour, $fhf->mois, $fhf->annee);
        $date = implode('/', $d);
        echo "<tr>";
            echo "<td>" . implode('/', $d) . "</td>";
            echo "<td>" . $fhf->libelle . "</td>";
            echo "<td>" . $fhf->montant . "</td>";
            echo "<td>" . $fhf->quantite . "</td>";
            echo "<td>test</td>";
        echo "</tr>";
    endforeach; 
    ?>   
</table>