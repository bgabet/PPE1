<?php

    class NavigationController extends BaseController{
        
        protected function createNewSheet($month, $year) {
            $db = DB::table('ficheFrais')->insert(array(
                'mois' => $month,
                'annee' => $year,
                'user_id' => Auth::user()->id,
                'etat_id' => 3
            ));
        }
        
        protected function cloturerFiche($month, $year) {
            $row = DB::table('ficheFrais')
                    ->where('mois', '=', $month)
                    ->where('annee', '=', $year)
                    ->update(array('etat_id' => 2));
        }
        
        protected function checkFicheCloture($month, $year){
            $row = DB::table('ficheFrais')
                    ->where('mois', '=', $month)
                    ->where('annee', '=', $year)
                    ->first();
            
            $id = (int)$row->etat_id;
            if($id == 3){
                return false;
            }
            return true;
            
        }
        
        protected function checkNewSheet($month, $year) {
            $row = DB::table('ficheFrais')
                    ->where('user_id', '=', Auth::user()->id)
                    ->where('mois', '=', $month)
                    ->where('annee', '=', $year)
                    ->first();
            
            if(!isset($row) || empty($row)){
                return true;
            }
            
            return false;
        }
        
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
            
            if($day > 10){
                $clore = $this->checkFicheCloture($previousmonth, $previousyear);
                if($clore == false){
                    $this->cloturerFiche($previousmonth, $previousyear);
                }
            }
            
            $check = $this->checkNewSheet($month, $year);
            if ($check) {
                $this->createNewSheet($month, $year);
            }
            
            Return View::make('frais/saisiefrais');
        }
    }

?>
