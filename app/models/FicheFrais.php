<?php

Class FicheFrais extends Eloquent
{
    
    protected $table = 'ficheFrais';
    
    public static function getWithDate($month, $year){
        return self::where('mois', '=', $month)
                ->where('annee', '=', $year)
                ->where('user_id', '=', Auth::user()->id)
                ->first();
    }
    
    public static function getWithId($id){
        return FicheFrais::where('id', '=', $id)->first();
    }
    
    public static function getWithIdUser() {
        return FicheFrais::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();
    }
    
    public static function cloturerFiche($month, $year) {
        return self::where('mois', '=', $month)
                ->where('annee', '=', $year)
                ->where('user_id', '=', Auth::user()->id)
                ->update(array('etat_id' => 2));
    }
    
    public static function isExist($month, $year){
        $a = self::getWithDate($month, $year);
        if(isset($a) && !empty($a)){
            return true;
        }
        return false;
    }
    
    public static function createSheet($month, $year) {
        return self::insert(array(
            'mois' => $month,
            'annee' => $year,
            'user_id' => Auth::user()->id,
            'etat_id' => 3
        ));
    }
}