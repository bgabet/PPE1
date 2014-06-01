<?php

    class AdminController extends BaseController{
    
	public function afficherAjouterUser(){
	    Return View::make('admin/ajouter-user');
	}
	
	public function ajouterUser(){
	    if(User::isAdmin()){
		$user = User::getWithLogin(Input::get('login'));
		
		if(isset($user) && !empty($user)){
		    return Redirect::to('ajouter-user')->with('login', 'login déjà utilisé');
		}
		
		$data = array(
		    'nom' => Input::get('nom'),
		    'prenom' => Input::get('prenom'),
		    'email' => Input::get('email'),
		    'login' => Input::get('login'),
		    'password' => Input::get('password'),
		    'adresse' => Input::get('adresse'),
		    'cp' => Input::get('cp'),
		    'ville' => Input::get('ville'),
		    'date_embauche' => Input::get('dateembauche'),
		    'fonction' => (int)Input::get('fonction')
		);
		
		$rules = array(
		    'nom' => 'required',
		    'prenom' => 'required',
		    'email' => 'required|email',
		    'login' => 'required',
		    'password' => 'required',
		    'fonction' => 'required|integer'
		);
		
		$validator = Validator::make($data, $rules);
		if($validator->fails()) {
		    Session::flash('errors', $validator->errors());
		    return Redirect::to('ajouter-user');
		}
		
		User::ajouter($data);
		Return View::make('admin/ajouter-user')->with('success', 'Utilisateur bien ajouté');
	
	}
        Return View::make('home');
        
    
    }
    
}