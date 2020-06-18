@extends('layouts.admin')
	@section('contenido')

<div class="medilife-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="specialities-tab" data-toggle="tab" href="#specialities" role="tab" aria-controls="specialities" aria-selected="true">Ventas</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="specialities" role="tabpanel" aria-labelledby="specialities-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2>Lista de todas las ventas</h2>

		<section class="content">
	        <div class="box box-solid">
	            <div class="box-body">
	                <div class="row">
	                    <div class="col-md-8">
	                        <a href="venta/create" class="btn btn-primary btn-flat" title="Agregar nueva venta"><span class="fa fa-plus"></span> Agregar</a>
	                    </div>
	                    <div class="col-md-4" align="right">
				        	<ol class="breadcrumb">
					            <li><a href="{{url('inicio')}}" class="act" title="Ir a inicio"><i class="fa fa-home"></i> Inicio /</a></li>
					            <li class="menu-active">Ventas</li>
					        </ol>
			        	</div>
	                </div>
	                <hr>
	                <div class="row table-list table-responsive">
	                    <div class="col-md-12">
	                       <table class="table table-hover" id="myTable">
								<thead>
									<th>Nro</th>
									<th>Clientes</th>
									<th>Comprobante</th>
									<th>Nro Comprobante</th>
									<th>Fecha</th>
									<th>Total</th>
									<th>Opcion</th>
								</thead>
							</table>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="modal fade" id="modal-default">
			      <div class="modal-dialog modal-lg">
			        <div class="modal-content">
			          <div class="modal-header">
			            <h4 class="modal-title"><span class="fa fa-info-circle"></span> Informacion de la ventas</h4>
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
	    </section>


		</div>
        </div>
    </div>
  </div>
</div>
	   
	    <!-- warning, error -->

	@push ('scripts')
	<script>
	    $('#liventa').addClass("active");
		$(function(){
					var c=1;
			$("#myTable").DataTable({
				"language":{
				        "lengthMenu":"Mostrar _MENU_ registros por pagina",
				        "zeroRecords":"No se encontraron resultados en su busqueda",
				        "searchPlaceholder":"Buscar registros",
				        "info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
				        "infoEmpty":"No existen registros",
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
				"ajax": "api/ventas",
				"columns":[
					{"orderable": true,
				          render:function(data, type, row){
				              return c++;
				          }
				     },
					{data:'nombres'},
					{data:'nombre'},
					{data:'nro_documento'},
					{data:'fecha_v'},
					{data:'total'},
					{"orderable": false,
				          render:function(data, type, row){
				              return '<button data-toggle="modal" data-target="#modal-default" class="btn btn-info btn-xs btn-dato" title="Ver datos completos" value="'+row.idventa+'"><span class="fa fa-search"></span> </button>';
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
			  var url="/venta/verVenta/"+$(this).val();
			  $.ajax({
			    url:url,
			    type:"GET",
			    success:function(resp){
			      $("#modal-default .modal-body").html(resp);
			    }
			  });
		});

	</script>
	@endpush

	@endsection
