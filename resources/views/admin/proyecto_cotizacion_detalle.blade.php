@extends('layouts.admin')

@section('titleInicioAdmin')
	Bienvenido | Mobotix
@endsection

@section('contentInicioAdmin')

    <div class="large-12 columns" style="font-weight: bold !important;"><h3> Cotizacion </h3></div>
    <div class="large-12 columns prueba">

        {!! Form::label('concepto', 'Titulo del Proyecto') !!}
        {!! Form::text('concepto',  $datos->concepto, ['readonly']) !!}

        {!! Form::label('monto', 'Monto') !!}
        {!! Form::text('monto', $datos->monto, ['readonly']) !!}

        <table cellspacing="0">

            <tr>
                <th>N°</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
            <!--{{ $i=0 }}-->
            @foreach ($datos_cotizacion_producto as $dato)
            <tr>
                <td>{{ $i = $i + 1 }}</td>
                <td>{{ $productos->where('id', $dato->id_producto)->first()->nombre }}</td>
                <td>{{ $dato->cantidad }}</td>
                <td class="monto">{{ number_format($dato->precio_unitario, 2, ',', '.') }}</td>
            </tr>
            @endforeach

        </table>

        {!! $datos_cotizacion_producto->render() !!}

        <a href="{{ URL::previous() }}"> Atras </a>

    </div>
	
@endsection