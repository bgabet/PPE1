<?php

Class FicheFrais extends Eloquent
{
    
    protected $table = 'ficheFrais';
    
    public static function getWithDate($month, $year){
        return FicheFrais::where('mois', '=', $month)
                ->where('annee', '=', $year)
                ->where('user_id', '=', Auth::user()->id)
                ->first();
    }
    
    public static function getWithIdUser() {
        return FicheFrais::where('user_id', '=', Auth::user()->id)->get();
    }
    
    public static function cloturerFiche($month, $year) {
        return FicheFrais::where('mois', '=', $month)
                ->where('annee', '=', $year)
                ->where('user_id', '=', Auth::user()->id)
                ->update(array('etat_id' => 2));
    }
    
    public static function createSheet() {
        return FicheFrais::insert(array(
            'mois' => Carbon::now()->month,
            'annee' => Carbon::now()->year,
            'user_id' => Auth::user()->id,
            'etat_id' => 3
        ));
    }
}