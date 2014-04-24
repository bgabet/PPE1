<?php


 
$row = DB::table('ficheFrais')
    ->where('mois', '=', 3)
    ->where('annee', '=', 2014)
    ->update(array('etat_id' => 2));
