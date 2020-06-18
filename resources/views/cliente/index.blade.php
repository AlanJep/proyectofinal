@extends('layouts.admin')
	@section('contenido')

	<div class="medilife-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="specialities-tab" data-toggle="tab" href="#specialities" role="tab" aria-controls="specialities" aria-selected="true">Choferes</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="specialities" role="tabpanel" aria-labelledby="specialities-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2>Lista de todos los choferes</h2>

		<section class="content">
	        <div class="box box-solid">
	            <div class="box-body">
	                <div class="row">
	                    <div class="col-md-8">
	                        <a href="cliente/create" class="btn btn-info btn-flat" title="Agregar nuevo chofer"><span class="fa fa-plus"></span> Agregar</a>
	                    </div>
	                    <div class="col-md-4" align="right">
				        	<ol class="breadcrumb">
					            <li><a href="{{url('inicio')}}" class="act" title="Ir a inicio"><i class="fa fa-home"></i> Inicio /</a></li>
					            <li class="menu-active">Choferes</li>
					        </ol>
			        	</div>
	                </div>
	                <hr>
	                <div class="row table-list table-responsive">
	                    <div class="col-md-12">
	                       <table class="table table-hover" id="myTable">
								<thead>
									<th>Nro</th>
									<th>Nombre</th>
									<th>Celular</th>
									<th>Tipo de Vehiculo</th>
									<th>Placa de Vehiculo</th>
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
		            <h4 class="modal-title"><span class="fa fa-info-circle"></span> Informacion del Chfoer</h4>
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


		</div>
        </div>
    </div>
  </div>
</div>
	   
	    <!-- warning, error -->

	@push ('scripts')
	<script>
	    $('#licliente').addClass("active");
		$(function(){
					var c=1;
					var op="";
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
				"ajax": "api/clientes",
				"columns":[
					{"orderable": true,
				          render:function(data, type, row){
				              return c++;
				          }
				     },
					{render: function(data,type,row,meta){
						if(row.apellidos!=null && row.apellidos!=""){
							return row.nombres+' '+row.apellidos;
						}
						else{
							return row.nombres;
						}
					}},
					{data:'telefono'},
					{data:'direccion'},
					{render: function(data,type,row,meta){
						if(row.lnro!=null && row.lnro!="" && row.lnros!=null && row.lnros!=""){
							return row.lnro+row.lnros+'-'+row.nro_documento;
						}
						else if(row.lnro!=null && row.lnro!=""){
							return row.lnro+'-'+row.nro_documento;
						}
						else{
							return row.nro_documento;
						}
					}},
					{"orderable": false,
				          render:function(data, type, row){
				          @if(Auth::user()->rol=="Administrador")
				              if(row.estado=="Activo"){
					             op=' <a href="cliente/estado/'+row.idcliente+'" class="btn btn-danger btn-xs" title="Dar Baja">'+
					              				'<span class="fa fa-check"></span></a>';
					          	}
					          	else{
					          		op=' <a href="cliente/estado/'+row.idcliente+'" class="btn btn-danger btn-xs" title="Dar Alta">'+
					              			'<span class="fa fa-warning"></span></a>';
					              		
					          	}
					        @endif
					          	opc=' <a href="cliente/editar/'+row.idcliente+'" class="btn btn-warning btn-xs" title="Editar">'+
				              				'<span class="fa fa-pencil"></span></a> '+
				              		' <button data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs btn-dato" title="Ver datos completos" value="'+row.idcliente+'"><span class="fa fa-search"></span> </button>';
					         
					         return op+opc;    			
				          }
				     }
				]
			});
		});

		@if(Session::has('message'))
	    		var type="{{Session::get('alert-type','info')}}";
	    		toastr.options={
					"closeButton":true,
					"progressBar":true,
					"timeOut":"3000"
				};
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
			  var url="cliente/vercliente/"+$(this).val();
			  $.ajax({
			    url:url,
			    type:"GET",
			    success:function(resp){
			      $("#modal-default .modal-body .form-add-body").html(resp);
			    }
			  });
		});

	</script>
	@endpush

	@endsection
