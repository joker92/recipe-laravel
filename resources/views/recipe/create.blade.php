@extends('layouts.app')
@section('content')


 <h1>NEW RECIPES!!</h1>
        <p>BENVENUTO SU RICHETTONE </p>
        <p><b>LE MIGLIORI RICETTE</b></p>
    
    {!! Form::open(['route' => 'recipe.store', ],['class'=>'form-horizontal',]) !!}
    <div class="form-group">
    {!! Form::label('title', 'Titolo :') !!}
    {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
    {!! Form::label('description', 'Text ') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
   
    <div class="form-group">
   
    {!! Form::label('ingredient_list', 'Ingredienti:', ['class' =>'control-label']) !!}

    {!! Form::select('ingredient_list[]', $ingredients, null, ['id' => 'ingredient_list', 'class' => 'form-control', 'multiple']) !!}

</div>

    <div class="form-group">
    {!! Form::submit('Aggiungi repice ', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    
    {!! Form::close() !!}
    @endsection
    @section('footer')
    
    <script type="text/javascript">
  $('#ingredient_list').select2({
       placeholder: 'Scegliere o aggiungere gli ingredienti' ,
       tags: true,
       tokenSeparators: [",", " "],
        createTag: function(newIngredient) {
       return {
           id: 'new:' + newIngredient.term,
           text: newIngredient.term + ' (+)'
       };
   }
      });
</script>
@endsection
