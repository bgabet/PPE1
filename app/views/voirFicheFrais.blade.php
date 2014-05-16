<?php

// récupérer id de la fiche sélectionné par le formulaire en dessous
// ajouter le selected sur le foreach en dessous


?>

<form action="test" method="post">
    <p>Fiche frais du mois de 
        <select name="choix-fiche-frais" id="choix-fiche-frais">
            <?php
                foreach(FicheFrais::getWithIdUser() as $key => $fiche){
                    echo "<option value=" . $fiche->id . ">" . $fiche->mois . " - " . $fiche->annee . "</option>";
                }
            ?>
        </select>
        {{ Form::submit('OK') }}
    </p>
</form>