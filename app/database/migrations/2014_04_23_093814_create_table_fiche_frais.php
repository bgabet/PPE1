<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFicheFrais extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('ficheFrais', function($table){
               $table->increments('id');
               $table->integer('mois');
               $table->integer('annee');
               $table->integer('user_id')->unsigned();
               $table->integer('etat_id')->unsigned();
               $table->foreign('user_id')->references('id')->on('users')->unsigned();
               $table->foreign('etat_id')->references('id')->on('etats')->unsigned();
               $table->timestamps();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('ficheFrais');
	}
        
}
