@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<br>
<form method="POST" action="{{ route('designs.update',$design->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <br>
            <input class="form-control form-control-sm" type="file" name="design" placeholder="Diseño" aria-label="design">
            <br>
            <input class="form-control form-control-sm" type="text" name="price" placeholder="Precio" aria-label="price" value="{{$design->price}}">
            <br>
            <input class="form-control form-control-sm" type="text" name="title" placeholder="Nombre" aria-label="title" value="{{$design->title}}">
            <br>
             <div class="card" style="width: 18rem;">
             <img src="{{ asset('photos/'.$design->image ) }}" class="card-img-top" alt="...">
             <div class="card-body">
             <h5 class="card-title">{{ $design->image }}</h5>
            <br>

            <div class="flex items-center justify-end mt-4">
                <button class="ml-3">
                    {{ __('Editar Diseño') }}
                </button>
            </div>
        </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop