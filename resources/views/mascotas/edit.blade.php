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
<div class="col-md-8">
    <h2>Editar Mascota</h2>


    {!! Form::model($mascotas, ['route'=> [$mascotas->url(), $mascotas->id], 'method'=> $mascotas->method()])!!}

<div class="form-group">
    {!! Form::label('nombre','Nombre') !!}
    {!! Form::text('nombre',null, ['class'=> 'form-control', 'placeholder' => 'Nombre de la Mascota']) !!}
</div>

<div class="form-group">
    {!! Form::label('raza','Raza') !!}
    {!! Form::text('raza',null, ['class'=> 'form-control', 'placeholder' => 'Raza de la Mascota']) !!}
</div>


<div class="form-group">
    {!! Form::label('edad','Edad') !!}
    {!! Form::text('edad',null, ['class'=> 'form-control', 'placeholder' => 'Edad de la Mascota']) !!}
</div>


<div class="form-group">

   
</div>
<div class="row">
    <div class="col">
        {!! Form::submit('Guardar', ['class'=> 'btn btn-secondary']) !!}
    </div>
    <div class="col">
        <a href="{{ url('/home') }}" class="btn btn-danger">
            Atras
        </a>
    </div>
</div>
{!! Form::close() !!}

</div>
@endsection