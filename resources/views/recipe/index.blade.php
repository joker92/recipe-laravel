@extends('layouts.app')
@section('content')
<div>
    <img src="http://www.ricettedoro.com/wp-content/themes/ricette/images/logo_ricette.png">
    
</div>
<div class="row">
    @foreach($recipe as $ricetta)
        
    <div class="col-md-4" id="box">
           
<h1><center>{{$ricetta->title}}:<br /></h1></center>
 <img src="http://www.daringtodo.com/wp-content/uploads/2015/11/master-chef-logo.jpg">
 
<a class="btn btn-default" href="recipe/{{$ricetta->id}}">Visualizza</a>
@if(Auth::user()->id == $ricetta->user->id || Auth::user()->admin == 1)
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