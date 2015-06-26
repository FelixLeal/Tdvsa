@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	

        <div class="large-12 columns" style="font-weight: bold !important;"><h3>Responsable</h3></div>

        <div class="large-4 columns">
            Nombre y Apellido
            <input type="text" style="margin-top: 10px;">
        </div>

        <div class="large-4 columns">
            Telefono
            <input type="text" style="margin-top: 10px;">
        </div>

        <div class="large-4 columns">
            Correo Electrónico
            <input type="text" style="margin-top: 10px;">
        </div>

        <div class="large-4 columns">
            Empresa
            <input type="text" style="margin-top: 10px;">
        </div>

        <div class="large-4 columns">
            Codigo de afiliación
            <input type="text" style="margin-top: 10px;">
        </div>

        <div class="large-12 columns" style="font-weight: bold !important;"><h3>Empresa</h3></div>
        <div class="large-4 columns">
            Razon Social
            <input type="text" style="margin-top: 10px;">
        </div>

        <div class="large-4 columns">
            RIF
            <input type="text" style="margin-top: 10px;">
        </div>

        <div class="large-4 columns">
        	Correo Electronico
            <input type="text" style="margin-top: 10px;">
        </div>

        <div class="large-4 columns">
            Direccion
            <input type="text" style="margin-top: 10px;">
        </div>

        <div class="large-4 columns">
            Telefono
            <input type="text" style="margin-top: 10px;">
        </div>

        <div class="large-4 columns">
            Registro Mercantil
            <input type="text" style="margin-top: 10px;">
        </div>

    </div>

    <div class="row panel" style="font-weight: bold; background-color: #ffffff;">
    
        <div class="large-12 columns" style="font-weight: bold !important;"><h3>Usuario</h3></div>
        <div class="large-4 columns">
            Nombre de Usuario
            <input type="text" style="margin-top: 10px;">
        </div>

        <div class="large-4 columns">
            Correo Electronico
            <input type="text" style="margin-top: 10px;">
        </div>

        <div class="large-12 columns">
            <div class="large-3 button">Editar Clave</div>
        </div>

   
	
@endsection