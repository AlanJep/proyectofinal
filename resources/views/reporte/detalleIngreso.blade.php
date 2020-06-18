<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<div id="facr">
				<br>
				<div class=" form-fac">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">   
			                <b><u>REPORTE DE INGRESOS</u></b><br>
			                <b>Usuario:</b>  {{$usuario->name}}<br>
			            </div>  
			            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">   
			                <b><u>FECHA</u></b> <br>
			                <b>Fecha de reporte: <?php echo date("d/m/Y");?></b><br>
			            </div> 
					</div>
				</div>
				<br>
			<table class="tables table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>Usuario</th>
						<th>Proveedor</th>
                      	<th>Comprobante</th>
                      	<th>Fecha</th>
                      	<th>Total</th>
                      	<th class="no-print"></th>
					</tr>
				</thead>
				<tbody>
					<?php $total=0;?>
						@foreach($ingresos as $ing)
							<tr>
								<td>{{ $ing->name }}</td>
								<td>{{ $ing->proveedor }}</td>
								<td>{{$ing->nombre}} - {{ $ing->nro_documento }}</td>
								<td>{{ $ing->fecha_i}}</td>
								<td>{{ $ing->total}}</td>
								<td class="no-print">
									<button data-toggle="modal" data-target="#modal-default" class="btn btn-info btn-xs btn-dato" title="Ver datos completos" value="{{$ing->idingreso}}}"><span class="fa fa-search"></span> </button></td>
								<?php $total+=$ing->total;?>
							</tr>
						@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4">TOTAL</td>
						<td><?php echo $total;?></td>
						<td class="no-print"></td>
					</tr>
				</tfoot>
			</table>
			</div>
		</div>
		@if($total>0)
			<div class="col-lg-12" align="center">
				 <a href="/inicio" class="btn btn-warning btn-flat" title="Vuelve al inicio"><i class="fa fa-arrow-left"></i> Cancelar</a>
	        	<button type="button" class="btn btn-info btn-flat btn-printr" title="Imprime el reporte"><i class="fa fa-print"></i> Imprimir</button>
			</div>
		@else
			<div class="col-lg-12" align="center">
				<h5>No hay datos registrados</h5>
				<a href="/inicio" class="btn btn-warning btn-flat" title="Vuelve al inicio"><i class="fa fa-arrow-left"></i> Cancelar</a>
			</div>
		@endif
		
	</div>
</div>
<br><br>
