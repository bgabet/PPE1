@extends('layout')

@section('content')    
    
    {{ Form::open(array('url' => 'ajouter-frais-forfait', 'method' => 'post')) }} 
        
        <?php
        
        $date = sprintf('%02d', Carbon::now()->day) . "/" . sprintf('%02d', Carbon::now()->month) . "/" . Carbon::now()->year;
        ?>
    
        {{ Form::label('date', 'Entrez la date (jj/mm/aaaa)') }}
        {{ "<br>" }}
        {{ Form::text('mois', $date) }}
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