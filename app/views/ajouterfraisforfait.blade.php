@extends('layout')

@section('content')    
    
    {{ Form::open(array('url' => 'ajouter-frais-forfait', 'method' => 'post')) }} 
        
        <?php
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        ?>
    
        {{ Form::label('mois', 'Entrez le mois (2 chiffres)') }}
        {{ "<br>" }}
        {{ Form::text('mois', $month) }}
        {{ "<br><br>" }}
        {{ Form::label('annee', 'Entrez l\'année (4 chiffres)') }}
        {{ "<br>" }}
        {{ Form::text('annee', $year) }}
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