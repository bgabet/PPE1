<?php

    class DefautController extends BaseController{
        
        public function afficherHomePage(){
            if(Auth::check()){
                Return View::make('home');
            }else{
                Return View::make('login');
            }
        }


        public function afficherPageChoixSaisie(){
            Return View::make('choixsaisie');
        }
        
        public function afficherFormFraisForfait(){
            Return View::make('ajouterfraisforfait');
        }
        
        public function afficherFormFraisHorsForfait(){
            Return View::make('ajouterfraishorsforfait');
        }
        
        public function afficherPageFicheFrais(){
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;
            if(FicheFrais::isExist($month, $year) === false){
                FicheFrais::createSheet($month, $year);
            }
            
            $id = Input::get('choix-fiche');
            if(isset($id) && !empty($id)){
                Session::put('id_fiche', $id);
            }
            
            
            Return View::make('voirFicheFrais');
        }








        /*
        protected function exist($month, $year){
            $row = FicheFrais::getWithDate($month, $year);
            if(isset($row) && !empty($row)){
                return true;
            }
            return false;
        }
        
        public function afficherHomePage(){
            if(!Auth::check()){
                Return Redirect::to('login');
            }
            Return View::make('home');
        }
        
        public function afficherPageSaisie(){
            $day = Carbon::now()->day;
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;
            
            if($month - 1 < 1){
               $previousmonth = 12;
               $previousyear = $year - 1;
            }else{
                $previousmonth = $month - 1;
                $previousyear = $year;
            }
            
            if($this->exist($month, $year) == false){
                FicheFrais::createSheet($month, $year);
            }
            
            if($day > 10){
                if($this->exist($previousmonth, $previousyear) == true){
                    FicheFrais::cloturerFiche($previousmonth, $previousyear);
                }
                
            }
            
            Return View::make('addcosts');
        }
         */
    }

?>
