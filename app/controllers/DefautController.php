<?php

    class DefautController extends BaseController{
        
        public function afficherHomePage(){
            if(Auth::check()){
                if(User::isVisiteur()){
                    $day = Carbon::now()->day;
                    $month = Carbon::now()->month;
                    $year = Carbon::now()->year;
                    $pmonth = Carbon::now()->subMonth()->month;
                    if($pmonth == 12){
                        $pyear = Carbon::now()->subYear()->year;
                    }else{
                        $pyear = $year;
                    }
                    
                    if(FicheFrais::isExist($month, $year) === false){
                        FicheFrais::createSheet($month, $year);
                    }
                    
                    if($day > 10){
                        if(FicheFrais::isCloture($pmonth, $pyear) === false){
                            FicheFrais::cloturerFiche($pmonth, $pyear);
                        }
                    }
                }
                Return View::make('home');
            }else{
                Return View::make('login');
            }
        }
        
        public function afficherChoixUser(){
            if(User::isComptable()){
                return View::make('comptable/choix-user');
            }
        }
        
        public function afficherChoixFiche(){
            if(User::isComptable()){
                $id_user = Input::get('user');
                Return View::make('comptable/choix-fiche')->with('id_user', $id_user);
            }
        }
        
        public function afficherFicheComptable(){
            if(User::isComptable()){
                $id_fiche = Input::get('fiche');
                Return View::make('voirFicheFrais')->with('id_fiche', $id_fiche);
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
        
        public function afficherToutesFiches(){
            Return View::make('comptable/afficher-toutes-fiches');
        }
        
        public function afficherPageFicheFrais(){
            $id = Input::get('choix-fiche');
            if(isset($id) && !empty($id)){
                Return View::make('voirFicheFrais')->with('id_fiche', $id);
            }
            Return View::make('voirFicheFrais');
        }
        
        public function afficherModifierFraisForfait(){
            Return View::make('comptable/afficher-toutes-fiches');
        }
    }
