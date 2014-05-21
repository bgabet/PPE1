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
}