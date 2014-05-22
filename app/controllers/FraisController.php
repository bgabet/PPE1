<?php

    class FraisController extends BaseController{
        
        public function ajouterFraisForfait() {
            $data = array(
                'mois'       => (int)Input::get('mois'), 
                'annee'  => (int)Input::get('annee')
            );
            foreach(Forfait::get() as $forfait){
                $name = 'forfait-' . $forfait->id;
                $data[$name] = (int)Input::get($name);
                if(empty($data[$name])){
                    $data[$name] = 0;
                }
            }
            
            $rules = array(
                'mois'      => 'required|min:01|max:12|integer', 
                'annee'     => 'required|min:2012|max:9999|integer'
            );
            foreach(Forfait::get() as $forfait){
                $name = 'forfait-' . $forfait->id;
                $rules[$name] = 'required|integer';
            }
            
            $validator = Validator::make($data, $rules);
            
            if($validator->fails()){
                Session::flash('errors', $validator->errors());
                return Redirect::to('ajouter-frais-forfait');
            }
            
            FraisForfait::ajouter($data);
            return Redirect::to('ajouter-frais-forfait')->with('success', 'vous avez bien ajouter vos frais forfaits');
        }
        
        public function ajouterFraisHorsForfait() {
            $data = array(
                'date'      => Input::get('date'), 
                'libelle'   => Input::get('libelle'),
                'montant'   => Input::get('montant'),
                'quantite'  => (int)Input::get('quantite')
            );
            
            $rules = array(
                'date'      => 'required|max:10', 
                'libelle'   => 'required|max:255',
                'montant'   => 'required|numeric',
                'quantite'  => 'required|integer'
            );
            
            $validator = Validator::make($data, $rules);
            
            if($validator->fails()){
                Session::flash('errors', $validator->errors());
                return Redirect::to('ajouter-frais-hors-forfait');
            }
            
            FraisHorsForfait::ajouter($data);
            return Redirect::to('ajouter-frais-hors-forfait')->with('success', 'vous avez bien ajouter vos frais forfaits');
        }
    }

?>
