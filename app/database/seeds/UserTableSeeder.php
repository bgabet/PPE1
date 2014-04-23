<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->insert(
            array(
                'nom' => 'admin', 
                'prenom' => 'admin',
                'email' => 'admin@admin.fr', 
                'login' => 'admin',
                'password' => Hash::make('admin'), 
                'adresse' => '498 rue pinpin',
                'cp' => '69360', 
                'ville' => 'solaize',
                'date_embauche' => 'admin', 
                'fonction_id' => 1,
            )
        );
    }

}