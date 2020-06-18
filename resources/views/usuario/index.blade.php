@extends('layouts.admin')
	@section('contenido')

	<div class="medilife-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="specialities-tab" data-toggle="tab" href="#specialities" role="tab" aria-controls="specialities" aria-selected="true">Personal</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="specialities" role="tabpanel" aria-labelledby="specialities-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2>Lista de todos los usuarios del personal</h2>
                                    
		<section class="content">
	        <div class="box box-solid">
	            <div class="box-body">
	                <div class="row">
	                    <div class="col-md-8">
	                        <a href="usuario/create" class="btn btn-info btn-flat" title="Agregar nuevo usuario"><span class="fa fa-plus"></span> Agregar</a>
	                    </div>
	                    <div class="col-md-4" align="right">
				        	<ol class="breadcrumb">
					            <li><a href="{{url('inicio')}}" class="act" title="Ir a inicio"><i class="fa fa-home"></i> Inicio / </a></li>
					            <li class="menu-active"> Personal</li>
					        </ol>
			        	</div>
	                </div>
	                <hr>
	                <div class="row table-list table-responsive">
	                    <div class="col-lg-12 col-md-12">
	                       <table class="table table-hover" id="myTable">
								<thead>
									<th>Nro</th>
									<th>Usuario</th>
									<th>Email</th>
									<th>Rol</th>
									<th>Estado</th>
									<th>Opciones</th>
								</thead>
							</table>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>

	    <div class="modal fade" id="modal-default">
		      <div class="modal-dialog">
		        <div class="modal-content">
		          <div class="modal-header modal-title">
		            <h4 class="modal-title"><span class="fa fa-info-circle"></span> Informacion del Usuario</h4>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span></button>
		          </div>
		          <div class="modal-body">
		          	 <div class="form-add-body"></div>
		          </div>
		          <div class="clearfix"></div>
		          <div class="modal-footer">
		            <button type="button" class="btn btn-danger btn-flat pull-right" data-dismiss="modal" title="Cierra esta vista"><span class="fa fa-remove"></span> Cerrar</button>
		          </div>
		        </div>
		        <!-- /.modal-content -->
		      </div>
		</div>

		<div class="modal fade" id="modal-usuario">
		      <div class="modal-dialog modal-sm">
		        <div class="modal-content">
		          <div class="modal-header modal-title">
		            <h4 class="modal-title"><span class="fa fa-info-circle"></span> Verificacion del Usuario</h4>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span></button>
		          </div>
		          <div class="modal-body">
		          	 <div class="form-add-body">
			          	 	<div class="form-group">
		          	 		<div class="row">
							    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							        <label for="nombres"><span class="fa fa-lock"></span> Password</label><br>
							        <input type="password" id="password" placeholder="Introduzca el password del Usuario" class="form-control">
							    </div>
			          	 	</div>
						</div>
		          	 </div>
		          </div>
		          <div class="clearfix"></div>
		          <div class="modal-footer">
			            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 data-fac" align="center">
					        <button type="button" class="btn btn-warning btn-flat" data-dismiss="modal" title="Cierra esta vista"><span class="fa fa-remove"></span> Cerrar</button>
					        <button type="button" class="btn btn-info btn-flat btn-editar" id="idusuario" title="Procede a la Verificacion"><i class="fa fa-eye"></i> Aceptar</button>
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
	    <!-- warning, error -->

	@push ('scripts')
	<script>
	    $('#liusuario').addClass("active");

	    toastr.options={
			"closeButton":true,
			"progressBar":true,
			"timeOut":"3000"
		};

		$(function(){
					var c=1;
					var op="";
			// $('#myTable').DataTable().destroy();
			$('#myTable').css('width', '100%');
			$("#myTable").DataTable({
				"language":{
				        "lengthMenu":"Mostrar _MENU_ registros por pagina",
				        "zeroRecords":"No se encontraron resultados en su busqueda",
				        "searchPlaceholder":"Buscar registros",
				        "info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
				        "infoEmpty":"No existen registrosos",
				        "infoFiltered":"(filtrado de un total de _MAX_ registros)",
				        "search":"Buscar",
				        'processing':"Procesando",
				        "paginate":{
				          "first":"primero",
				          "last":"ultimo",
				          "next":"Siguiente",
				          "previous":"Anterior"
				        },
				      },
				  "lengthMenu": [[10, 25, 50, 100,], [10, 25, 50, 100]],
				  'paging': true,
				  'info': true,
				  'filter': true,

				"processing":true,
				"ServerSide":true,
				"ajax": "api/usuarios",
				"columns":[
					{"orderable": true,
				          render:function(data, type, row){
				              return c++;
				          }
				     },
					{data:'name'},
					{data:'email'},
					{data:'rol'},
					{data:'estado'},
					{"orderable": false,
				          render:function(data, type, row){
				          	if(row.estado=="Activo"){
				              	op=' <a href="usuario/estado/'+row.id+'" class="btn btn-danger btn-xs" title="Dar Baja">'+
				              				'<span class="fa fa-check"></span></a>';
				          	}
				          	else{
				          		op=' <a href="usuario/estado/'+row.id+'" class="btn btn-danger btn-xs" title="Dar Alta">'+
				              				'<span class="fa fa-warning"></span></a>';
				              			
								}
							opc=' <button value="'+row.id+'" data-toggle="modal" data-target="#modal-usuario" class="btn btn-warning btn-xs btn-usuario" title="Editar"><span class="fa fa-pencil"></span></button>'+
				              	' <button data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs btn-dato" title="Ver datos completos" value="'+row.id+'"><span class="fa fa-search"></span> </button>';
				             return op+opc;
				              			
				          }
				     }
				]
			});
		});
			$('#myTable_paginate').css('color', 'red');

		@if(Session::has('message'))
    		var type="{{Session::get('alert-type','info')}}";
    		switch(type){
    			case'info':
    				toastr.info("{{Session::get('message')}} ");
    				
    				break;
    			case'success':
    				toastr.success("{{Session::get('message')}}");
    				break;
    		}
    	@endif

    	$(document).on("click",".btn-dato",function(e){
			  var url="usuario/verusuario/"+$(this).val();
			  $.ajax({
			    url:url,
			    type:"GET",
			    success:function(resp){
			      $("#modal-default .modal-body .form-add-body").html(resp);
			    }
			  });
		});

		$(document).on("click",".btn-usuario",function(e){
			  var id=$(this).val();
			  $("#idusuario").val(id);
		});
		$(document).on("click",".btn-editar",function(e){
			  var id=$(this).val();
			  password=$("#password").val();
			  if(password!="" && password!=" "){
			  	ediUsuario(id,password);
			  }else{
			  	 toastr.warning("Por favor introduzca un valor");
			  }
		});
		function ediUsuario(a,datos){
			var uri="usuario/editarUsuario";
			$.ajax({
			      url: uri,
		          type:"GET",
		          dataType:"json",
		          data:{id: a, contra:datos},
		          success:function(data){
		          	  if(data=="si"){
						location.href="usuario/editar/"+a;
		          	  }
		          	  else{
		                toastr.warning("Los datos no coinciden, por favor introduzca los datos correctamente");
		                $("#password").val("");
		          	  }
		          }
			  });

		}
	</script>
	@endpush

	@endsection
