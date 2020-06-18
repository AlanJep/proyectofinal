@extends ('layouts.admin')
    @section ('contenido')

    <div class="medilife-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <!-- <a class="nav-link active" id="specialities-tab" data-toggle="tab" href="#specialities" role="tab" aria-controls="specialities" aria-selected="true">&nbsp;</a> -->
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="specialities" role="tabpanel" aria-labelledby="specialities-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <!-- <h2>&nbsp;</h2> -->


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
       <img src="{{asset('dist/img/comun.jpg')}}" alt="" class="d-block w-100">
        <div class="carousel-caption slider-fondo">
            <h4>Velamos por tu comunidad</h4>
            Estamos para brindarte el mejor servicio.
        </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('dist/img/comun1.jpg')}}" alt="">
        <div class="carousel-caption slider-fondo">
            <h4>Te recomendamos lo mejor</h4>
            Por que mereces ser tratado mejor
        </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('dist/img/carretera.png')}}" alt="">
        <div class="carousel-caption slider-fondo">
            <h4>Carretera en buena condición</h4>
            Contamos con la carretera y la seguridad que permitiran llegar a tu estudio
        </div>
    </div>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterion</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>



            </div>
        </div>
    </div>
  </div>
</div>

    @push('scripts')
        <script>
            $('#liinicio').addClass("active");

            $(function(){
                toastr.options={
                    "closeButton":true,
                    "progressBar":true,
                    "timeOut":"5000"
                };

                @if($stock[0] != "sn")
                    toastr.warning("Hay productos con stock menor a 20 "+"( <a href='/aviso/cantidad'>Ver</a> )");
                @endif

                 @if($vence[0] != "sf")
                    toastr.warning("Hay vehiculos con que se estan atrasando "+"( <a href='/aviso/fecha'>Ver</a> )");
                @endif


                // slider
                $("#carouselExampleIndicators").carousel({
                    interval:2500,
                    pause:"hover",
                });
                // $("#ejemplo").on("click",function(e){
                //     e.preventDefault(); 
                //     $("#myslide").carousel("next");
                // });
            });
           
        </script>
    @endpush
@endsection