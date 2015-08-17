{!! Form::label('nombre_empresa', 'Nombre') !!}
{!! Form::text('nombre_empresa', null, ['placeholder' => 'Nombre del Proyecto' ] ) !!}

{!! Form::label('descripcion', 'Descripcion') !!}
{!! Form::text('descripcion', null, ['placeholder' => 'Descripción del Proyecto' ] ) !!}

{!! Form::label('nro_control', 'Nro de Control') !!}
{!! Form::text('nro_control', null, ['placeholder' => '# Control' ] ) !!}

{!! Form::label('descripcion', 'Descripción de requerimientos') !!}
{!! Form::textarea('descripcion', null, [ 'maxLength' => '300', 'placeholder' => 'Descripción detallada de los requerimientos del proyecto.' ] ) !!}