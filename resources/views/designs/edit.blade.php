@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


<form method="POST" action="{{ route('designs.update',$design->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input class="form-control form-control-sm" type="file" name="design" placeholder="Diseño" aria-label="design">
            <br>
            <input class="form-control form-control-sm" type="text" name="title" placeholder="Nombre" aria-label="title" value="{{$design->title}}">
            <br>
            <input class="form-control form-control-sm" type="text" name="price" placeholder="Precio" aria-label="price" value="{{$design->price}}">
            <br>

            <select class="form-select form-select-sm" name="frame" id="frame">
                    <option value="">Seleccione el marco</option>
                    @foreach( $frames as $frame )
                        <option value="{{ $frame->id }}">{{ $frame->description }}</option>
                    @endforeach 
                    <option value="0">Sin Marco</option>
            </select>
            <br>

            <br>
            <select class="form-select form-select-sm" name="veneer" id="veneer">
                    <option value="">Seleccione la chapa</option>
                    @foreach( $veneers as $veneer )
                        <option value="{{ $veneer->id }}">{{ $veneer->description }}</option>
                    @endforeach
                    <option value="0">Sin Chapa</option>
            </select>
            <br><br>
             <div class="card" style="width: 18rem;">
             <img src="{{ asset('photos/'.$design->image ) }}" class="card-img-top" alt="...">
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