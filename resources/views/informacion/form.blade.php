<div class="form-group">
		{!! Form::label('nombre','Nombre del Informe') !!}
		{!! Form::text('nombre',null,['class' => 'form-control']) !!}
</div>

<div class="form-group" >
		
		{!! Form::label('decri','Detalle del Informe')!!}
		{!! Form::text('decri',null,['class' => 'form-control','placeholder'=>'Una descripcion breve']) !!}
</div>

<div class="form-group">
		{!! Form::label('perfil','Perfil') !!}
		{!! Form::file('perfil') !!}
	</div>
