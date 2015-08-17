{!! Form::label('rif', 'Rif') !!}
{!! Form::text('rif', null, ['placeholder' => 'Rif de tu Empresa', 'readonly'] ) !!}

{!! Form::label('razon_social', 'Razon Social') !!}
{!! Form::text('razon_social', null, ['placeholder' => 'Razon Social', 'readonly'] ) !!}

{!! Form::label('codigo_afiliacion', 'Codigo de Afiliacion') !!}
{!! Form::text('codigo_afiliacion', '', ['placeholder' => 'Codigo de Afiliacion' ] ) !!}

{!! Form::label('id_tipo_cliente', 'Tipo de Cliente') !!}
{!! Form::select('id_tipo_cliente', ['0' => 'Seleccione...', '1' => '10%', '2' => '20%'], 0) !!}
