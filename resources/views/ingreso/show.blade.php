<div id="fac">
    <div class=" form-fac">
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
                <img src="{{asset('dist/img/core-img/logo.png')}}"  class="data-fac-img" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">   
                <b><u>DATOS DEL PROVEEDOR</u></b><br>
                <b>Nombre:</b>  {{$ingreso->nombres}}<br>
                <b>Ci / Nit:</b>
                    @if($ingreso->lnro && $ingreso->lnros)
                        {{$ingreso->lnro}}{{$ingreso->lnros}}-{{$ingreso->nro_documento}}<br>
                    @elseif($ingreso->lnro)
                        {{$ingreso->lnro}}-{{$ingreso->nro_documento}}<br>
                    @else
                        {{$ingreso->nro_documento}}<br>
                    @endif
            </div>  
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">   
                <b><u>COMPROBANTE</u></b> <br>
                <b>Tipo de Comprobante: {{$ingreso->nombre}}</b><br>
                <b>Nro de {{$ingreso->nombre}}:</b> {{$ingreso->nroc}}<br>
                <b>Fecha de Emision: </b> {{$ingreso->fecha_i}}
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
                    <th>Precio C.</th>
                    <th>Precio V.</th>
                    <th>Fecha Vc.</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $venta=0;?>
                @foreach($detalle as $d)
                <tr>
                    <td>{{$d->nombre}}</td>
                    <td>{{$d->marca}}</td>
                    <td>{{$d->cantidad}}</td>
                    <td>{{$d->precio}}</td>
                    <td>{{$d->preciov}}</td>
                    <td>{{$d->fecha_venc}}</td>
                    <td>{{$d->subtotal}}</td>
                    <?php $venta+=$d->cantidad*$d->preciov;?>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-right"><strong>Total:</strong></td>
                    <td>{{$ingreso->total}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<br>
<div class="row form-fac">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-bordered">
                <tr>
                    <th colspan="4">Total invertido</th>
                    <td>{{$ingreso->total}}</td>
                </tr>
                <tr>
                    <th colspan="4">Posible venta</th>
                    <td><?php echo $venta;?></td>
                </tr>
                <tr>
                    <th colspan="4">Ganancia</th>
                    <?php $ganancia= $venta - $ingreso->total; ?>
                    <td><?php echo $ganancia; ?></td>
                </tr>
        </table>
    </div>
</div>
 <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 data-fac" align="center">
        <button type="button" class="btn btn-warning btn-flat" data-dismiss="modal" title="Cierra esta vista"><span class="fa fa-remove"></span> Cerrar</button>
        <!-- <a href="processes/buy/pdfProcess" target="_blank" class="btn btn-danger btn-flat" title="Descarga en formato pdf"><i class="fa fa-file-pdf-o"></i> Pdf</a> -->
        <button type="button" class="btn btn-info btn-flat btn-print" title="Imprime el comprobante"><i class="fa fa-print"></i> Imprimir</button>
    </div>
</div>