@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	<style type="text/css">
	    .box{
	        padding: 20px;
	        display: none;
	        margin-top: 20px;
	        border: 1px solid #000;
	    }
	    .red{ background: #ff0000; }
	    .green{ background: #00ff00; }
	    .blue{ background: #0000ff; }

	    .daniel{ background: #00ff00; }


	    .camara {display: none;}
	    .lente {display: none;}
	    .montura {display: none;}
	    .alimentacion {display: none;}

	</style>

	<script type="text/javascript">
	    $(document).ready(function(){
	        $('input[type="radio"]').click(function(){
	            if($(this).attr("value")=="1"){
	            	$valor = 1;
	                $(".camara").show();
	                $(".lente").hide();
	                $(".montura").hide();
	                $(".alimentacion").hide();
	            }
	            if($(this).attr("value")=="2"){
	                $(".camara").hide();
	                $(".lente").show();
	                $(".montura").hide();
	                $(".alimentacion").hide();
	            }
	            if($(this).attr("value")=="3"){
	                $(".camara").hide();
	                $(".lente").hide();
	                $(".montura").show();
	                $(".alimentacion").hide();
	            }
	            if($(this).attr("value")=="4"){
	                $(".camara").hide();
	                $(".lente").hide();
	                $(".montura").hide();
	                $(".alimentacion").show();
	            }
	        });
	    });
	</script>

	<div class="large-8 columns" id="panel_central" style="padding-top: 30px;">
		<div class="row panel" style="font-weight: bold; background-color: #ffffff;">
			<div class="large-12 columns" style="font-weight: bold !important;">
				<h3>Cotizacion</h3>
			</div>
			<!--div class="large-12 columns prueba"-->

            	<div class="large-4 columns" style="font-weight: bold !important;">
            		<h7><strong>Seleccione una categoria: </strong></h7>
            	</div>
            	<div class="large-8 columns" style="font-weight: bold !important;">
					<div> Seleccione una Categoria: <br>
						{!! Form::radio('cat', '1') !!} Camaras 
						{!! Form::radio('cat', '2') !!} Lentes <br>
						{!! Form::radio('cat', '3') !!} Monturas 
						{!! Form::radio('cat', '4') !!} Alimentacion <br>
					</div>
				</div>

				<br>


				<div class="camara">

					<div class="tabs-content">

						<div class="large-12 columns" style="margin-bottom: 50px;"></div>

						@foreach ($camaras1 as $dato)

							<div class="large-3 columns">
								<div class="large-12 columns productos cams" style="width: 100%;">
									<!--img src="img/m15-slide-300x175.png"-->
									{!! Form::image($dato->imagen, $dato->id, ['width' => '128px', 'height' => '128px']) !!}
								</div>
								<!--a class="button large btn_crear" style="font-size: 12px;" href="13.html"-->
								<a class="button large btn_crear" style="font-size: 12px;" href="{{ url('inte/felix', ['id_producto' => $dato->id, 'id_cotizacion' => $cotiz->id]) }}">
									{!! $dato->nombre !!}<br>
								</a>
								{!! $dato->descripcion_basica !!}
							</div>

						@endforeach

					</div>

				</div>



				<div class="lente">

					<div class="tabs-content">

						<div class="large-12 columns" style="margin-bottom: 50px;"></div>

						@foreach ($lentes1 as $dato)

							<div class="large-3 columns">
								<div class="large-12 columns productos cams" style="width: 100%;">
									<!--img src="img/m15-slide-300x175.png"-->
									{!! Form::image($dato->imagen, $dato->id, ['width' => '128px', 'height' => '128px']) !!}
								</div>
								<a class="button large btn_crear" style="font-size: 12px;" href="{{ url('inte/felix', ['id_producto' => $dato->id, 'id_cotizacion' => $cotiz->id]) }}">
									{!! $dato->nombre !!}<br>
								</a>
								{!! $dato->descripcion_basica !!}
							</div>

						@endforeach

					</div>

				</div>



				<div class="montura">

					<div class="tabs-content">

						<div class="large-12 columns" style="margin-bottom: 50px;"></div>

						@foreach ($monturas1 as $dato)

							<div class="large-3 columns">
								<div class="large-12 columns productos cams" style="width: 100%;">
									<!--img src="img/m15-slide-300x175.png"-->
									{!! Form::image($dato->imagen, $dato->id, ['width' => '128px', 'height' => '128px']) !!}
								</div>
								<a class="button large btn_crear" style="font-size: 12px;" href="{{ url('inte/felix', ['id_producto' => $dato->id, 'id_cotizacion' => $cotiz->id]) }}">
									{!! $dato->nombre !!}<br>
								</a>
								{!! $dato->descripcion_basica !!}
							</div>

						@endforeach

					</div>

				</div>



				<div class="alimentacion">

					<div class="tabs-content">

						<div class="large-12 columns" style="margin-bottom: 50px;"></div>

						@foreach ($fuentes1 as $dato)

							<div class="large-3 columns">
								<div class="large-12 columns productos cams" style="width: 100%;">
									<!--img src="img/m15-slide-300x175.png"-->
									{!! Form::image($dato->imagen, $dato->id, ['width' => '128px', 'height' => '128px']) !!}
								</div>
								<a class="button large btn_crear" style="font-size: 12px;" href="{{ url('inte/felix', ['id_producto' => $dato->id, 'id_cotizacion' => $cotiz->id]) }}">
									{!! $dato->nombre !!}<br>
								</a>
								{!! $dato->descripcion_basica !!}
							</div>

						@endforeach

					</div>

				</div>




				{!! Form::open( ['route' => 'inte.cotiz.store', 'id' => 'form_2', 'class' => 'small-10 large-4 columns'] ) !!}

					@if ( $felix == 0)

						<a href="{{ route('inte.cotiz.create', $dato) }}">Cotizar</a>

					@elseif ($felix == 1)

						<a href="{{ route('inte.cotiz.create', $dato) }}">No jombre</a>

					@endif
					

					<!--button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Crear</button-->

				{!! Form::close() !!}

			<!--/div-->

		</div>

	</div>
	
@endsection
