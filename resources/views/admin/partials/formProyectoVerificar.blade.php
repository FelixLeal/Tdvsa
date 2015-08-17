{!! Form::label('nro_control', 'Nro de Control') !!}
{!! Form::text('nro_control', null, ['placeholder' => 'Nro de Control' ] ) !!}

{!! Form::label('nombre_empresa', 'Nombre de la Empresa') !!}
{!! Form::text('nombre_empresa', null, ['placeholder' => 'Nombre de la Empresa', 'readonly'] ) !!}

{!! Form::label('descripcion', 'Descripción de requerimientos') !!}
{!! Form::textarea('descripcion', null, ['placeholder' => 'Descripción', 'readonly'] ) !!}
