@extends('layouts.admin')
<!-- @section('title','Panel Categoria') -->

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
                                        <h2>Lista de todas las categorias</h2>


	<section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <a href="categoria/create" class="btn btn-primary btn-flat" title="Agregar nueva categoria"><span class="fa fa-plus"></span> Agregar</a>
                    </div>
                    <div class="col-md-4" align="right">
			        	<ol class="breadcrumb">
				            <li><a href="{{url('inicio')}}" class="act" title="Ir a inicio"><i class="fa fa-home"></i> Inicio /</a></li>
				            <li class="menu-active">Categorias</li>
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
								<th>Descripcion</th>
								<th>Opciones</th>
							</thead>
						</table>
                    </div>
                </div>
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
    $('#licategoria').addClass("active");

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
			"ajax": "api/categorias",
			"columns":[
				{"orderable": true,
			          render:function(data, type, row){
			              return c++;
			          }
			     },
				{data:'nombre'},
				{data:'descri'},
				{"orderable": false,
			          render:function(data, type, row){
			          	@if(Auth::user()->rol=="Administrador")
			              	if(row.estado=="Activo"){
				              op=' <a href="categoria/estado/'+row.id+'" class="btn btn-success btn-xs" title="Dar Baja">'+
				              				'<span class="fa fa-check"></span></a>';
				          	}
				          	else{
				          		op=' <a href="categoria/estado/'+row.id+'" class="btn btn-danger btn-xs" title="Dar Alta">'+
				              				'<span class="fa fa-warning"></span></a>';	
				              			
				          	}
				         @endif
				          	opc=' <a href="categoria/editar/'+row.id+'" class="btn btn-warning btn-xs" title="Editar">'+
			              					'<span class="fa fa-pencil"></span></a>';

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
</script>
@endpush

@endsection
