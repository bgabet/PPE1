<?php

    class NavigationController extends BaseController{
        
        public function afficherHomePage(){
            if(!Auth::check()){
                Return Redirect::to('login');
            }
            Return View::make('navigation/home');
        }
        
    }

?>
