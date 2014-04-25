<?php

class ForfaitTableSeeder extends Seeder {

    public function run()
    {
        DB::table('forfaits')->insert(
            array(
                array('libelle' => 'Forfait Etape','montant' => '110', 'designation' =>'ETP'),
                array('libelle' => 'Frais Kilométrique','montant' => '0.62', 'designation' => 'KM'),
                array('libelle' => 'Nuitée Hôtel','montant' => '80', 'designation' => 'NUI'),
                array('libelle' => 'Repas Restaurant','montant' => '25', 'designation' => 'REP'),
            )
        );
    }

}