@extends('adminlte::page')

@section('title', 'Registrar Cliente')

@section('content_header')
    <h1>Registrar Cliente</h1>
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


<form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
            @csrf
           
            <input class="form-control form-control-sm" type="file" name="customer" placeholder="Cliente" aria-label="customer">
            <br>
            <input class="form-control form-control-sm" type="text" name="name" placeholder="Nombre" aria-label="name">
            <br>
            <input class="form-control form-control-sm" type="text" name="phone" placeholder="Telefono" aria-label="phone">
            <br>
            <input class="form-control form-control-sm" type="text" name="night" placeholder="Nit" aria-label="night">
            <br>
            <input class="form-control form-control-sm" type="text" name="id_card" placeholder="Cedula " aria-label="id_card">
            <br>
            <input class="form-control form-control-sm" type="text" name="address" placeholder="Direccion" aria-label="address">
            <br>
            <input class="form-control form-control-sm" type="text" name="neighborhood" placeholder="Barrio" aria-label="neighborhood">
            <br>
            <input class="form-control form-control-sm" type="text" name="city" placeholder="Ciudad " aria-label="city">
            <br>
            <input class="form-control form-control-sm" type="text" name="choreo" placeholder="Coreo" aria-label="choreo">
            <br>

             <div class="card" style="width: 18rem;">
             {{-- <img src="{{ asset('photos/'.$customer->image ) }}" class="card-img-top" alt="..."> --}}
            <div class="flex items-center justify-end mt-4">
                <button class="ml-3">
                    {{ __('Crear Cliente') }}
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