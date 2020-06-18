@extends('layouts.app')
@section('title','Panel Informacion')

@section('content')
<br>
	
<div class="row"> 	

<div class="col-sm">
		<div class="card text-center" style="width: 15rem; margin-top: 18px;">
			<div class="card-body ">	 
				<a href="#" class="btn btn-primary">Reporte del Dia</a>
			</div>
		</div>
	</div>

	<div class="col-sm">
		<div class="card text-center" style="width: 15rem; margin-top: 18px;">
			<div class="card-body ">	 
				<a href="#" class="btn btn-primary">Reporte Mensual</a>
			</div>
		</div>
	</div>

</div>

<div class="row">
		@foreach($infor as $informes)
			<div class="col-sm">
				<div class="card text-center" style="width: 15rem; margin-top: 10px;">
					<img  style="height: 100px; width: 180px; background-color: #EKOFGF; margin: 30px;" class="card-img-top rounded-circle mx-auto d-block" src="/imagenes/{{$informes->perfil}}" alt="">
					
					<div class="card-body">
					<h5 class="card-title">{{$informes->nombre}}</h5>
					<p class="card-text">{{$informes->decri}}</p>
					
					<a href="#" class="btn btn-primary">Ver mas...</a>
					</div>
				</div>
			</div> 

			


@endforeach

</div>


@endsection
