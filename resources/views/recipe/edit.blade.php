@extends('layouts.app')
@section('content')


 
        <p><b><center>Modifica  Ricette D'oro</center></b></p>
    
        {!! Form::model($recipe, [
    'method' => 'PUT',
    'route' => ['recipe.update', $recipe->id],
    'files'=>true
]) !!}
    <div class="form-group">
    {!! Form::label('title', 'Titolo :') !!}
    {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
    {!! Form::label('description', 'Ricettario : ') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
   
    <div class="form-group">
   
    {!! Form::label('ingredient_list', 'Ingredienti :', ['class' =>'control-label']) !!}

    {!! Form::select('ingredient_list[]', $ingredients, null, ['id' => 'ingredient_list', 'class' => 'form-control', 'multiple']) !!}

</div>

    <div class="col-md-6">
        <div class="form-group">
    {!! Form::label('Immagine') !!}
    {!! Form::file('image', null) !!}
</div>
    </div>

    <div class="form-group">
    {!! Form::submit('Modify repice ', ['class' => 'btn btn-primary form-control']) !!}
    
    
    </div>
    
    
    
    {!! Form::close() !!}
   {!! Form::open([
'method' => 'DELETE',
'route' => ['recipe.destroy', $recipe->id]
]) !!}
<div class="form-group">
{!! Form::submit('Cancella', ['class' => 'btn btn-primary btn-danger form-control']) !!}
</div>
{!! Form::close() !!}
</div>
    @endsection
    @section('footer')
    
    <script type="text/javascript">
  $('#ingredient_list').select2({
       placeholder: 'Scegliere o aggiungere gli ingredienti' ,
       tags: true,
       tokenSeparators: [","],
        createTag: function(newIngredient) {
       return {
           id: 'new:' + newIngredient.term,
           text: newIngredient.term + ' (+)'
       };
   }
      });
</script>
@endsection