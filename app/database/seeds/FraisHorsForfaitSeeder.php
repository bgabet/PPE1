<?php

class FraisHorsForfaitSeeder extends Seeder {

    public function run()
    {
        DB::table('fraisHorsForfaits')->insert(array(
            array(
                'jour' => '15',
                'mois' => '05', 
                'annee' => '2014',
                'user_id' => '3', 
                'libelle' => 'Repas avec client',
                'montant' => '54.20',
                'quantite' => "2"
            ),
            array(
                'jour' => '30',
                'mois' => '05', 
                'annee' => '2014',
                'user_id' => '3', 
                'libelle' => 'Repas avec client',
                'montant' => '43.12',
                'quantite' => "1"
            ),
            array(
                'jour' => '12',
                'mois' => '05', 
                'annee' => '2014',
                'user_id' => '3', 
                'libelle' => 'Repas avec client',
                'montant' => '89.2',
                'quantite' => "1"
            ),
            array(
                'jour' => '07',
                'mois' => '05', 
                'annee' => '2014',
                'user_id' => '3', 
                'libelle' => 'Repas avec client',
                'montant' => '25',
                'quantite' => "4"
            ),
            array(
                'jour' => '15',
                'mois' => '04', 
                'annee' => '2014',
                'user_id' => '3', 
                'libelle' => 'Repas avec client',
                'montant' => '54.20',
                'quantite' => "2"
            ),
            array(
                'jour' => '30',
                'mois' => '04', 
                'annee' => '2014',
                'user_id' => '3', 
                'libelle' => 'Repas avec client',
                'montant' => '43.12',
                'quantite' => "1"
            ),
            array(
                'jour' => '12',
                'mois' => '04', 
                'annee' => '2014',
                'user_id' => '3', 
                'libelle' => 'Repas avec client',
                'montant' => '89.2',
                'quantite' => "1"
            ),
            array(
                'jour' => '07',
                'mois' => '04', 
                'annee' => '2014',
                'user_id' => '3', 
                'libelle' => 'Repas avec client',
                'montant' => '25',
                'quantite' => "4"
            ),
            array(
                'jour' => '15',
                'mois' => '05', 
                'annee' => '2014',
                'user_id' => '4', 
                'libelle' => 'Repas avec client',
                'montant' => '54.20',
                'quantite' => "2"
            ),
            array(
                'jour' => '30',
                'mois' => '05', 
                'annee' => '2014',
                'user_id' => '4', 
                'libelle' => 'Repas avec client',
                'montant' => '43.12',
                'quantite' => "1"
            ),
            array(
                'jour' => '12',
                'mois' => '05', 
                'annee' => '2014',
                'user_id' => '4', 
                'libelle' => 'Repas avec client',
                'montant' => '89.2',
                'quantite' => "1"
            ),
            array(
                'jour' => '07',
                'mois' => '05', 
                'annee' => '2014',
                'user_id' => '4', 
                'libelle' => 'Repas avec client',
                'montant' => '25',
                'quantite' => "4"
            ),
            array(
                'jour' => '15',
                'mois' => '04', 
                'annee' => '2014',
                'user_id' => '4', 
                'libelle' => 'Repas avec client',
                'montant' => '54.20',
                'quantite' => "2"
            ),
            array(
                'jour' => '30',
                'mois' => '04', 
                'annee' => '2014',
                'user_id' => '4', 
                'libelle' => 'Repas avec client',
                'montant' => '43.12',
                'quantite' => "1"
            ),
            array(
                'jour' => '12',
                'mois' => '04', 
                'annee' => '2014',
                'user_id' => '4', 
                'libelle' => 'Repas avec client',
                'montant' => '89.2',
                'quantite' => "1"
            ),
            array(
                'jour' => '07',
                'mois' => '04', 
                'annee' => '2014',
                'user_id' => '4', 
                'libelle' => 'Repas avec client',
                'montant' => '25',
                'quantite' => "4"
            ),
        ));
    }

}