@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')
    <script type="text/javascript">
        $(document).ready(function(){
            
            $("#9").addClass("oscuro");                             
        });
    </script>
    <div class="large-12 columns" style="pading: 0px"><h3>Soporte Tecnico</h3></div>

    {!! Form::open( ['route' => 'soporte_tecnico.store', 'id' => 'form_2', 'class' => 'large-12' ] ) !!}
        <div class="large-12 columns prod report" style="padding: 0px;">
            <div class="large-12 columns alto-estandar" style="font-weight: bold !important;">
                {!! Form::label('nro_factura', 'Nro de Factura') !!}
                {!! Form::text('nro_factura', '', ['placeholder' => '012345' ]) !!}
            </div>
            <div class="large-12 columns alto-estandar" style="font-weight: bold !important;">
                {!! Form::label('proveedor', 'Proveedor') !!}
                {!! Form::text('proveedor', '', ['placeholder' => 'TDV, HRC ...' ]) !!}
            </div>
            <div class="large-12 columns alto-estandar" style="font-weight: bold !important;">
                {!! Form::label('fecha_compra', 'Fecha de Compra') !!}
                {!! Form::date('fecha_compra', '', ['placeholder' => 'YYYY-mm-dd' ]) !!}
            </div>
            <div class="large-12 columns" style="font-weight: bold !important;">
                {!! Form::label('comentario', 'Comentario') !!}
                {!! Form::textarea('comentario', '', ['placeholder' => 'Breve comentario acerca del Problema' ] ) !!}
            </div>
            <div class="large-12 columns" style="font-weight: bold !important;">
                <button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Enviar</button>
            </div>
        </div>
	{!! Form::close() !!}
    
@endsection
