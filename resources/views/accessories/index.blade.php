@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

@foreach($accessories as $accessorie)
<div class="card" style="width: 18rem;">
  <!--<img src="{{ asset('photos/'.$accessorie->image ) }}" class="card-img-top" alt="...">-->
  <div class="card-body">
    <h5 class="card-title">{{ $accessorie->type }}</h5>
    <br>
    <p>{{ $accessorie->description }}</p>
    <p>{{ $accessorie->price }}</p>
    <a href="/accessories/{{ $accessorie['id'] }}/edit" class="btn btn-default">Editar <i class="fa-solid fa-pen-to-square"></i></a>
       <form action="{{ route('accessories.destroy',$accessorie['id']) }}" method="POST">
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