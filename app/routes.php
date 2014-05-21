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


Route::group(array('before' => 'auth'), function()
{
    
    Route::get('deconnexion', array('uses' => 'ConnexionController@disconnect'));
    
    Route::get('saisir-frais', array('uses' => 'DefautController@afficherPageChoixSaisie'));
    
    Route::get('ajouter-frais-forfait', array('uses' => 'DefautController@afficherFormFraisForfait'));
    Route::post('ajouter-frais-forfait', array('before' => 'csrf', 'uses' => 'FraisController@ajouterFraisForfait'));
    
    Route::get('ajouter-frais-hors-forfait', array('uses' => 'DefautController@afficherFormFraisHorsForfait'));
    Route::post('ajouter-frais-hors-forfait', array('before' => 'csrf', 'uses' => 'FraisController@ajouterFraisHorsForfait'));
    
    Route::get('voir-fiche-frais', array('uses' => 'DefautController@afficherPageFicheFrais'));
    
    
    
});

Route::get('/', array('uses' => 'DefautController@afficherHomePage'));
Route::post('login', array('before' => 'csrf', 'uses' => 'ConnexionController@verifierConnexion'));
Route::get('login', array('uses' => 'ConnexionController@afficherPageLogin'));






