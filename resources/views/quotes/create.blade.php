
@extends('adminlte::page')

@section('title', 'Registrar Cotización')

@section('content_header')
    <h1>Registrar Cotización</h1>
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

<img src="/photos/quote" alt="" style="width:300px;"><br>
<span><strong>Precio:</strong>50000</span><br>
</select>
<br>
<form method="POST" action="{{ route('quotes.store') }}" enctype="multipart/form-data">
            @csrf

            <div style="margin-left:10px;">
    <select class="form-select form-select-sm" name="gauge" id="gauge">
    <option value="">Seleccione el calibre</option>
        @foreach( $gauges as $gauge )
            <option value="{{ $gauge->id }}">{{ $gauge->description }}</option>
            
        @endforeach



 </select>
    </div>
    <br>
    <div style="margin-left:10px;">
    <select class="form-select form-select-sm" name="veneer_title" id="veneer">
    <option value="">Seleccione el chapa</option>
        @foreach( $veneers as $veneer )
            <option value="{{ $veneer->id }}">{{ $veneer->description }}</option>
        @endforeach
       

 </select>
    </div>
    <br>
    <div style="margin-left:10px;">
    <select class="form-select form-select-sm" name="pin" id="pin">
    <option value="">Seleccione el pasador</option>
        @foreach( $pins as $pin )
            <option value="{{ $pin->id }}">{{ $pin->description }}</option>
        @endforeach
        



 </select>
    </div>
    <br>
    <div style="margin-left:10px;">
    <select class="form-select form-select-sm" name="painting" id="painting">
    <option value="">Seleccione el pintura</option>
        @foreach( $paintings as $painting )
            <option value="{{ $painting->id }}">{{ $painting->description }}</option>
        @endforeach


 </select>
    </div>
    <br>
    <div style="margin-left:10px;">
    <select class="form-select form-select-sm" name="hinge" id="Hinge">
    <option value="">Seleccione el visagra</option>
        @foreach( $Hinges as $Hinge )
            <option value="{{ $Hinge->id }}">{{ $Hinge->description }}</option>
       @endforeach




</select>
    </div>
    <br>
    <div style="margin-left:10px;">
    <select class="form-select form-select-sm" name="frame" id="frame">
    <option value="">Seleccione el marco</option>
        @foreach( $frames as $frame )
            <option value="{{ $frame->id }}">{{ $frame->description }}</option>
        @endforeach 


        
 </select>
    </div>
    <br>
    <div style="margin-left:10px;">
    <select class="form-select form-select-sm" name="slingshot" id="slingshot">
    <option value="">Seleccione el tiradera</option>
        @foreach( $slingshots as $slingshot )
            <option value="{{ $slingshot->id }}">{{ $slingshot->description }}</option>
        @endforeach




 </select>
    </div>
    <br>
    <div style="margin-left:10px;">
    <select class="form-select form-select-sm" name="measure" id="measure">
    <option value="">Seleccione el medida</option>
        @foreach( $measures as $measure )
            <option value="{{ $measure->id }}">{{ $measure->description }}</option>
        @endforeach  
        <br>         
            <div class="flex items-center justify-end mt-4">
                <button class="ml-3">
                    {{ __('Registrar Cotización') }}
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