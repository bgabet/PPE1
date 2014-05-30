<?php

Class Etat extends Eloquent
{
    protected $table = 'etats';
    
    public static function getWithId($id){
        return self::where('id', '=', $id)->first();
    }
    
}