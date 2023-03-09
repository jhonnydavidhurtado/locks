@extends('adminlte::page')

@section('title', 'Editar Accesorios')

@section('content_header')
    <h1>Editar Accesorios</h1>
@stop

@section('content')

<br>
<form method="POST" action="{{ route('accessories.update',$accessories->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <br>
            <input class="form-control form-control-sm" type="file" name="accessories" placeholder="Accesorios" aria-label="accessories">
            <br>
            <input class="form-control form-control-sm" type="text" name="price" placeholder="Precio" aria-label="price" value="{{$accessories->price}}">
            <br>
            <input class="form-control form-control-sm" type="text" name="description" placeholder="Descripción" aria-label="description" value="{{ $accessories->description }}">
            <br>
            <input class="form-control form-control-sm" type="text" name="type" placeholder="Tipo" aria-label="type" value="{{$accessories->type}}">
            <br>
             <div class="card" style="width: 18rem;">
             <img src="{{ asset('photos/'.$accessories->image ) }}" class="card-img-top" alt="...">
             <div class="card-body">
             <h5 class="card-title">{{ $accessories->image }}</h5>
            <br>

            <div class="flex items-center justify-end mt-4">
                <button class="ml-3">
                    {{ __('Editar Accesorios') }}
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