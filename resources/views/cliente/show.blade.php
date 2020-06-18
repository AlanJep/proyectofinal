<div class="form-group">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="nombres"><span class="fa fa-group"></span> Nombres</label>
        <output class="form-control">{{$datos->nombres}}</output>
    </div>
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="Apellidos"><span class="fa fa-group"></span> Apellidos</label>
        <output class="form-control">{{$datos->apellidos}}</output>
    </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="nro_documento"><span class="fa fa-list"></span> Nro documento</label>
        <output class="form-control">
            @if($datos->lnro && $datos->lnros)
                {{$datos->lnro}}{{$datos->lnros}}-{{$datos->nro_documento}}
            @elseif($datos->lnro)
                {{$datos->lnro}}-{{$datos->nro_documento}}
            @else
                {{$datos->nro_documento}}
            @endif
        </output>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="telefono"><span class="fa fa-list"></span> Telefono</label>
        <output class="form-control">{{$datos->telefono}}</output>
    </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="direccion"><span class="fa fa-list"></span> Direccion</label>
        <textarea class="form-control form-readonly" readonly>{{$datos->direccion}}</textarea>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="nit"><span class="fa fa-list"></span> N.I.T. </label>
        <output class="form-control">{{$datos->nit}}</output>
    </div>
    </div>
</div>