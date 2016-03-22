       @extends('layouts.app')
        @section('content')

                    <div class="media-body">
            		<h4 class="media-heading">{{ $recipe->title}}</h4>
                      <p class="text-center">{{ $recipe->description }}</p>
                      <p>ingredienti :</p>
                      
                      <ul>
                      @foreach($recipe->ingredients as $ingredient)
                      <li>{{$ingredient->name}}</li>
                      @endforeach
                      </ul>
                <a class="btn btn-default" href="{{$recipe->id}}/edit">Modifica</a>
                    </div>
        @endsection
        
        
