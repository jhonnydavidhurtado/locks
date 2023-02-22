@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


@foreach($quotes as $quote)
<div class="card" style="width: 18rem;">
  <img src="{{ asset('photos/'.$quote->image ) }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $quote->title }}</h5>
    <br>
    <a href="/quotes/{{ $quote['id'] }}/edit" class="btn btn-default">Editar <i class="fa-solid fa-pen-to-square"></i></a>
       <form action="{{ route('quotes.destroy',$quote['id']) }}" method="POST">
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