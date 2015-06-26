@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')
	<script type="text/javascript">
					$(document).ready(function(){
					    	$("#side2").removeClass("efecto");
					    		    		        
					    });
		</script>

	{!! Form::open( ['route' => 'inte.cotiz.store', 'id' => 'form_2', 'class' => 'small-12'] ) !!}
		
			<div class="large-12 columns" style="font-weight: bold !important;"><h3>Detalles del Producto</h3></div>
			<div class="large-4 columns" style="font-weight: bold !important;">
				<!--img src="img/m15-slide-300x175.png"-->
				{!! Form::image($perro->imagen, $perro->id, ['width' => '128px', 'height' => '128px']) !!}

				{!! Form::hidden('id_producto', $perro->id) !!}
				{!! Form::hidden('precio_unitario', $perro->precio) !!}

				{!! Form::hidden('id_cotizacion', $id2) !!}
				<!--{!! $id1 !!}-->
			</div>
			<div class="large-8 columns" style="font-weight: bold !important; margin-top: 30px; !important">
				<div class="large-6 columns" style="font-weight: bold !important;">
					<strong>Nombre:</strong>
					<br>{!! $perro->nombre !!}
				</div>
				<div class="large-6 columns" style="font-weight: bold !important;">
					<strong>Modelo:</strong>
					<br>{!! $perro->modelo !!}
				</div>
			</div>
		
		<div class="large-12 columns" style="padding: 0px;">
			@if ($felix == 1)
				@if ($nro_lentes == 2)
					<div class="large-12 columns">
						<strong>Lente 1</strong>
						<div class="large-12 columns" style="padding: 0px; ">
							{!! Form::select('id_lente', ['0' => 'Seleccione...'] + $lentes, 0, ['class' => 'large-3 columns']) !!}
						</div>
						<strong>Lente 2</strong>
						<div class="large-12 columns" style="padding: 0px; ">
							{!! Form::select('id_lente1', ['0' => 'Seleccione...'] + $lentes, 0, ['class' => 'large-3 columns']) !!}
						</div>
					</div>
				@else
					<div class="large-12 columns">
						<strong>Lente</strong>
						<div class="large-12 columns" style="padding: 0px; ">
							{!! Form::select('id_lente', ['0' => 'Seleccione...'] + $lentes, 0, ['class' => 'large-3 columns']) !!}
						</div>
					</div>
				@endif
				<div class="large-12 columns">
					<strong>Montura</strong>
					<div class="large-12 columns" style="padding: 0px;">
						{!! Form::select('id_montura', ['0' => 'Seleccione...'] + $monturas, 0, ['class' => 'large-3 columns']) !!}
					</div>
				</div>
				<div class="large-12 columns">
					<strong>Accesorios</strong>
					<div class="large-12 columns" style="padding: 0px;">
						{!! Form::select('id_fuente', ['0' => 'Seleccione...'] + $fuentes, 0, ['class' => 'large-3 columns']) !!}
					</div>
				</div>
			@endif
			<div class="large-12 columns detalle">
				<div class="large-2 columns">
					<strong>Cantidad</strong>
					{!! Form::number('cantidad') !!}
				</div>
				<div class="large-10 columns" >
					<div class="large-12 columns" ></div>
				</div>
			</div>
			<div class="large-12 columns detalle" >
				<div class="large-3 columns" >
					<!--a href="15.html" class="button large btn_crear" id="buttona" >Cotizar</a-->
					<button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Agregar</button>
				</div>
				<div class="large-9 columns" >
					<div class="large-12 columns" ></div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}
	
@endsection