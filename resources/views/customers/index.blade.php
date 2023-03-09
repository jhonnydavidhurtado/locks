@extends('adminlte::page')

@section('title', 'Listado Clientes')

@section('content_header')
    <h1>Listado Clientes</h1>
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

<table class="table table-bordered">
    <thead>
        <th>Nombre</th>
        <th>Direcciòn</th>
        <th>Telèfono</th>
        <th>E-Mail</th>
        <th>Nit</th>
        <th>Cedula</th>
        <th>Barrio</th>
        <th>Ciudad</th>
        <th>Acciones</th>
    </thead>

    <tbody>
    @foreach($customers as $customer)
    <tr>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->address }}</td>
        <td>{{ $customer->phone }}</td>
        <td>{{ $customer->city }}</td>
        <td>{{ $customer->choreo }}</td>
        <td>{{ $customer->neighborhood }}</td>
        <td>{{ $customer->id_card }}</td>
        <td>{{ $customer->night }}</td>
        <td>
        <a href="/customers/{{ $customer['id'] }}/edit" class="btn btn-default">Editar <i class="fa-solid fa-pen-to-square"></i></a>

        <form action="{{ route('customers.destroy',$customer->id ) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-default" type="submit">Eliminar <i class="fa-solid fa-trash-can"></i></button>
        </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop