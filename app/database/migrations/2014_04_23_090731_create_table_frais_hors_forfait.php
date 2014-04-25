<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFraisHorsForfait extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('fraisHorsForfaits', function($table){
               $table->increments('id');
               $table->date('date');
               $table->string('libelle');
               $table->decimal('montant', 5, 2);
               $table->integer('quantite');
               $table->integer('user_id')->unsigned();
               $table->foreign('user_id')->references('id')->on('users')->unsigned();
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
            Schema::drop('fraisHorsForfaits');
	}

}
