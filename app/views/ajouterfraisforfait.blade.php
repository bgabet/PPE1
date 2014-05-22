@extends('layout')

@section('content')    

    <?php
        $errors = Session::get('errors');
    
        if(isset($errors) && !empty($errors)){
            echo '<pre>';
            var_dump($errors);
            echo '</pre>';
        }
        
        $success = Session::get('success');
        
        if(isset($success)){
            echo $success;
        }
    ?>


    {{ Form::open(array('url' => 'ajouter-frais-forfait', 'method' => 'post')) }} 
        
        <?php
        
        $date = sprintf('%02d', Carbon::now()->day) . "/" . sprintf('%02d', Carbon::now()->month) . "/" . Carbon::now()->year;
        ?>
    
        {{ Form::label('mois', "Entrez le mois (2 chiffres)") }}
        {{ "<br>" }}
        {{ Form::text('mois', sprintf('%02d', Carbon::now()->month)) }}
        {{ "<br><br>" }}
        {{ Form::label('annee', "Entrez l'année (4 chiffres)") }}
        {{ "<br>" }}
        {{ Form::text('annee', Carbon::now()->year) }}
        {{ "<br><br>" }}
        <?php
        
        foreach(Forfait::get() as $forfait){
            echo Form::label('forfait-' . $forfait->id, $forfait->libelle);
            echo "<br>";
            echo Form::text('forfait-' . $forfait->id);
            echo "<br><br>";
        }
        
        ?>
        
        {{ Form::submit('Soumettre'); }}
        
        
    {{ Form::close() }} 
    
@stop