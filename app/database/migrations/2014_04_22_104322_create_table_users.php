<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('users', function($table){
               $table->increments('id');
               $table->string('nom');
               $table->string('prenom');
               $table->string('email');
               $table->string('login');
               $table->string('password');
               $table->string('remember_token')->nullable();
               $table->string('adresse')->nullable();
               $table->string('cp', 5)->nullable();
               $table->string('ville')->nullable();
               $table->date('date_embauche');
               $table->integer('fonction_id')->unsigned();
               $table->foreign('fonction_id')->references('id')->on('fonctions');
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
            Schema::drop('users');
	}

}
