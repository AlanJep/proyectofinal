@extends('layouts.admin')
	@section('contenido')

<div class="medilife-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="specialities-tab" data-toggle="tab" href="#specialities" role="tab" aria-controls="specialities" aria-selected="true">Categorias</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="specialities" role="tabpanel" aria-labelledby="specialities-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2>Crear nueva categoria</h2>


		<section class="content">
	        <div class="box box-solid">
	            <div class="box-body">
	                <div class="row">
	                    <div class="col-md-8">
							<div class="box-header with-border">
								<h4 class="box-title"><span class="glyphicon glyphicon-list-alt"></span> Registro de Categoria </h4>
							</div>
							
						</div>
	                    <div class="col-md-4" align="right">
				        	<ol class="breadcrumb">
					            <li><a href="{{url('inicio')}}" class="act" title="Ir a inicio"><i class="fa fa-home"></i> Inicio /</a></li>
					            <li><a href="{{url('categoria')}}" class="act" title="Ir a categorias"> Categorias /</a></li>
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

					{!!Form::open(array('url'=>'categoria','method'=>'POST','autocomplete'=>'off','files'=>'true', 'id'=>'frm_add'))!!}
						<div class=" form-add-body">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<label for="categoria"><span class="fa fa-list-alt"></span> Categoria (*)</label>
										<input type="text" class="form-control" id="categoria" name="categoria" placeholder="Introduce categoria">
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<label for="descripcion"><span class="fa fa-list"></span> Descripcion</label>
										<textarea class="form-control" name="descripcion" id="descripcion" placeholder="Introduce descripcion de la categoria, hasta 100 caracteres"></textarea>
									</div>
								</div>
							</div>
						</div>
						<br>

							<div class="form-group" align="center">
								<div class="row">
									<div class="col-lg-12 col-md-12  col-md-12 col-xs-12 ">
										<a href="/categoria" class="btn btn-danger btn-flat" title="Cancela y vuelve atras"><i class="fa fa-remove"></i> Cancelar</a>
										<button type="reset" class="btn btn-default btn-flat" title="Reestablece al valor inicial"><i class="fa fa-history"></i> Reestablecer</button>
										<button type="submit" class="btn btn-info btn-flat" title="Guarda los datos"><i class="fa fa-save"></i> Guardar</button>
									</div>
								</div>
							</div>
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
			    $('#licategoria').addClass("active");
			</script>	
		@endpush	
	@endsection
			
		