<?php

Class FraisForfait extends Eloquent
{
    protected $table = 'fraisForfaits';

    public static function getWithDate($month, $year){
        return self::where('mois', '=', $month)
            ->where('annee', '=', $year)
            ->where('user_id', '=', Auth::user()->id)
            ->get();
    }

    public static function getWithIdForfaitAndDate($id, $month, $year){
        return self::where('id_forfait', '=', $id)
            ->where('annee', '=', $year)
            ->where('mois', '=', $month)
            ->where('user_id', '=', Auth::user()->id)
            ->get();
    }
    
    public static function sumForForfait($id_forfait, $month, $year, $id_user){
        return self::where('forfait_id', '=', $id_forfait)
            ->where('annee', '=', $year)
            ->where('mois', '=', $month)
            ->where('user_id', '=', $id_user)
            ->sum('quantite');
    }
    
    public static function ajouter($data){
        foreach(Forfait::get() as $forfait){
            $quantite = $data['forfait-' . $forfait->id];
            if($quantite != 0){
                self::insert(array(
                    'mois' => $data['mois'],
                    'annee' => $data['annee'],
                    'quantite' => $data['forfait-' . $forfait->id],
                    'forfait_id' => $forfait->id,
                    'user_id' => Auth::user()->id
                ));
            }
        }
        return true;
    }
    
    public static function getFrais($id_forfait, $id_user, $mois, $annee){
        return self::where('forfait_id', '=', $id_forfait)
                ->where('user_id', '=', $id_user)
                ->where('mois', '=', $mois)
                ->where('annee', '=', $annee)
                ->get();
    }
    
    public static function deleteFrais($id){
        return self::find($id)->delete();
    }
    
}