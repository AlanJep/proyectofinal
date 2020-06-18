@extends('layouts.admin')
	@section('contenido')

<div class="medilife-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="specialities-tab" data-toggle="tab" href="#specialities" role="tab" aria-controls="specialities" aria-selected="true">Reportes</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="specialities" role="tabpanel" aria-labelledby="specialities-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2>Reportes relacionado con los Ingresos</h2>

		<section class="content">
	        <div class="box box-solid">
	            <div class="box-body">
	            	<div class="form-group">
	                <div class="row">
	                    <div class="col-md-8">
							<div class="box-header with-border">
								<h4 class="box-title"><span class="glyphicon glyphicon-list-alt"></span> Reporte de Ingresos </h4>
							</div>
							
						</div>
	                    <div class="col-md-4" align="right">
				        	<ol class="breadcrumb">
					            <li><a href="{{url('inicio')}}" class="act" title="Ir a inicio"><i class="fa fa-home"></i> Inicio /</a></li>
					            <li class="menu-active">Ingresos</li>
					        </ol>
			        	</div>
	                </div>
	                <hr>
	                	<div class="row form-required">
						<div class="col-lg-12 ">
						 	<span class="fa fa-info-circle"></span> Son obligatorio los campos (*) <br>
						 	<span class="fa fa-info-circle"></span> Para optimizar la busqueda use rangos de fechas no muy extensos <br>
						</div>
					</div>
					<br>
					
					<input type="hidden" id="vista" value="ingresos">

					<div class=" form-add-body">
						<div class="form-group">
							<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<label for="usuario"><span class="fa fa-user"></span> Usuario</label>
								<div>
									@if(Auth::user()->rol=="Administrador")
										<select name="idusuario" id="idusuario" class="form-control">
			                            	<option>Todos</option>
			                            	@foreach($usuarios as $us )
			                            		<option value="{{$us->id}}">{{$us->name}}</option>
			                            	@endforeach
			                            </select>
									@else
										<input type="text" class="form-control" name="nusuario" id="nusuario" value="{{ Auth::user()->name }}" disabled />
										<input type="hidden" class="form-control" name="idusuario" id="idusuario" value="{{ Auth::user()->id }}" />
									@endif
		                        </div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<label for="categoria"><span class="fa fa-calendar"></span> Desde (*)</label>
								<div class="date frm-gf" >
		                            <input type="date" class="form-control" name="fecha" id="fechai" />
		                            <input type="hidden" id="fe" />
		                        </div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<label for="descripcion"><span class="fa fa-calendar"></span> Hasta (*)</label>
								<div class="date frm-gf" >
		                            <input type="date" class="form-control" name="fechah" id="fechah" />
		                            <input type="hidden" id="fec" />
		                        </div>							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
								<label for="codigo">&nbsp;</label> <br>
								<button type="button" onclick="reportes('idusuario','fechai','fechah')" class="btn btn-info btn-repb" title="Realiza la busqueda"><i class="fa fa-search"></i> Buscar</button>
							</div>
						</div>
						</div>
					</div>
					 <div class="row table-list table-responsive">
	                    <div id="contenidoj" class="contenidoj">
							<br><br>
						</div>
					</div>
                </div>

	            </div>
	        </div>
	    </section>
	    <div class="modal fade" id="modal-default">
			      <div class="modal-dialog modal-lg">
			        <div class="modal-content">
			          <div class="modal-header">
			            <h4 class="modal-title"><span class="fa fa-info-circle"></span> Informacion del Ingreso</h4>
			            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			              <span aria-hidden="true">&times;</span></button>
			          </div>
			          <div class="modal-body">
			          </div>
			          <div class="clearfix"></div>
			          <br>
			          
			        </div>
			        <!-- /.modal-content -->
			      </div>
			</div>

	</div>
        </div>
    </div>
  </div>
</div>
		
		@push ('scripts')
			<script>
			    $('#lireportei').addClass("active");
			    $(function(){


			     $(document).on("click",".btn-dato",function(e){
					  var url="/ingreso/veringreso/"+$(this).val();
					  $.ajax({
					    url:url,
					    type:"GET",
					    success:function(resp){
					      $("#modal-default .modal-body").html(resp);
					    }
					  });
				});
			     });
			</script>	
		@endpush	
	@endsection
			
		