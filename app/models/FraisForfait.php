<?php

Class FraisForfait extends Eloquent
{
    protected $table = 'fraisForfaits';

    public static function getWithDate($month, $year){
        return FraisForfait::where('mois', '=', $month)
            ->where('annee', '=', $year)
            ->where('user_id', '=', Auth::user()->id)
            ->get();
    }

    public static function getWithIdForfaitAndDate($id, $month, $year){
        return FraisForfait::where('id_forfait', '=', $id)
            ->where('annee', '=', $year)
            ->where('mois', '=', $month)
            ->where('user_id', '=', Auth::user()->id)
            ->get();
    }

}