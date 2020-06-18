@extends('layouts.app')
@section('title','Crear Informacion')

@section('content')
	
{!! Form::open(['route' => 'informacion.store', 'method' => 'POST', 'files' => true]) !!}
	@include('informacion.form')
	{!! Form::submit('Guardar',['class' => 'btn btn-primary'])!!}	
	
	<a href="/informacion" class="btn btn-primary">Regresar</a>
	
{!! Form::close()!!}
	
@endsection
