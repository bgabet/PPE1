@extends('layout')

@section('content')    
    
    <?php
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;

    $month;
    $year;
    $fiche;

    if(isset($_POST['choixFiche']) && !empty($_POST['choixFiche'])){
        $id_fiche = $_POST['choixFiche'];
    }else{
        $id_fiche = $currentFiche->id;
    }

    $currentFiche = FicheFrais::getWithDate($currentMonth, $currentYear);
    $fiches = FicheFrais::getWithIdUser();


    $selected_fiche = FicheFrais::getWithIdUser($id_fiche);

    ?>

<h2>Fiche de frais du <select name="choixFiche" id="choixFiche">
        <?php foreach ($fiches as $fiche) {
            
            $month = $fiche->mois;
            $year = $fiche->annee;
            
            if($id_fiche == $fiche->id){
                echo '<option selected value="'.$fiche->id.'">'.sprintf("%02d", $month).'/'.$year.'</option>';
            }else{
                echo '<option value="'.$fiche->id.'">'.sprintf("%02d", $month).'/'.$year.'</option>';
            }
            
        } ?>
    </select>
</h2>

<table>
    <tr>
        <td>libelle</td>
        <td>quantite</td>
    </tr>
    <?php foreach(Forfait::get() as $forfait): ?>
    <tr>
        <td>{{ $forfait->libelle }}</td>
        <td>

        </td>
    </tr>

    <?php endforeach; ?>
</table>




    
@stop