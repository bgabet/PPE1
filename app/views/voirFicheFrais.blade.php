@extends('layout')

@section('content')  

<div class="pull-right">
<a href="/" class="btn btn-default">Retour</a>
</div>
<?php

if(isset($id_fiche) && !empty($id_fiche)){
    $fichechoisi = FicheFrais::getWithId($id_fiche);
    $month = $fichechoisi->mois;
    $year = $fichechoisi->annee;
    $user_id = $fichechoisi->user_id;
}else{
    $month = Carbon::now()->month;
    $year = Carbon::now()->year;
    $id = Session::get('id_user_choisi');
    $user_id = Auth::user()->id;
    $fichechoisi = FicheFrais::getWithDate($month, $year, $user_id);
}

?>
<?php if(User::isVisiteur()): ?>



<form action="/voir-fiche-frais" method="post" id="change-fiche" class="form-inline">
    <p class="lead ">Fiche frais du 
        <select name="choix-fiche" id="choix-fiche-frais" class="form-control" onchange="$('#change-fiche').submit();">
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
    </p>
</form>

<?php endif; ?>

<?php if(User::isComptable()){
    echo '<p class="lead ">Fiche frais du ' . sprintf('%02d', $fichechoisi->mois, 2) . ' - ' . $fichechoisi->annee . '</p>';
} ?>
<hr>

<form action="/comptable-modifier-etat-fiche" method="post" class="form-inline">
    <?php echo Form::hidden('ficheid', $fichechoisi->id); ?>
    <p>L'état de la fiche est : 
        <?php 
        if(User::isVisiteur()){
            echo '<select disabled name="etatfiche" class="form-control">';
        }else{
            echo '<select name="etatfiche" class="form-control">';
        } 
        
            foreach(Etat::get() as $etat): ?>
                <?php if($etat->id === $fichechoisi->etat_id){
                  $check = 'selected';
                }else{
                  $check = '';
                } ?>
                <option <?php echo $check; ?> value="<?php echo $etat->id; ?>">
                    <?php echo $etat->libelle; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if(User::isComptable()): ?>
            <button type="submit" class="btn btn-default">Ok</button>   
        <?php endif; ?>
    </p>
{{ Form::close() }}
<p>&nbsp;</p>

<p class="lead">
    Frais Forfait
</p>

<table class="table table-hover">
    <tr>
        <td>Forfaits</td>
        <td>quantité</td>
        <td>Prix total</td>
        <?php if((User::isVisiteur()) && (FicheFrais::isCloture($month, $year) === false)): ?>
            <td>&nbsp;</td>
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
                echo '<td><a href="' . URL::route('modifier-frais-forfait', $data) . '"><i class="fa fa-pencil"></i></a></td>';
            }
        echo "</tr>";
    endforeach;
    ?>
</table>

<?php if(User::isVisiteur()): ?>
    <p>
        <a href="/ajouter-frais-forfait" class="btn btn-primary center-block">Ajouter un frais forfait</a>
    </p>
<?php endif; ?>

<p>&nbsp;</p>

<p class="lead">
    Frais Hors Forfait
</p>

<table class="table table-hover">
    <tr>
        <th>Date</th>
        <th>libellé</th>
        <th>Montant</th>
        <th>Quantité</th>
        <th>&nbsp;</th>
    </tr>
    <?php 
    foreach (FraisHorsForfait::getWithDate($month, $year, $user_id) as $fhf):
        $d = array(sprintf('%02d', $fhf->jour, 2), sprintf('%02d', $fhf->mois, 2), $fhf->annee);
        echo "<tr>";
            echo "<td>" . implode('/', $d) . "</td>";
            echo "<td>" . $fhf->libelle . "</td>";
            echo "<td>" . $fhf->montant . "</td>";
            echo "<td>" . $fhf->quantite . "</td>";
            echo '<td>';
            $data = array('id_fiche' => $fichechoisi->id, 'id_fhf' => $fhf->id);
            if(User::isComptable()){
                echo '<a href="' . URL::route('supprimer-frais-hors-forfait', $data) . '"><i class="fa fa-times"></i></a>';
            }else{
                if(User::isVisiteur() && FicheFrais::isCloture($month, $year) == false):
                    echo '<a href="' . URL::route('supprimer-frais-hors-forfait', $data) . '"><i class="fa fa-times"></i></a>';
                endif;
            }
            echo '</td>';
        echo "</tr>";
    endforeach; 
    ?>   
</table>

<?php if(User::isVisiteur()): ?>
    <p>
        <a href="/ajouter-frais-hors-forfait" class="btn btn-primary center-block">Ajouter un frais hors forfait</a>
    </p>
<?php endif; ?>

@stop