@extends('layouts.app')

@section('content')
<h1>Risultati ricerca:</h1>
@if (!$recipe->isEmpty())
@foreach($recipe as $ricetta)
{{$ricetta->title}}<br />
{{$ricetta->description}}
@endforeach
@else
Nessuna ricetta trovata!
@endif
@endsection