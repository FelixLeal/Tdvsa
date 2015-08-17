{!! Form::hidden('id_cotizacion', null) !!}
{!! Form::hidden('id_producto', null) !!}

{!! Form::label('nombre', 'Nombre') !!}
{!! Form::text('nombre', $productos->where('id', $datos->id_producto)->first()->nombre, ['placeholder' => 'Nombre', 'readonly' ] ) !!}

{!! Form::label('precio_unitario', 'Precio Unitario') !!}
{!! Form::text('precio_unitario', null, ['placeholder' => 'Precio Unitario', 'readonly' ] ) !!}

{!! Form::label('cantidad', 'Cantidad') !!}
{!! Form::number('cantidad') !!}
