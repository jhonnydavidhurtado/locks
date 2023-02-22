
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
<form method="POST" action="{{ route('accessories.store') }}" enctype="multipart/form-data">
            @csrf
            
            <input type="file" name="accessories" placeholder="Accesorios" aria-label="accessories" :value="old('accessories')">
            <br>

            <select name="type" id="type" class="type">
                <option value="">Seleccione el tipo</option>
                @foreach( $accessories as $accessorie )
                    <option value="{{ $accessorie->type }}">{{ $accessorie->type }}</option>
                @endforeach
                <option value="otro">Otro</option>

            </select>

            <input type="text" name="type_text" id="type_text" placeholder="Tipo" style="display:none;">
            <br>
            <input type="text" name="description" placeholder="Descripción" aria-label="description" :value="old('description')">
            <br>
            <input type="text" name="price" placeholder="Precio" aria-label="price" :value="old('price')">
            <br> 
                <div class="flex items-center justify-end mt-4">
                <button class="ml-3">
                    {{ __('Registrar Accesorios') }}
                </button>
            </div>
        </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script>
        const type = document.querySelector('.type');

        type.addEventListener('change', (event) => {

            if( type.value === 'otro'){
                document.getElementById('type_text').style.display = 'block';
            }else{
                document.getElementById('type_text').style.display = 'none';
            }

        
            
            /*
            const resultado = document.querySelector('.resultado');
            resultado.textContent = `Te gusta el sabor ${event.target.value}`;
            */
        });

    </script>
@stop