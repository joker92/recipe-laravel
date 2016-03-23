@extends('layouts.app')
@section('content')
<div>
    <img src="http://www.ricettedoro.com/wp-content/themes/ricette/images/logo_ricette.png">
    
</div>
<div class="row">
    @foreach($recipe as $ricetta)
        
    <div class="col-md-4" id="box">
           
<h1>{{$ricetta->title}}:<br /></h1>
 <img src="http://lericettedinicola.myblog.it/media/02/01/363877213.jpg">
 
<a class="btn btn-default" href="recipe/{{$ricetta->id}}">Visualizza</a>
@if(Auth::user()->id == $ricetta->user->id)
    <a class="btn btn-default" href="recipe/{{$ricetta->id}}/edit">Modifica</a>
@else
    <a class="btn btn-default" disabled>Modifica</a>
@endif
<br />
Ricetta inserita da: {{$ricetta->user->name}}
</div>
@endforeach

    
    
    
  
    
</div>
<!-- barra per scorrere le pagine -->

{!! $recipe->render() !!}
@endsection