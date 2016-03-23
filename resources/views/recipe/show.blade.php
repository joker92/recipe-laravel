       @extends('layouts.app')
        @section('content')
<div>
    <img src="http://www.ricettedoro.com/wp-content/themes/ricette/images/logo_ricette.png">
    
</div>
                    <div class="media-body">
            		<h1 class="media-heading">{{ $recipe->title}}</h1>
                      <p class="text-center">{{ $recipe->description }}</p>
                      <p><h1>ingredienti :</p></h1>
                     
                      <ul>
                      @foreach($recipe->ingredients as $ingredient)
                      <li>{{$ingredient->name}}</li>
                      @endforeach
                      </ul>
                <a class="btn btn-default" href="{{$recipe->id}}/edit">Modifica</a>
                    </div>
        @endsection
        
        
