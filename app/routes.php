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
    
    Route::get('voir-fiche-frais/{id_fiche}', array('as' => 'voir_fiche', 'do' => function($id_fiche) {
        Return View::make('voirFicheFrais')->with('id_fiche', $id_fiche);
    }));
    
    Route::post('voir-fiche-frais', array('uses' => 'DefautController@afficherPageFicheFrais'));
    
    Route::get('modifier-frais-forfait/{forfait_id}/{user_id}/{fiche_id}', array('as' => 'modifier-frais-forfait', 'do' => function($forfait_id, $user_id, $fiche_id){
        
        Return View::make('modifierFraisForfait', array('forfait_id' => $forfait_id, 'user_id' => $user_id, 'fiche_id' => $fiche_id));
    }));
    
    Route::get('supprimer-frais-hors-forfait/{id_frais}', array('as' => 'supprimer-frais-hors-forfait', 'do' => function($id_frais){
        FraisHorsForfait::deleteFrais($id_frais);
        
        Return Redirect::to('voir-fiche-frais');
    }));
    
    Route::get('supprimer-frais-forfait/{id_frais}', array('as' => 'supprimer-frais-forfait', 'do' => function($id_frais){
        FraisForfait::deleteFrais($id_frais);
        $url = explode('/', $_SERVER['HTTP_REFERER']);
        $data = array(
            'forfait_id' => $url[4], 
            'user_id'    => $url[5],
            'fiche_id'   => $url[6]
        );
        Return Redirect::route($url[3], $data);
    }));
    
    
    Route::get('comptable/choix-user', array('uses' => 'DefautController@afficherChoixUser'));
    
    Route::post('comptable/choix-fiche', array('uses' => 'DefautController@afficherChoixFiche'));
    Route::post('comptable/fiche', array('uses' => 'DefautController@afficherFicheComptable'));
    
    Route::get('comptable/voir-toutes-fiches', array('uses' => 'DefautController@afficherToutesFiches'));
    
    
    
});

Route::get('/', array('uses' => 'DefautController@afficherHomePage'));
Route::post('login', array('before' => 'csrf', 'uses' => 'ConnexionController@verifierConnexion'));
Route::get('login', array('uses' => 'ConnexionController@afficherPageLogin'));






