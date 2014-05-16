@extends('layout')

@section('content')    
    
    {{ Form::open(array('url' => 'ajouter-frais-hors-forfait', 'method' => 'post')) }} 
        
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