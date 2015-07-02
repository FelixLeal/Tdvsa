@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

    <div class="large-12 columns" style="pading: 0px"><h3>Reporte de Pago</h3></div>
    {!! Form::open( ['route' => 'pago', 'id' => 'form_2', 'class' => 'large-12' ] ) !!}
        <div class="large-8 columns" style="padding: 0px;">
            {!! Form::text('id_user', Auth::user()->id, ['style' => 'display: none;']) !!}
            <div class="large-6 columns alto-estandar" style="font-weight: bold !important;">
                {!! Form::label('forma_pago', 'Forma de pago') !!}
                <input type="radio" name="forma_pago" value="Deposito" id="dep"><label class="label-text" for="dep">Deposito</label>
                <input type="radio" name="forma_pago" value="Transferencia" id="transf"><label class="label-text" for="transf">Transferencia</label>
            </div>
            <div class="large-6 columns alto-estandar" style="font-weight: bold !important;">
                {!! Form::label('nro_documento', 'Nro de documento') !!}
                {!! Form::text('nro_documento', '', ['placeholder' => '0101-0202-03-0405060708' ]) !!}
            </div>
            <div class="large-6 columns alto-estandar" style="font-weight: bold !important;">
                {!! Form::label('monto', 'Monto del pago') !!}
                {!! Form::text('monto', '', ['placeholder' => '2000' ]) !!}
            </div>
            <div class="large-6 columns alto-estandar" style="font-weight: bold !important;">
                {!! Form::label('fecha_transaccion', 'Fecha de transacción') !!}
                {!! Form::date('fecha_transaccion', '', ['placeholder' => 'YYYY-mm-dd' ]) !!}
            </div>
            <div class="large-12 columns" style="font-weight: bold !important;">
                <div class="large-12 columns" style="font-weight: bold !important; padding: 0px;">
                    <!--a href="pago" class="button large" id="buttona" >Enviar</a-->
                    <button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Enviar</button>
                </div>
            </div>
        </div>
        <div class="large-4 columns" style="padding: 0px;">
            <div class="large-12 columns" style="font-weight: bold !important;">
                {!! Form::label('comentario', 'Comentario (opcional)') !!}
                {!! Form::textarea('comentario', '', ['placeholder' => 'Breve comentario acerca de la transacción' ] ) !!}
            </div>
        </div>
	{!! Form::close() !!}
    
@endsection
