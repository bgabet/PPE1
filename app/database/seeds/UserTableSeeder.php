<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->insert(array(
            array(
                'nom' => 'admin', 
                'prenom' => 'admin',
                'email' => 'admin@admin.fr', 
                'login' => 'admin',
                'password' => Hash::make('admin'), 
                'adresse' => '498 rue pinpin',
                'cp' => '69001', 
                'ville' => 'Lyon',
                'date_embauche' => '', 
                'fonction_id' => 1,
            ),
            array(
                'nom' => 'gabet', 
                'prenom' => 'benjamin',
                'email' => 'bgabet@bgabet.fr', 
                'login' => 'bgabet',
                'password' => Hash::make('bgabet'), 
                'adresse' => '498 rue de paul',
                'cp' => '69008', 
                'ville' => 'Lyon',
                'date_embauche' => '23/08/2007', 
                'fonction_id' => 2,
            ),
            array(
                'nom' => 'Robert', 
                'prenom' => 'Jean',
                'email' => 'rj@rj.fr', 
                'login' => 'visiteur',
                'password' => Hash::make('visiteur'), 
                'adresse' => '498 rue pinpin',
                'cp' => '69002', 
                'ville' => 'Lyon',
                'date_embauche' => '12/05/2009', 
                'fonction_id' => 3,
            ),
            array(
                'nom' => 'Beltrand', 
                'prenom' => 'Jacques',
                'email' => 'b.jacques@b.jacques.fr', 
                'login' => 'visiteur1',
                'password' => Hash::make('visiteur1'), 
                'adresse' => '498 rue pinpin',
                'cp' => '69002', 
                'ville' => 'Lyon',
                'date_embauche' => '12/05/2009', 
                'fonction_id' => 3,
            ),
        ));
    }

}