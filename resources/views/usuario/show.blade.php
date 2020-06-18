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
    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
    </div> -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="telefono"><span class="fa fa-list"></span> Telefono</label>
        <output class="form-control">{{$datos->telefono}}</output>
    </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="usuario"><span class="fa fa-user"></span> Usuario</label>
        <output class="form-control">{{$datos->name}}</output>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="email"><span class="fa fa-envelope"></span> Email</label>
        <output class="form-control">{{$datos->email}}</output>
    </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="rol"><span class="fa fa-list"></span> Rol</label>
        <output class="form-control">{{$datos->rol}}</output>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="direccion"><span class="fa fa-list"></span> Direccion</label>
        <textarea class="form-control form-readonly" readonly>{{$datos->direccion}}</textarea>
    </div>
    </div>
</div>