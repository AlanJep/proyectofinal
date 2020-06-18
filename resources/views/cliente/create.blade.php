@extends('layouts.admin')
	@section('contenido')
	
<div class="medilife-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="specialities-tab" data-toggle="tab" href="#specialities" role="tab" aria-controls="specialities" aria-selected="true">Clientes</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="specialities" role="tabpanel" aria-labelledby="specialities-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2>Crear nuevo chofer</h2>	

		<section class="content">
	        <div class="box box-solid">
	            <div class="box-body">
	                <div class="row">
	                    <div class="col-md-8">
							<div class="box-header with-border">
								<h4 class="box-title"><span class="glyphicon glyphicon-list-alt"></span> Registro de chofer </h4>
							</div>
							
						</div>
	                    <div class="col-md-4" align="right">
				        	<ol class="breadcrumb">
					            <li><a href="{{url('inicio')}}" class="act" title="Ir a inicio"><i class="fa fa-home"></i> Inicio /</a></li>
					            <li><a href="{{url('cliente')}}" class="act" title="Ir a clientes"> Chofer /</a></li>
					            <li class="menu-active">Nuevo</li>
					        </ol>
			        	</div>
	                </div>
	                <hr>
	                	<div class="row form-required">
						<div class="col-lg-12 ">
						 	<span class="fa fa-info-circle"></span> Son obligatorio los campos (*) <br>
						 	<span class="fa fa-info-circle"></span> Evite el uso excesivo de caracteres especiales ( ! @ # $ % ^ & * - + = { [ ; ' / . , : ~ )
						</div>
					</div>
					<br>
					{!!Form::open(array('url'=>'cliente','method'=>'POST', 'id'=>'frm_add', 'autocomplete'=>'off'))!!}
						<div class="form-add-body">
							<div class="form-group">
								<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="nombres"><span class="fa fa-group"></span> Nombres (*)</label>
									<input type="text" class="form-control"  name="nombres" placeholder="Introduce nombre" onkeypress="return validar(event,1)">
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="apellidos"><span class="fa fa-group"></span> Apellidos</label>
									<input type="text" class="form-control"  name="apellidos" placeholder="Introduce apellido" onkeypress="return validar(event,1)">
								</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<label for="nro" class="frm-gn"><span class="fa fa-list"></span> Placa de vehiculo</label>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
											<input type="text" class="form-control frm-gn" name="nro" id="vnro" placeholder="Introduce placa" title="Numeros, 5 digitos como minimo" maxlength="11">
											<input type="hidden" id="cvnro" value="">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="telefono"><span class="fa fa-mobile"></span> Celular </label>
									<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Introduce celular" maxlength="10">
								</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="direccion"><span class="fa fa-car"></span> Tipo de Vehiculo</label>
									<input type="text" class="form-control" name="direccion" placeholder="Introduce tipo de vehiculo" >
								</div>
								<!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="entidad"><span class="fa fa-list"></span> Entidad</label>
									<select name="entidad"class="form-control">
										<option>Persona natural</option>
										<option>Empresa</option>
									</select>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="nit"><span class="fa fa-list"></span> N.I.T. / Nro de Odontologo</label>
									<input type="text" class="form-control" name="nit" id="nit" placeholder="Introduce nit" maxlength="11">
								</div> -->
								</div>
							</div>
						</div>
						

						<br>
						<!-- <div class="row"> -->
							<div class="form-group" align="center">
								<div class="row">
								<div class="col-lg-12 col-md-12  col-md-12 col-xs-12 ">
									<a href="/cliente" class="btn btn-danger btn-flat" title="Cancela y vuelve atras"><i class="fa fa-remove"></i> Cancelar</a>
									<button type="reset" class="btn btn-info btn-flat" title="Reestablece al valor inicial"><i class="fa fa-history"></i> Reestablecer</button>
									<button type="button" onclick="veriDocDatos();" class="btn btn-success btn-flat" title="Guarda los datos"><i class="fa fa-save"></i> Guardar</button>
								</div>
								</div>
							</div>
						<!-- </div> -->
					{!! Form::close() !!}

	            </div>
	        </div>
	    </section>



		</div>
        </div>
    </div>
  </div>
</div>
		
		@push ('scripts')
			<script>
			    $('#licliente').addClass("active");

			     toastr.options={
					"closeButton":true,
					"progressBar":true,
					"timeOut":"3000",
					"preventDuplicates":true
				};
			    function veriDocDatos(){
			    	revise_nroI();
			    	setTimeout("$('#frm_add').submit();",500);
			    }

			    $("#nit").on("keyup",function(){
				  val =$(this).val();
				  nro=numberData(val);
				  $(this).val(nro);
				});
			</script>	
		@endpush
	@endsection
			
		