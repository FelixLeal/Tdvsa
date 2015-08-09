{!! Form::label('nro_control', 'Nro de Control:') !!}
{{--{!! Form::label('nro_control', str_random(5), ['placeholder' => '# Control', 'readonly' ] ) !!}--}}
{!! Form::label('nro_control', rand(00000, 99999), ['placeholder' => '# Control', 'readonly' ] ) !!}
<br>

{!! Form::label('nombre_empresa', 'Nombre de la empresa/cliente') !!}
{!! Form::text('nombre_empresa', null, ['placeholder' => 'Nombre de la Empresa' ] ) !!}

{!! Form::label('fecha_inicio', 'Fecha de Inicio') !!}
{!! Form::text('fecha_inicio', null, ['placeholder' => 'Format: YYYY-MM-DD' ] ) !!}

{!! Form::label('fecha_duracion', 'Fecha estimada de duración') !!}
{!! Form::text('fecha_duracion', null, ['placeholder' => 'Format: YYYY-MM-DD' ] ) !!}

{!! Form::label('direccion', 'Dirección de la ciudad') !!}
{!! Form::text('direccion', null, ['placeholder' => 'Dirección de la ciudad' ] ) !!}

{!! Form::label('descripcion', 'Descripción de requerimientos') !!}
{!! Form::textarea('descripcion', null, ['maxLength' => '300', 'placeholder' => 'Descripción detallada de los requerimientos del proyecto.' ] ) !!}



{{--{!! Form::label('nombre', 'Titulo del Proyecto') !!}
{!! Form::text('nombre', null, ['placeholder' => 'Titulo del Proyecto' ] ) !!}--}}

{{--{!! Form::label('requerimientos', 'Requerimientos') !!} --}}
{{--{!! Form::textarea('requerimientos', null, [ 'maxLength' => '300', 'placeholder' => 'Requerimientos del Proyecto' ] ) !!}--}}

{{--{!! Form::label('requerimientos', 'Descripción del Proyecto') !!}
{!! Form::textarea('requerimientos', null, [ 'maxLength' => '300', 'placeholder' => 'Una breve explicación de su proyecto' ] ) !!}--}}