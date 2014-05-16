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


Route::group(array('before' => 'auth.basic'), function()
{
    
    Route::get('deconnexion', array('uses' => 'ConnexionController@disconnect'));
    
    Route::get('saisir-frais', array('uses' => 'DefautController@afficherPageChoixSaisie'));
    
    Route::get('saisir-frais-forfait', array('uses' => 'DefautController@afficherFormFraisForfait'));
    Route::get('saisir-frais-hors-forfait', array('uses' => 'DefautController@afficherFormFraisHorsForfait'));
    
    
    
    
});

Route::get('/', array('uses' => 'DefautController@afficherHomePage'));
Route::post('login', array('before' => 'csrf', 'uses' => 'ConnexionController@verifierConnexion'));
Route::get('login', array('uses' => 'ConnexionController@afficherPageLogin'));






