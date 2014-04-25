@extends('layout')

@section('content')    
    
    <?php
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;
    
    $currentFiche = FicheFrais::getWithDate($currentMonth, $currentYear);
    $fiches = FicheFrais::getWithIdUser();
    
    if(isset($_POST['choixFiche']) && !empty($_POST['choixFiche'])){
        $id_fiche = $_POST['choixFiche'];
    }else{
        $id_fiche = $currentFiche->id;
    }
    
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


    
@stop