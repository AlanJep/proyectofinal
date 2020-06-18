<div class="form-group">
		{!! Form::label('nombre','Nombre del Modulo') !!}
		{!! Form::text('nombre',null,['class' => 'form-control']) !!}
</div>

<div class="form-group" >
		
		{!! Form::label('descrip','Descripcion')!!}
		{!! Form::text('descrip',null,['class' => 'form-control','placeholder'=>'relacionado con el registro']) !!}
</div>

<div class="form-group">
		{!! Form::label('perfil','Perfil') !!}
		{!! Form::file('perfil') !!}
</div>