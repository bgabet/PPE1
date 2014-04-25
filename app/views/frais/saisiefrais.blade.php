@extends('layout')

@section('content')    
    
    <?php
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;
    
    $currentFiche = DB::table('ficheFrais')
            ->where('mois', '=', $currentMonth)
            ->where('annee', '=', $currentYear)
            ->first();
    $fiches = DB::table('ficheFrais')
            ->where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();
    
    if(isset($_POST['choixFiche']) && !empty($_POST['choixFiche'])){
        $id_fiche = $_POST['choixFiche'];
    }else{
        $id_fiche = $currentFiche->id;
    }
    
    $selected_fiche = DB::table('ficheFrais')
            ->where('id', '=', $id_fiche)
            ->first();
    
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

<?php
$forfaits = DB::table('forfaits')->get();

foreach ($forfaits as $forfait) {
    $fraisforfaits = DB::table('fraisForfaits')->where('forfait_id', '=', $forfait->id)->get();
    $count = 0;
    foreach ($fraisforfaits as $frais) {
        $count = $count + $frais->quantite;
    }
    echo Form::label('quantite-' . $forfait->id, $forfait->libelle);
    echo Form::text('quantite-' . $forfait->id, $count) . '<br>';
    
}


?>
    
@stop