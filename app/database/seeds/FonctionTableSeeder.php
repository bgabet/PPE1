<?php

class FonctionTableSeeder extends Seeder {

    public function run()
    {
        DB::table('fonctions')->insert(
            array(
                array('libelle' => 'admin'),
                array('libelle' => 'comptable'),
                array('libelle' => 'visiteur'),
            )
        );
    }

}
