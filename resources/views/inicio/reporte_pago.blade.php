@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

    <div class="row panel" style="font-weight: bold; background-color: #ffffff;">
        <div class="large-12 columns" style="pading: 0px"><h3>Reporte de Pago</h3></div>
        <div class="large-8 columns" style="padding: 0px;">
            <div class="large-6 columns" style="font-weight: bold !important;">
                <strong>Nombre del cliente</strong>
                <input type="text">
            </div>
            <div class="large-6 columns" style="font-weight: bold !important;">
                <strong>Email</strong>
                <input type="text">
            </div>
            <div class="large-6 columns" style="font-weight: bold !important;">
                <strong>Forma de pago</strong><br>
                <input type="radio" name="deposito" value="Deposito" id="dep"><label for="dep">Deposito</label>
                <input type="radio" name="deposito" value="Transferencia" id="transf"><label for="transf">Transferencia</label>
            </div>
            <div class="large-6 columns" style="font-weight: bold !important;">
                <strong>Nro de documento</strong>
                <input type="text">
            </div>
            <div class="large-6 columns" style="font-weight: bold !important;">
                <strong>Monto del pago</strong>
                <input type="text">
            </div>
            <div class="large-6 columns" style="font-weight: bold !important;">
                <strong>Banco destino</strong>
                <div class="large-12 columns" style="padding: 0px;">
                    <select>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="large-6 columns" style="font-weight: bold !important;">
                <strong>Banco de Origen</strong>
                <div class="large-12 columns" style="padding: 0px;">
                    <select>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="large-6 columns" style="font-weight: bold !important;">
                <strong>Cuenta de Origen(10 digitos)</strong>
                <input type="text">
            </div>
            <div class="large-6 columns" style="font-weight: bold !important;">
                <strong>Fecha de transaccion</strong>
                <input type="text">
            </div>
            <div class="large-6 columns" style="font-weight: bold !important;">
                <div class="large-12 columns" style="font-weight: bold !important; padding: 0px;">
                    <a href="#" class="button large btn_crear" id="buttona" >Enviar</a>
                </div>
            </div>
        </div>
        <div class="large-4 columns" style="padding: 0px;">
            <div class="large-12 columns" style="font-weight: bold !important;">
                <strong>Comentario (opcional)</strong>
                <textarea style="height: 200px;" placeholder="Escribir mensaje"></textarea>
            </div>
        </div>
    </div>
	
@endsection