<?php

    class NavigationController extends BaseController{
        
        // fonctions
        
        protected function creerFicheFrais($month, $year) {
            $db = DB::table('ficheFrais')->insert(array(
                'mois' => $month,
                'annee' => $year,
                'user_id' => Auth::user()->id,
                'etat_id' => 3
            ));
        }
        
        protected function getFicheFrais($month, $year) {
            $row = DB::table('ficheFrais')
                    ->where('mois', '=', $month)
                    ->where('annee', '=', $year)
                    ->first();
            return $row;
        }
        
        protected function existSheet($month, $year){
            $row = $this->getFicheFrais($month, $year);
            if(isset($row) && !empty($row)){
                return true;
            }
            return false;
        }

        protected function cloturerFiche($month, $year) {
            $row = DB::table('ficheFrais')
                    ->where('mois', '=', $month)
                    ->where('annee', '=', $year)
                    ->update(array('etat_id' => 2));
        }
        

        
        // fonction pour page
        
        public function afficherHomePage(){
            if(!Auth::check()){
                Return Redirect::to('login');
            }
            Return View::make('navigation/home');
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
            
            if($this->existSheet($month, $year) == false){
                $this->creerFicheFrais($month, $year);
            }
            
            if($day > 10){
                if($this->existSheet($previousmonth, $previousyear) == true){
                    $this->cloturerFiche($previousmonth, $previousyear);
                }
                
            }
            
            Return View::make('frais/saisiefrais');
        }
    }

?>
