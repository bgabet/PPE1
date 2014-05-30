<?php

Class FraisHorsForfait extends Eloquent
{
    protected $table = 'fraisHorsForfaits';
    
    public static function getWithDate($month, $year, $id){
        return self::where('mois', '=', $month)
            ->where('annee', '=', $year)
            ->where('user_id', '=', $id)
            ->get();
    }
    
    public static function ajouter($data){
        self::insert(array(
            'jour' => $data['jour'],
            'mois' => $data['mois'],
            'annee' => $data['annee'],
            'montant' => $data['montant'],
            'quantite' => $data['quantite'],
            'libelle' => $data['libelle'],
            'user_id' => Auth::user()->id
        ));
        
        return true;
    }
    
    public static function deleteFrais($id){
        return self::find($id)->delete();
    }
}