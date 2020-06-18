@extends('layouts.admin')
	@section('contenido')

<div class="medilife-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="specialities-tab" data-toggle="tab" href="#specialities" role="tab" aria-controls="specialities" aria-selected="true">Usuarios</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="specialities" role="tabpanel" aria-labelledby="specialities-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2>Editar datos del usuario del personal</h2>

		<section class="content">
	        <div class="box box-solid">
	            <div class="box-body">
	                <div class="row">
	                    <div class="col-md-8">
							<div class="box-header with-border">
								<h4 class="box-title"><span class="glyphicon glyphicon-list-alt"></span> Actualizar Usuario </h4>
							</div>
							
						</div>
	                    <div class="col-md-4" align="right">
				        	<ol class="breadcrumb">
					            <li><a href="{{url('inicio')}}" class="act" title="Ir a inicio"><i class="fa fa-home"></i> Inicio /</a></li>
					            <li><a href="{{url('usuario')}}" class="act" title="Ir a usuarios"> Usuarios /</a></li>
					            <li class="menu-active">Actualizar</li>
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

					{!!Form::model($usuario,['method'=>'PATCH','route'=>['usuario.update',$usuario->id],'id'=>'frm_add'])!!}
						<div class=" form-add-body">
							<div class="form-group">
								<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="nombres"><span class="fa fa-group"></span> Nombres (*)</label>
									<input type="text" class="form-control"  name="nombres" placeholder="Introduce nombre" value="{{$persona->nombres}}" onkeypress="return validar(event,1)">
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="apellidos"><span class="fa fa-group"></span> Apellidos</label>
									<input type="text" class="form-control"  name="apellidos" placeholder="Introduce apellido" value="{{$persona->apellidos}}" onkeypress="return validar(event,1)">
								</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<label for="nro" class="frm-gn"><span class="fa fa-list"></span> Nro documento(*)</label>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
												<input type="text" class="form-control frm-gn" name="nro" id="vnro" placeholder="Introduce numero" title="Numeros, 5 digitos como minimo" minlength="5" maxlength="10" value="{{$persona->nro_documento}}">
												<input type="hidden" id="cvnro" value="{{$persona->nro_documento}}">
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
												<div class="row">
												<input type="text" class="input-mi col-lg-6 col-md-6 col-sm-6 col-xs-6" name="nrol" id="vnrol" placeholder="Letras" title="Opcional, solo letras" maxlength="4" onkeypress="return validar(event,1)" value="{{$persona->lnro}}">
												<input type="hidden" id="cvnrol" value="{{$persona->lnro}}">
												<input type="text" class="input-mi col-lg-6 col-md-6 col-sm-6 col-xs-6" name="lnros" id="vnros" placeholder="Numeros" title="Opcional, solo numeros" maxlength="4" onkeypress="return validar(event,2)" value="{{$persona->lnros}}">
												<input type="hidden" id="cvnros" value="{{$persona->lnros}}">
												</div>
											</div>
										</div>
									</div> -->
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<label for="telefono"><span class="fa fa-list"></span> Telefono </label>
										<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Introduce telefono" maxlength="10" value="{{$persona->telefono}}">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="usuario"><span class="fa fa-user"></span> Usuario (*)</label>
									<input type="text" class="form-control" name="usuario" placeholder="Introduce usuario" value="{{$usuario->name}}">
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="password"><span class="fa fa-lock"></span> Password (*)</label>
									<input type="password" class="form-control" name="password" placeholder="Introduce password">
								</div>
							</div>
							<div class="form-group">
								<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="email"><span class="fa fa-envelope"></span> Email (*)</label>
									<input type="text" class="form-control" name="email" placeholder="Introduce email" value="{{$usuario->email}}">
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="idrol"><span class="fa fa-list"></span> Rol</label>
									<select class="form-control selectpicker" name="rol">
										@if($usuario->rol=='Administrador')
											<option selected>Administrador</option>
											<option>Agente Venta</option>
										@else 
											<option>Administrador</option>
											<option selected>Agente Venta</option>
										@endif
									</select>
								</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="direccion"><span class="fa fa-list"></span> Direccion</label>
									<input type="text" class="form-control" name="direccion" placeholder="Introduce direccion" value="{{$persona->direccion}}">
								</div>
								</div>
							</div>
						</div>

						<br>
						<!-- <div class="row"> -->
							<div class="form-group" align="center">
								<div class="row">
								<div class="col-lg-12 col-md-12  col-md-12 col-xs-12 ">
									<a href="/usuario" class="btn btn-danger btn-flat" title="Cancela y vuelve atras"><i class="fa fa-remove"></i> Cancelar</a>
									<button type="reset" class="btn btn-default btn-flat" title="Reestablece al valor inicial"><i class="fa fa-history"></i> Reestablecer</button>
									<button type="button" onclick="veriDocDatos();" class="btn btn-info btn-flat" title="Guarda los datos"><i class="fa fa-save"></i> Guardar</button>
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
			    $('#liusuario').addClass("active");

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
			</script>	
		@endpush	
	@endsection
		  