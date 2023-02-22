
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    

@if ($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<br>
<form method="POST" action="{{ route('designs.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="file" name="design" placeholder="Diseño" aria-label="design" :value="old('design')">
            <br><br>

            <input type="text" name="title" placeholder="Nombre" aria-label="title" :value="old('title')">
            <br><br>
            
            <input type="text" name="price" placeholder="Precio" aria-label="price" :value="old('price')">
            <br><br>
            
    <div style="margin-left:10px;">
  
    <select class="form-select form-select-sm" name="frame" id="frame">
        <option value="">Seleccione el marco</option>
        @foreach( $frames as $frame )
            <option value="{{ $frame->id }}">{{ $frame->description }}</option>
        @endforeach 
 </select>
 <br>

 <br>
 <select class="form-select form-select-sm" name="veneer_title" id="veneer">
        <option value="">Seleccione la chapa</option>
        @foreach( $veneers as $veneer )
            <option value="{{ $veneer->id }}">{{ $veneer->description }}</option>
        @endforeach
       

 </select>



    </div>
            <div class="flex items-center justify-end mt-4">
                <button class="ml-3">
                    {{ __('Registrar Diseños') }}
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