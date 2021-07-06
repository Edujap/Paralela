@extends('adminlte::page')

@section('title', 'REST API')

@section('content_header')
    <h1>REST API</h1>
@stop

@section('content')

<a href="articulo/create" class=" btn btn-primary"> Crear</a>
<table  id="articulos" class=" table table-dark table-striped mt-4">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col"> ID</th>
                <th scope="col"> Código</th>
                <th scope="col"> Descrpición</th>
                <th scope="col"> Cantidad</th>
                <th scope="col"> Precios</th>
                <th scope="col"> Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach( $articulos as $articulo )
        <tr>
            <td> {{$articulo->id}}</td>
            <td> {{$articulo->codigo}}</td>
            <td> {{$articulo->descripcion}}</td>
            <td> {{$articulo->cantidad}}</td>
            <td> {{$articulo->precio}}</td>
            <td>
            <form action="{{route ('articulo.destroy', $articulo->id)}}" method=POST>

            <a href="/articulo/{{ $articulo->id}}/edit" class="btn btn-info"> Editar</a>
            @csrf
            @method('DELETE')
            <button class="btn btn-danger"> Borrar</button>
            </td>
        </tr>
        @endforeach
        </tbody>
</table
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   <script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
   <script>
   $(document).ready(function() {
       $('#articulos').DataTable();
   } );
   </script
@stop
