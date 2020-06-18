@extends('layouts.admin')
	@section('contenido')

<div class="medilife-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="specialities-tab" data-toggle="tab" href="#specialities" role="tab" aria-controls="specialities" aria-selected="true" onclick="funfecha()">Avisos</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="specialities" role="tabpanel" aria-labelledby="specialities-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2>lista de productos pronto a vencerse</h2>

		<section class="content">
	        <div class="box box-solid">
	            <div class="box-body">
	                <div class="row">
	                    <div class="col-md-8">
	                        <!-- <a href="producto/create" class="btn btn-primary btn-flat" title="Agregar nuevo producto"><span class="fa fa-plus"></span> Agregar</a> -->
	                        <h4 class="act"><span class="fa fa-info-circle"></span> Productos que se venceran antes del
								<?php echo date(date("d-m-Y", strtotime(date("d-m-Y")."+ 1 month")));?>
	                        </h4>
	                    </div>
	                    <div class="col-md-4" align="right">
				        	<ol class="breadcrumb">
					            <li><a href="{{url('inicio')}}" class="act" title="Ir a inicio"><i class="fa fa-home"></i> Inicio /</a></li>
					            <li class="menu-active">Productos</li>
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
									<th>Stock</th>
									<th>Fecha Venc.</th>
									<th>Vence en</th>
									<th>Categoria</th>
								</thead>
							</table>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <!-- warning, error -->

</div>
        </div>
    </div>
  </div>
</div>

	@push ('scripts')
	<script>
	    $('#liavisof').addClass("active");
		$(function(){
					var c=1;
					var fechaAc=fechaActual();
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
				"ajax": "/api/fecha",
				"columns":[
					{"orderable": true,
				          render:function(data, type, row){
				              return c++;
				          }
				     },
					{data:'nombre'},
					{data:'stock'},
					{data:'fecha_venc'},
					{"orderable": false,
				          render:function(data, type, row){
				          	  var fechaInicio = new Date(fechaAc).getTime();
				          	  var fechaFin = new Date(row.fecha_venc).getTime();
				          	  var diferencia = (fechaFin - fechaInicio)/(1000*60*60*24);
				          	  var resultado=diferencia+" dias";
				          	  if(diferencia <= 0){
				          	  	  resultado="<span class='vencido'>vencido</span>";
				          	  }
							  return resultado;
				          }
				     },
					{data:'categoria'},
				]
			});
		});

		function fechaActual(){
		  var fecha = new Date(); //Fecha actual
		  var mes = fecha.getMonth()+1; //obteniendo mes
		  var dia = fecha.getDate(); //obteniendo dia
		  var an = fecha.getFullYear();
		  return an+"-"+mes+"-"+dia;
		}

	</script>
	@endpush

	@endsection
