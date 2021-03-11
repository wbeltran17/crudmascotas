@extends('layouts.layout')
@section('content')
@if (count($errors) > 0)
<strong>Error!</strong> Revise los campos obligatorios.<br><br>
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
@if(Session::has('success')){
{
Session::get('success')
}
}
@endif
<div class="col-md-5">
    <h2>Nueva Mascota</h2>

    <form method="POST" action="{{ route('mascotas.store') }}" role="form">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre de la Mascota">
        </div>
        <div class="mb-3">
            <label for="raza" class="form-label">Raza</label>
            <input type="text" name="raza" id="raza" class="form-control input-sm" placeholder="Raza de la Mascota">
        </div>
        <div class="mb-3 ">
            <label for="edad" class="form-label">Edad</label>
            <input type="text" name="edad" id="edad" class="form-control input-sm" placeholder="Edad de la Mascota">
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-floppy-disk">
                        Guardar
                    </span>
                </button>
            </div>
            <div class="col">
                <a href="{{ route('mascotas.index') }}" class="btn btn-info">
                    <span class="glyphicon glyphicon-share-alt">
                        Atras
                    </span>
                </a>
            </div>
        </div>
    </form>

</div>
@endsection