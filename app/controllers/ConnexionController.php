<?php

class ConnexionController extends BaseController{
    
    public function afficherPageLogin(){
        return View::make('login');
    }
    
    public function disconnect(){
        Auth::logout();
        Return Redirect::to('login');
    }
    
    public function verifierConnexion(){
        $data = array(
            'nom' => Input::get('nom'), 
            'password' => Input::get('password')
        );
        
        $validator = Validator::make($data,array(
            'nom' => 'required',
            'password' => 'required'
        ));
        
        if($validator->fails()) {
            Session::flash('errors', $validator->errors());
            return Redirect::to('login');
        }
        
        Auth::attempt($data);
        
        return Redirect::to('/');
    }
    
}

