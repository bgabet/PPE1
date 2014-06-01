<?php

Class FicheFrais extends Eloquent
{
    
    protected $table = 'ficheFrais';
    
    public static function getWithDate($month, $year, $id){
        return self::where('mois', '=', $month)
                ->where('annee', '=', $year)
                ->where('user_id', '=', $id)
                ->first();
    }
    
    public static function getWithId($id){
        return FicheFrais::where('id', '=', $id)->first();
    }
    
    public static function getWithIdUser($id) {
        return FicheFrais::where('user_id', '=', $id)->orderBy('id', 'desc')->get();
    }
    
    public static function cloturerFiche($month, $year) {
        return self::where('mois', '=', $month)
                ->where('annee', '=', $year)
                ->where('user_id', '=', Auth::user()->id)
                ->update(array('etat_id' => 2));
    }
    
    public static function isCloture($month, $year) {
        $fiche = self::where('mois', '=', $month)
                ->where('annee', '=', $year)
                ->where('user_id', '=', Auth::user()->id)
                ->first();
        if(isset($fiche) && !empty($fiche)){
            if($fiche->etat_id != 3){
                return true;
            }
        }
        return false;
    }
    
    public static function isExist($month, $year){
        $id = Auth::user()->id;
        $a = self::getWithDate($month, $year, $id);
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
    
    public static function modifierEtat($id_fiche, $id_etat){
	return self::where('id', '=', $id_fiche)
                ->update(array('etat_id' => $id_etat));
    }
}