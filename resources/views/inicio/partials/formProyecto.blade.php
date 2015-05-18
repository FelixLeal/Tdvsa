




{!! Form::label('nombre', 'Nombre') !!}
{!! Form::text('nombre', null, ['placeholder' => 'Nombre del Proyecto' ] ) !!}

{!! Form::label('descripcion', 'Descripcion') !!}
{!! Form::text('descripcion', null, ['placeholder' => 'Descripcion del Proyecto' ] ) !!}

{!! Form::label('nro_control', 'Nro de Control') !!}
{!! Form::text('nro_control', null, ['placeholder' => '# Control' ] ) !!}

{!! Form::label('nombre_empresa', 'Nombre de la Empresa') !!}
{!! Form::text('nombre_empresa', null, ['placeholder' => 'Nombre de la Empresa' ] ) !!}

{!! Form::label('requerimientos', 'Requerimientos') !!}
{!! Form::textarea('requerimientos', null, [ 'maxLength' => '300', 'placeholder' => 'Requerimientos del Proyecto' ] ) !!}
