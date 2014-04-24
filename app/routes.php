<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'NavigationController@afficherHomePage'));
Route::post('login', array('uses' => 'ConnexionController@verifierConnexion'));
Route::get('login', array('uses' => 'ConnexionController@afficherPageLogin'));
Route::get('deconnexion', array('uses' => 'ConnexionController@deconnexionUser'));

Route::get('saisie-frais', array('uses' => 'NavigationController@afficherPageSaisie'));
