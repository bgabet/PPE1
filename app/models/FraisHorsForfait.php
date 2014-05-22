<?php

Class FraisHorsForfait extends Eloquent
{
    protected $table = 'fraisHorsForfaits';
    
    public static function getWithDate($month, $year){
        return self::where('mois', '=', $month)
            ->where('annee', '=', $year)
            ->where('user_id', '=', Auth::user()->id)
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
}