@extends('layouts.admin')
<!-- @section('title','Panel Categoria') -->

@section('contenido')
	<section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <a href="categoria/create" class="btn btn-primary btn-flat" title="Agregar nueva categoria"><span class="fa fa-plus"></span> Agregar</a>
                    </div>
                    <div class="col-md-4" align="right">
			        	<ol class="breadcrumb">
				            <li><a href="{{url('inicio')}}" class="act" title="Ir a inicio"><i class="fa fa-home"></i> Inicio</a></li>
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

   
    <!-- warning, error -->

@push ('scripts')
<script>
    $('#licategoria').addClass("active");

	$(function(){
				var c=1;
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
			              return '<a href="categoria/editar/'+row.id+'" class="btn btn-warning btn-xs" title="Editar">'+
			              '<span class="fa fa-pencil"></span></a>';
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
