




{!! Form::label('nombre', 'Título del Proyecto') !!}
{!! Form::text('nombre', null, ['placeholder' => 'Coloque un titulo a su proyecto' ] ) !!}
<!--
{!! Form::label('descripcion', 'Descripcion') !!}
{!! Form::text('descripcion', null, ['placeholder' => 'Descripcion del Proyecto' ] ) !!} -->

{!! Form::label('nro_control', 'Nro de Control') !!}
{!! Form::text('nro_control', null, ['placeholder' => '# Control' ] ) !!}

{!! Form::label('nombre_empresa', 'Nombre de la Empresa') !!}
{!! Form::text('nombre_empresa', null, ['placeholder' => 'Nombre de la Empresa' ] ) !!}

{!! Form::label('requerimientos', 'Descripción del proyecto') !!}
{!! Form::textarea('requerimientos', null, [ 'maxLength' => '300', 'placeholder' => 'Una breve explicación de su proyecto' ] ) !!}
