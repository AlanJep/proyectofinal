<div id="fac">
    <div class="form-fac">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 data-fac">
                Direccion: Calle las americas y colon  <br>
                Telefono: 8000201  <br>
                Nit :  4080829017 <br>
                Email: medilife@gmail.com
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
                <h5><strong>Medilife</strong></h5>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
                <img src="{{asset('dist/img/core-img/logo.png')}}" class="data-fac-img" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">   
               <b><u>DATOS DEL CLIENTE</u></b><br>
                <b>Nombre:</b>  {{$venta->nombres}}<br>
                <b>Ci / Nit:</b> 
                    @if($venta->lnro && $venta->lnros)
                        {{$venta->lnro}}{{$venta->lnros}}-{{$venta->nro_documento}}<br>
                    @elseif($venta->lnro)
                        {{$venta->lnro}}-{{$venta->nro_documento}}<br>
                    @else
                        {{$venta->nro_documento}}<br>
                    @endif
            </div>  
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">   
                <b><u>COMPROBANTE</u></b> <br>
                <b>Tipo de Comprobante: {{$venta->nombre}}</b><br>
                <b>Nro de {{$venta->nombre}}: {{$venta->nroc}}<br>
                <b>Fecha de Emision: </b> {{$venta->fecha_v}}
            </div>  
        </div>
    </div>
    <div class=" table-responsive">
         <table class="table table-bordered table-fac">
            <thead>
                <tr>
                    <th colspan="7" class="text-center">DESCRIPCION</th>
                </tr>
                <tr>
                    <th>Producto</th>
                    <th>Marca</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Contiene</th>
                    <th>Fecha Vc.</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detalle as $d)
                <tr>
                    <td>{{$d->nombre}}</td>
                    <td>{{$d->marca}}</td>
                    <td>{{$d->cantidad}}</td>
                    <td>{{$d->preciov}}</td>
                    <td>{{$d->unidad}}</td>
                    <td>{{$d->fecha_venc}}</td>
                    <td>{{$d->subtotal}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-right"><strong>Total:</strong></td>
                    <td>{{$venta->total}}</td>
                </tr>
            </tfoot>
        </table>
     </div>
 </div>
<br>
 <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 data-fac" align="center">
        <button type="button" class="btn btn-warning btn-flat" data-dismiss="modal" title="Cierra esta vista"><span class="fa fa-remove"></span> Cerrar</button>
        <!-- <a href="processes/buy/pdfProcess" target="_blank" class="btn btn-danger btn-flat" title="Descarga en formato pdf"><i class="fa fa-file-pdf-o"></i> Pdf</a> -->
        <button type="button" class="btn btn-info btn-flat btn-print" title="Imprime el comprobante"><i class="fa fa-print"></i> Imprimir</button>
    </div>
</div>