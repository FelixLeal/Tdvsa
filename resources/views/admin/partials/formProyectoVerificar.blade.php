{!! Form::label('nombre', 'Nombre del Proyecto') !!}
{!! Form::text('nombre', null, ['placeholder' => 'Nombre del Proyecto', 'readonly'] ) !!}

{!! Form::label('nro_control', 'Nro de Control') !!}
{!! Form::text('nro_control', null, ['placeholder' => 'Nro de Control' ] ) !!}

{!! Form::label('nombre_empresa', 'Nombre de la Empresa') !!}
{!! Form::text('nombre_empresa', null, ['placeholder' => 'Nombre de la Empresa', 'readonly'] ) !!}

{!! Form::label('requerimientos', 'Requerimientos') !!}
{!! Form::textarea('requerimientos', null, ['placeholder' => 'Requerimientos', 'readonly'] ) !!}
