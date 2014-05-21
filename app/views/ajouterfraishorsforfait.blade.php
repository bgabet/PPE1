@extends('layout')

@section('content')    
    
    {{ Form::open(array('url' => 'ajouter-frais-hors-forfait', 'method' => 'post')) }} 
        
        <?php
        $date = sprintf('%02d', Carbon::now()->day) . "/" . sprintf('%02d', Carbon::now()->month) . "/" . Carbon::now()->year;
        ?>
    
        {{ Form::label('date', 'Entrez la date (jj/mm/aaaa)') }}
        {{ "<br>" }}
        {{ Form::text('mois', $date) }}
        {{ "<br><br>" }}
        
        {{ Form::label('libelle', 'Libelle') }}
        {{ "<br>" }}
        {{ Form::text('libelle') }}
        {{ "<br><br>" }}
        {{ Form::label('montant', 'Montant unitaire') }}
        {{ "<br>" }}
        {{ Form::text('montant') }}
        {{ "<br><br>" }}
        {{ Form::label('quantite', 'Quantité') }}
        {{ "<br>" }}
        {{ Form::text('quantite') }}
        {{ "<br><br>" }}
        
        {{ Form::submit('Soumettre'); }}
        
        
    {{ Form::close() }} 
    
@stop