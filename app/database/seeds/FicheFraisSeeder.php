<?php

class FicheFraisSeeder extends Seeder {

    public function run()
    {
        DB::table('ficheFrais')->insert(array(
            array(
                'mois' => '03', 
                'annee' => '2014',
                'user_id' => '3', 
                'etat_id' => '1',
            ),
            array(
                'mois' => '04', 
                'annee' => '2014',
                'user_id' => '3', 
                'etat_id' => '4',
            ),
            array(
                'mois' => '05', 
                'annee' => '2014',
                'user_id' => '3', 
                'etat_id' => '3',
            ),
            array(
                'mois' => '06', 
                'annee' => '2014',
                'user_id' => '3', 
                'etat_id' => '3',
            ),
            array(
                'mois' => '03', 
                'annee' => '2014',
                'user_id' => '4', 
                'etat_id' => '1',
            ),
            array(
                'mois' => '04', 
                'annee' => '2014',
                'user_id' => '4', 
                'etat_id' => '4',
            ),
            array(
                'mois' => '05', 
                'annee' => '2014',
                'user_id' => '4', 
                'etat_id' => '3',
            ),
            array(
                'mois' => '06', 
                'annee' => '2014',
                'user_id' => '4', 
                'etat_id' => '3',
            )
        ));
    }

}