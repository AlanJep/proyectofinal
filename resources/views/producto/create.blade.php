@extends('layouts.admin')
	@section('contenido')

<div class="medilife-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="specialities-tab" data-toggle="tab" href="#specialities" role="tab" aria-controls="specialities" aria-selected="true">Productos</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="specialities" role="tabpanel" aria-labelledby="specialities-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2>Crear nuevo producto</h2>

		<section class="content">
	        <div class="box box-solid">
	            <div class="box-body">
	                <div class="row">
	                    <div class="col-md-8">
							<div class="box-header with-border">
								<h4 class="box-title"><span class="glyphicon glyphicon-list-alt"></span> Registro de Producto </h4>
							</div>
							
						</div>
	                    <div class="col-md-4" align="right">
				        	<ol class="breadcrumb">
					            <li><a href="{{url('inicio')}}" class="act" title="Ir a inicio"><i class="fa fa-home"></i> Inicio /</a></li>
					            <li><a href="{{url('producto')}}" class="act" title="Ir a productos"> Productos /</a></li>
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
					{!!Form::open(array('url'=>'producto','method'=>'POST', 'id'=>'frm_add', 'autocomplete'=>'off', 'files'=>'true'))!!}
						<div class=" form-add-body">
							<div class="form-group">
								<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="articulo"><span class="fa fa-shopping-cart"></span> Producto (*)</label>
									<input type="text" class="form-control" id="articulo" name="producto" placeholder="Introduce producto" >
								</div>
								<!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="precio"><span class="fa fa-dollar"></span> Precio (*)</label>
									<input type="text" class="form-control" id="precio" name="precio" placeholder="Introduce precio" >
								</div> -->
							<!-- </div>
							<div class="form-group"> -->
								<!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="stock"><span class="fa  fa-sort-numeric-asc"></span> Stock (*)</label>
									<input type="text" class="form-control" id="stock" name="stock" placeholder="Introduce stock" >
								</div> -->
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="categoria"><span class="fa fa-list-alt"></span> Categoria</label>
									<select class="form-control selectpicker" data-live-search="true" name="categoria" id="categoria">
										@foreach($categorias as $cat)
											@if($cat->nombre=="Medicamentos")
												<option value="{{$cat->id}}" selected>{{$cat->nombre}}</option>
											@else
												<option value="{{$cat->id}}">{{$cat->nombre}}</option>
											@endif
										@endforeach
									</select>
								</div>
								</div>
							</div>
							<div class="form-group" id="material">
								<div class="row">
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-10">
									<label for="descripcion"><span class="fa fa-list"></span> Material</label>
									<select name="amaterial" id="amaterial" class="form-control">
										@foreach($material as $ma)
												<option value="{{$ma->idmaterial}}">{{$ma->material}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
									<label for="">&nbsp;</label><br>
									<a class="btn btn-success" data-toggle="modal" data-target="#modal-default" title="Agregar nuevo material"><span class="fa fa-plus"></span></a>
								</div>
								</div>
							</div>
							<div class="form-group" id="unidad">
								<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="descripcion"><span class="fa fa-list"></span>Tipo</label>
									<select name="tipo" id="tipo" class="form-control">
										<option selected>Paquete</option>
										<option>Unidad</option>
									</select>
								</div>
								</div>
							</div>
							<div class="form-group" id="insumo">
								<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="descripcion"><span class="fa fa-list"></span> Contiene(*)</label>
									<input type="text" name="contiene" id="contiene" class="form-control" placeholder="introduzca cuantas unidades contiene">
								</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="descripcion"><span class="fa fa-list"></span> Descripcion</label>
									<textarea class="form-control" name="descripcion" id="descripcion" placeholder="descripcion del producto"></textarea>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="imagen"><span class="fa fa-image"></span> Imagen </label> (peso menor a 2MB)
									<input type="file" class="form-control file" name="imagen">
									&nbsp;
								</div>
								</div>
							</div>
						</div>
						

						<br>
							<div class="form-group" align="center">
								<div class="row">
									<div class="col-lg-12 col-md-12  col-md-12 col-xs-12 ">
										<a href="/producto" class="btn btn-danger btn-flat" title="Cancela y vuelve atras"><i class="fa fa-remove"></i> Cancelar</a>
										<button type="reset" class="btn btn-default btn-flat" title="Reestablece al valor inicial"><i class="fa fa-history"></i> Reestablecer</button>
										<button type="submit" class="btn btn-info btn-flat" title="Guarda los datos"><i class="fa fa-save"></i> Guardar</button>
									</div>
								</div>
							</div>
					{!! Form::close() !!}

	            </div>
	        </div>
	    </section>

	    <div class="modal fade" id="modal-default">
	    	<form action="">
		      <div class="modal-dialog">
		        <div class="modal-content">
		          <div class="modal-header">
		            <h4 class="modal-title"><span class="fa fa-info-circle"></span> Nuevo material</h4>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span></button>
		          </div>
		          <div class="modal-body">
		          	<div class="row">
		          		<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" align="center">
							<input type="text" class="form-control" name="nmaterial" id="nmaterial" placeholder="Introduzca el nuevo material" required>
						</div>
		          	</div>
		          </div>
		          <div class="clearfix"></div>
		          <br>
		          <div class="modal-footer">
		             <div class="" align="center">
				          <button type="button" class="btn btn-danger btn-flat btn-cmaterial" data-dismiss="modal" title="Cierra esta vista"><span class="fa fa-remove"></span> Cerrar</button>
		             	  <a class="btn btn-info btn-flat btn-gmaterial" title="Guarda los datos"><span class="fa fa-save"></span> Guardar</a>
		             </div>
		          </div>
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
			    $('#liproducto').addClass("active");

			    $("#material").hide();
			    $("#insumo").hide();

			    $("#unidad").hide();
			    $("#tipo").attr('disabled', 'true');

			    toastr.options={
					"closeButton":true,
					"progressBar":true,
					"timeOut":"3000",
					"preventDuplicates":true
				};
			    $(".btn-gmaterial").on('click', function() {
			    	mat=$("#nmaterial").val();
			    	var da_v=new Array();
  					da_v[0]="nmaterial";
  					if(mat=="" || mat==" " || mat=="  "){
  						toastr.warning("Por favor introduzca un material");
  					}
  					else{
  						$.ajax({
					      url: "/producto/material",
					      type:"GET",
					      dataType:"json",
					      data:{ valor: mat},
					      success:function(data){
					      	pos=data.length;
					    	$("#amaterial").html('');
				      		$.each(data,function(i,item){
				      			if(i==(pos-1)){
									$("#amaterial").append('<option value="'+item.idmaterial+'" selected>'+
											item.material+
										'</option>');
				      			}
				      			else{
				      				$("#amaterial").append('<option value="'+item.idmaterial+'">'+
											item.material+
										'</option>');	
				      			}
							});
				      		toastr.info("Material guardado");
							clean_data(da_v);
							$("#modal-default").modal("hide");
					      }
					    });
  					}
				 	
				});

				$(".btn-cmaterial").on('click', function() {
					var da_v=new Array();
  					da_v[0]="nmaterial";
  					clean_data(da_v);
				});

				$("#tipo").on('change', function() {
				    tipo=$("#tipo option:selected").text();
				    if(tipo=="Unidad"){
				      $("#insumo").hide().fadeIn(2000);
				      $("#contiene").removeAttr('disabled');
				    }
				    else{
    				    $("#insumo").hide();
					    $("#contiene").attr('disabled', 'true');
				    }    
				});
			</script>	
		@endpush
	@endsection