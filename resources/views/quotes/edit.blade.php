@extends('adminlte::page')

@section('title', 'Editar Cotización')

@section('content_header')
    <h1>Editar Cotización</h1>
@stop

@section('content')

<br>
<form method="POST" action="{{ route('quotes.update',$quote->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <br>
            <input class="form-control form-control-sm" type="file" name="quote" placeholder="cotización" aria-label="quote">
            <br>
            <input class="form-control form-control-sm" type="text" name="price" placeholder="Precio" aria-label="price" value="{{$quote->price}}">
            <br>
            <input class="form-control form-control-sm" type="text" name="title" placeholder="Nombre" aria-label="title" value="{{$quote->title}}">
            <br>
             <div class="card" style="width: 18rem;">
             <img src="{{ asset('photos/'.$quote->image ) }}" class="card-img-top" alt="...">
             <div class="card-body">
             <h5 class="card-title">{{ $quote->image }}</h5>
            <br>

            <div class="flex items-center justify-end mt-4">
                <button class="ml-3">
                    {{ __('Editar Cotización') }}
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