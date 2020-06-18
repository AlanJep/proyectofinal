@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-10">
            <div class="card">
                <div class="p-3 mb-2 bg-info text-white">Iniciar Sesión</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>&nbsp;
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Introduce aqui tu email" required autofocus>
                                     @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>


                               
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                
                                 <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-eye"></i></span>&nbsp;
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="introduce aqui tu contraseña" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-outline-primary"> <span class="fa fa-sign-in"></span>
                                        Ingresar
                                    </button>
                                </div>
                                <div class="col-lg-6 col-md col-sm-12 col-xs-12">

                                    <a href="/" class="btn btn-outline-danger"><span class="fa fa-times"></span> Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        @if(Session::has('message'))
                var type="{{Session::get('alert-type','error')}}";
                toastr.options={
                    "closeButton":true,
                    "progressBar":true,
                    "timeOut":"6000"
                };
                switch(type){
                    case'info':
                        toastr.info("{{Session::get('message')}} ");
                        
                        break;
                    case'error':
                        toastr.error("{{Session::get('message')}}");
                        break;
                }
        @endif
    </script>
@endpush

@endsection
