<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('FonctionTableSeeder');
                $this->call('EtatTableSeeder');
                $this->call('ForfaitTableSeeder');
                $this->call('UserTableSeeder');
                $this->call('FicheFraisSeeder');
                $this->call('FraisForfaitSeeder'); 
                $this->call('FraisHorsForfaitSeeder');
                  
	}

}
