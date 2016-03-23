@extends('layouts.app')

@section('content')
    <h1>Risultati ricerca</h1>
    <h3>Ricette:</h3>
    @if (!$recipe->isEmpty())
        @foreach($recipe as $ricetta)
            {{$ricetta->title}}<br />
            {{$ricetta->description}}
        @endforeach
    @else
        <i>Nessuna ricetta trovata!</i>
    @endif

    <h3>Utenti:</h3>
    @if (!$user->isEmpty())
        @foreach($user as $utente)
            {{$utente->name}}<br />
            {{$utente->email}}
        @endforeach
    @else
        <i>Nessun utente trovato!</i>
    @endif
@endsection