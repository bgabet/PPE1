<?php

class EtatTableSeeder extends Seeder {

    public function run()
    {
        DB::table('etats')->insert(
            array(
                array('libelle' => 'Remboursée', 'designation' => 'RB'),
                array('libelle' => 'Saisie clôturée', 'designation' => 'CL'),
                array('libelle' => 'Fiche créée, saisie en cours', 'designation' => 'CR'),
                array('libelle' => 'Validée et mise en paiement', 'designation' => 'VA'),
            )
        );
    }

}