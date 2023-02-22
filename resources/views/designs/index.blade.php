@extends('adminlte::page')

@section('title', 'Catálogo Diseños')

@section('content_header')
    <h1>Catálogo Diseños</h1>
@stop

@section('content')


@foreach($designs as $design)
 
<div class="card" style="width: 18rem;">
  <img src="{{ asset('photos/'.$design->image ) }}" class="card-img-top" alt="...">
  <div class="card-body">

    <p class="card-title"><strong>Diseño: </strong>{{ $design->title }}</p>

    @if( $design->type_frame != null )
    <p class="card-title"><strong>{{ $design->type_frame }}: </strong>{{ $design->description_frame }}</p>
    @endif

    @if( $design->type_veneer != null )
    <p class="card-title"><strong>{{ $design->type_veneer }}: </strong>{{ $design->description_veneer }}</p><br>
    @endif
    
    <div class="card-text">
    <h4><strong>Precio: </strong>{{ $design->price + $design->price_frame + $design->price_veneer }}</h4>
    </div>
    
    
    <a href="/designs/{{ $design['id'] }}/edit" class="btn btn-default">Editar <i class="fa-solid fa-pen-to-square"></i></a>

    <form action="{{ route('designs.destroy',$design->id ) }}" method="POST">
          @method('DELETE')
          @csrf
           <button class="btn btn-default" type="submit">Eliminar <i class="fa-solid fa-trash-can"></i></button>
    </form>
      
  </div>
</div>
@endforeach

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop