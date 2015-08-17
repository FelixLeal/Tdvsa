@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')
	<script type="text/javascript">
		$(document).ready(function(){
			$("#side2").removeClass("efecto");
			$("#5").addClass("oscuro");
		});
	</script>

	{!! Form::open( ['route' => 'detalle_coti.detalle.modificar.store', 'id' => 'form_2', 'class' => 'small-12'] ) !!}
		<div class="large-12 columns" style="font-weight: bold !important;"><h3>{!! $perro->nombre !!} {!! $perro->modelo !!}</h3></div>
		<div class="large-4 columns" style="font-weight: bold !important;">
			<!--img src="img/m15-slide-300x175.png"-->
			{!! Form::image($perro->imagen, $perro->id, ['readonly']) !!}

			{!! Form::hidden('id_producto', $perro->id) !!}
			{!! Form::hidden('precio_unitario', $perro->precio) !!}

			{!! Form::hidden('id_cotizacion', $id2) !!}
			{!! Form::hidden('relacion', $relacion) !!}

			<!-- {{--{!! $id1 !!} --}} -->
		</div>
		<div class="large-8 columns" style="font-weight: bold !important; margin-top: 30px; !important">
		</div>
		<div class="large-12 columns prod" style="padding: 0px;">
			@if ($felix == 1)
				{!! Form::hidden('id_lente_v', $lente1->id) !!}
				@if ($nro_lentes == 2)
					<div class="large-12 columns">
						<label>Lente 1</label>
						<div class="large-12 columns" style="padding: 0px; ">
							{!! Form::select('id_lente', ['0' => 'Seleccione...'] + $lentes, $lente1->id, ['class' => 'large-6 columns']) !!}
						</div>
						<label>Lente 2</label>
						<div class="large-12 columns" style="padding: 0px; ">
							{!! Form::hidden('id_lente1_v', $lente2->id) !!}
							{!! Form::select('id_lente1', ['0' => 'Seleccione...'] + $lentes, $lente2->id, ['class' => 'large-6 columns']) !!}
						</div>
					</div>
				@else
					<div class="large-12 columns">
						<label>Lente</label>
						<div class="large-12 columns" style="padding: 0px; ">
							{!! Form::select('id_lente', ['0' => 'Seleccione...'] + $lentes, $lente1->id, ['class' => 'large-6 columns']) !!}
						</div>
					</div>
				@endif
				<div class="large-12 columns">
					<label>Montura</label>
					<div class="large-12 columns" style="padding: 0px;">
						{!! Form::hidden('id_montura_v', $montura->id) !!}
						{!! Form::select('id_montura', ['0' => 'Seleccione...'] + $monturas, $montura->id, ['class' => 'large-6 columns']) !!}
					</div>
				</div>
				<div class="large-12 columns">
					<label>Accesorios</label>
					<div class="large-12 columns" style="padding: 0px;">
						{!! Form::hidden('id_fuente_v', $fuente->id) !!}
						{!! Form::select('id_fuente', ['0' => 'Seleccione...'] + $fuentes, $fuente->id, ['class' => 'large-6 columns']) !!}
					</div>
				</div>
			@endif
			<div class="large-12 columns detalle">
				<div class="large-3 columns">
					<label>Cantidad</label>
					{!! Form::number('cantidad', $datos->cantidad) !!}
				</div>
				<div class="large-10 columns" >
					<div class="large-12 columns" ></div>
				</div>
			</div>
			<div class="large-12 columns detalle" >
				<button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Agregar a la cotización</button>
				<div class="large-9 columns" >
					<div class="large-12 columns" ></div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}
	
@endsection