@extends('layouts.app')
@section('content')
<div class="row">
    @foreach($recipe as $ricetta)
        
    <div class="col-md-4">
            <img src="http://lericettedinicola.myblog.it/media/02/01/363877213.jpg">
<h1>{{$ricetta->title}}:<br /></h1>

<a class="btn btn-default" href="recipe/{{$ricetta->id}}">Visualizza</a>
</div>
@endforeach

</div>
@endsection