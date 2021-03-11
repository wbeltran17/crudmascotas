@extends('layouts.layout')
@section('content')
<div class="col-md-12">
    <div class="page-header">
        <div class="row">
            <div class="col">
                <a href="{{ route('mascotas.create') }}" class="btn btn-info">Añadir Mascota</a>
                {{ Form::open(['route' => 'mascotas', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}

            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'nombre'])}}
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search">
            </button>
        </div>
        {{ Form::close() }}

    </div>
</div>
<div class="col-md-12">
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Raza</th>
            <th scope="col">Edad</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </thead>
        <tbody>
            @foreach($mascotas as $mascota)
            <tr>
                <td>{{ $mascota->id }}</td>
                <td>{{ $mascota->nombre }}</td>
                <td>{{ $mascota->raza }}</td>
                <td>{{ $mascota->edad }}</td>
                <td>
                    <a class="btn btn-primary btn-xs" href="{{action('MascotasController@edit', $mascota->id)}}">
                        <span>
                            <i class="fas fa-edit"></i>
                        </span>
                    </a>
                </td>
                <td>
                    <form action="{{action('MascotasController@destroy', $mascota->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger btn-xs" type="submit">
                            <span>
                                <i class="fas fa-trash-alt"></i>
                            </span>
                        </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $mascotas->render() }}
</div>
@endsection