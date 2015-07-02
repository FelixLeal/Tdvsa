




{!! Form::label('nombre', 'Titulo del Proyecto') !!}
{!! Form::text('nombre', null, ['placeholder' => 'Titulo del Proyecto' ] ) !!}

{{-- {!! Form::label('descripcion', 'Descripcion') !!} --}}
{{-- {!! Form::label('descripcion', 'Titulo del proyecto') !!} --}}
{{-- {!! Form::text('descripcion', null, ['placeholder' => 'Titulo del Proyecto' ] ) !!} --}}

{!! Form::label('nro_control', 'Nro de Control') !!}
{!! Form::text('nro_control', null, ['placeholder' => '# Control' ] ) !!}

{!! Form::label('nombre_empresa', 'Nombre de la Empresa') !!}
{!! Form::text('nombre_empresa', null, ['placeholder' => 'Nombre de la Empresa' ] ) !!}

{{--{!! Form::label('requerimientos', 'Requerimientos') !!} --}}
{{--{!! Form::textarea('requerimientos', null, [ 'maxLength' => '300', 'placeholder' => 'Requerimientos del Proyecto' ] ) !!}--}}

{!! Form::label('requerimientos', 'Descripción del Proyecto') !!}
{!! Form::textarea('requerimientos', null, [ 'maxLength' => '300', 'placeholder' => 'Una breve explicación de su proyecto' ] ) !!}