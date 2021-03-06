@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	<style type="text/css">
	    #camara {display: none;}
	    #lente {display: none;}
	    #montura {display: none;}
	    #alimentacion {display: none;}
	</style>

	<script type="text/javascript">
	    $(document).ready(function(){
	        $('input[type="radio"]').click(function(){
	            if($(this).attr("value")=="1"){
	            	$valor = 1;
	                $("#camara").show();
	                $("#lente").hide();
	                $("#montura").hide();
	                $("#alimentacion").hide();  
	                document.getElementById("rad1").className = "selecc";
	                document.getElementById("rad2").className = "";
	                document.getElementById("rad3").className = "";
	                document.getElementById("rad4").className = "";
	            }
	            if($(this).attr("value")=="2"){
	                $("#camara").hide();
	                $("#lente").show();
	                $("#montura").hide();
	                $("#alimentacion").hide();
	                document.getElementById("rad2").className = "selecc";
	                document.getElementById("rad1").className = "";
	                document.getElementById("rad3").className = "";
	                document.getElementById("rad4").className = ""; 
	            }
	            if($(this).attr("value")=="3"){
	                $("#camara").hide();
	                $("#lente").hide();
	                $("#montura").show();
	                $("#alimentacion").hide();
	                document.getElementById("rad3").className = "selecc";
	                document.getElementById("rad1").className = "";
	                document.getElementById("rad2").className = "";
	                document.getElementById("rad4").className = "";
	            }
	            if($(this).attr("value")=="4"){
	                $("#camara").hide();
	                $("#lente").hide();
	                $("#montura").hide();
	                $("#alimentacion").show();
	                document.getElementById("rad4").className = "selecc";
	                document.getElementById("rad2").className = "";
	                document.getElementById("rad3").className = "";
	                document.getElementById("rad1").className = "";
	            }
	        });
	    });
	</script>

	<div class="large-12 columns" style="font-weight: bold !important;">
		<h3>Catalogo</h3>
	</div>
	<div class="large-12 columns" style="font-weight: bold !important; padding:15px;">
		<h7><strong>Seleccione una categoria: </strong></h7>
	</div>
	<div class="large-12 columns" style="font-weight: bold !important; margin-bottom: 20px;">
		<div class="large-3 columns radios in_radio" style="font-weight: bold !important;">
			<label id="rad1">
				<div class="large-2 columns in_radio">{!! Form::radio('cat', '1', true,['id' => 'rad1']) !!}</div>
				Camaras
			</label>
			<!--{!! Form::label('rad1', 'Cámaras') !!}
			{!! Form::radio('cat1', '1', true,['id' => 'rad1']) !!}-->
		</div>
		<div class="large-3 columns radios in_radio" style="font-weight: bold !important;">
			<label id="rad2">
				<div class="large-2 columns in_radio ">{!! Form::radio('cat', '2') !!} </div>
				Lentes 
			</label>
		</div>
		<div class="large-3 columns radios in_radio" style="font-weight: bold !important;">
			<label id="rad3">
				<div class="large-2 columns in_radio">{!! Form::radio('cat', '3') !!} </div>
			Monturas
			</label>
		</div> 
		<div class="large-3 columns radios in_radio" style="font-weight: bold !important;">
			<label id="rad4">
				<div class="large-2 columns in_radio">{!! Form::radio('cat', '4') !!} </div>
				Alimentacion
			</label>
		</div>
	</div>
	<br>
	<div id="camara">
		<div class="tabs-content">
			<div class="large-12 columns" style="margin-bottom: 50px;"></div>
			@foreach ($camaras1 as $dato)
				<div class="large-3 columns">
					<div class="large-12 columns productos cams" style="width: 100%;">
						{!! Form::image($dato->imagen, $dato->id, ['width' => '128px', 'height' => '128px']) !!}
					</div>
					<a class="button large btn_crear" style="font-size: 12px;" href="">
						{!! $dato->nombre !!}<br>
					</a>
					{{--{!! $dato->descripcion_basica !!}--}}
				</div>
			@endforeach
		</div>
	</div>
	<div id="lente">
		<div class="tabs-content">
			<div class="large-12 columns" style="margin-bottom: 50px;"></div>
			@foreach ($lentes1 as $dato)
				<div class="large-3 columns">
					<div class="large-12 columns productos cams" style="width: 100%;">
						{!! Form::image($dato->imagen, $dato->id, ['width' => '128px', 'height' => '128px']) !!}
					</div>
					<a class="button large large-12 columns" style="font-size: 12px;" href="">
							{!! $dato->nombre !!}<br>
					</a>
					{{--{!! $dato->descripcion_basica !!}--}}
				</div>
			@endforeach
		</div>
	</div>
	<div id="montura">
		<div class="tabs-content">
			<div class="large-12 columns" style="margin-bottom: 50px;"></div>
			@foreach ($monturas1 as $dato)
				<div class="large-3 columns">
					<div class="large-12 columns productos cams" style="width: 100%;">
						{!! Form::image($dato->imagen, $dato->id, ['width' => '128px', 'height' => '128px']) !!}
					</div>
					<a class="button large large-12 columns" style="font-size: 12px;" href="">
							{!! $dato->nombre !!}<br>
					</a>
					{{--{!! $dato->descripcion_basica !!}--}}
				</div>
			@endforeach
		</div>
	</div>
	<div id="alimentacion">
		<div class="tabs-content">
			<div class="large-12 columns" style="margin-bottom: 50px;"></div>
			@foreach ($fuentes1 as $dato)
				<div class="large-3 columns">
					<div class="large-12 columns productos cams" style="width: 100%;">
						{!! Form::image($dato->imagen, $dato->id, ['width' => '128px', 'height' => '128px']) !!}
					</div>
					<a class="button large large-12 columns" style="font-size: 12px;" href="">
							{!! $dato->nombre !!}<br>
					</a>
					{{--{!! $dato->descripcion_basica !!}--}}
				</div>
			@endforeach
		</div>
	</div>
	
@endsection
