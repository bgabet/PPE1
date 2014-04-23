<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFraisForfaits extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('fraisForfaits', function($table){
               $table->increments('id');
               $table->integer('quantite');
               $table->integer('mois');
               $table->integer('annee');
               $table->integer('forfait_id')->unsigned();
               $table->integer('user_id')->unsigned();
               $table->foreign('forfait_id')->references('id')->on('forfaits')->unsigned();
               $table->foreign('user_id')->references('id')->on('users')->unsigned();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('fraisForfaits');
	}

}
