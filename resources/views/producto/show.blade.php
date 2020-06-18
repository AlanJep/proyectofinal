<div class="form-group">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="articulo"><span class="fa fa-shopping-cart"></span> Producto</label>
        <output class="form-control">{{$producto->nombre}}</output>
    </div>
  <!--    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="precio"><span class="fa fa-dollar"></span> Precio</label>
        <output class="form-control">{{$producto->precio}}</output>
    </div>
</div>
<div class="form-group"> -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="stock"><span class="fa  fa-sort-numeric-asc"></span> Stock</label>
        <output class="form-control">{{$producto->stock}}</output>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="categoria"><span class="fa fa-list-alt"></span> Categoria</label>
        <output class="form-control">{{$producto->categoria}}</output>
    </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="descripcion"><span class="fa fa-list"></span> Descripcion</label>
        <textarea class="form-control form-readonly" readonly>{{$producto->descripcion}}</textarea>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="imagen"><span class="fa fa-image"></span> Imagen</label><br>
        <img src="{{asset('imagenes/productos/'.$producto->imagen)}}" alt="{{$producto->nombre}}" width="70%" class="img-thumbnail">
    </div>
    </div>
</div>
