<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> @yield('titleInicio', 'Mobotix') </title>
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="{{ asset('/css/foundation.css') }}"/>
		<link rel="stylesheet" href="{{ asset('/css/principal.css') }}"/>

		<!-- Scripts -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</head>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#menu_mobile").click(function() {
				$("#cont_mob").toggleClass("mostr");
			});
			$("#mob1").click(function() {
				$("#efectomob").toggleClass("mostr2");
			});
		});
	</script>

	<body id="principal2">
		<div id="modal" class="large-10 columns marco">
			<div class="mod-container">
				<h3> Cotizacion N° </h3>
				<table cellspacing="0">
					<tr class="modal_table">
						<th></th>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th>Total</th>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
				<div class="total_cot" style="float:right; padding: 10px;">Total cotizacion = <strong>1400,00 bsf</strong></div>
				<a id="buttona" onclick="detalle()" class="button large btn_crear btn_modal">Volver a Mis Cotizaciones</a>
			</div>
		</div>

		<div id="mobiFijo" class="small-12 medium-12 columns hide-for-large-up">
			<div class="small-12 medium-12 columns menu_desp hide-for-large-up">
				<a id="menu_mobile"><img src="{{ asset('/img/menu.png') }}"> Menu</a>
			</div>
		</div>

		<div class="small-12 medium-12 columns marco_mob hide-for-large-up" id="panel_izq_mob">
			<div class="small-12 medium-12 columns side_fixed3" id="cont_mob">
				<div id="items_izqmob" class="mob_izq hide-for-large-up" style="padding-top: 0px;">
					<ul class="side-nav hide-for-large-up" style="padding-top: 0px;">

						<li class="" id="mob1">
							<a>
								<h5>Proyectos</h5>
							</a>
							<ul class="side-nav" id="efectomob">
								<li class="" id="2mobile"><a href="{{ url('inte/proyecto') }}"><h5>Mis Proyectos</h5></a></li>
								<li class="" id="3mobile"><a href="{{ url('inte/proyecto/create') }}"><h5>Nuevo proyecto</h5></a></li>
								<li class="" id="4mobile"><a href="{{ url('/cotizacion_list') }}"><h5>Mis cotizaciones</h5></a></li>
								<li class="" id="5mobile"><a href="{{ url('/cotiz_create') }}"><h5>Nueva cotización</h5></a></li>
							</ul>
						</li>

						<li class="" id="6mobile"> <a href="{{ url('/reporte_pago') }}"> <h5>Reporte de pago</h5> </a> </li>
						<li class="" id="7mobile"> <a href="{{ url('/perfil') }}"> <h5>Mi cuenta</h5> </a> </li>
						<li class="" id="8mobile"> <a href="{{ url('/soporte') }}"> <h5>Soporte</h5> </a> </li>
						<li class="" id="9mobile"> <a href="{{ url('/soporte_tecnico') }}"> <h5>Soporte Tecnico</h5> </a> </li>

					</ul>
				</div>
			</div>
		</div>

		<div class="large-2 medium-2 columns marco show-for-large-up" id="panel_izq">
			<div class="large-2 columns side_fixed">
				<div class="logo_space">
					<img src="{{ asset('/img/logo-tdvsa-med.png') }}">
				</div>
				<div id="items_izq" style="padding-top: 0px;">
					<ul class="side-nav" style="padding-top: 0px;">

						<li class="menu_hide hover" id="1">
							<a href="{{ url('inte/proyecto') }}">
								<h5>Proyectos</h5>
							</a>
							<ul class="side-nav efecto" id="side2"> 
								<li class="sub-menus sub_menu" id="2"><a href="{{ url('inte/proyecto') }}"><h5>Mis Proyectos</h5></a></li>
								<li class="sub-menus sub_menu hover" id="3"><a href="{{ url('inte/proyecto/create') }}"><h5>Nuevo proyecto</h5></a></li>
								<li class="sub-menus sub_menu hover" id="4"><a href="{{ url('/cotizacion_list') }}"><h5>Mis cotizaciones</h5></a></li>
								<li class="sub-menus sub_menu hover" id="5"><a href="{{ url('/cotiz_create') }}"><h5>Nueva cotización</h5></a></li>
							</ul>
						</li>
						<li class="sub_menu hover" id="6"> <a href="{{ url('/reporte_pago') }}"> <h5>Reporte de pago</h5> </a> </li>
						<li class="sub_menu hover" id="7"> <a href="{{ url('/perfil') }}"> <h5>Mi cuenta</h5> </a> </li>
						<li class="sub_menu hover" id="8"> <a href="{{ url('/soporte') }}"> <h5>Pagos</h5> </a> </li>
						<li class="sub_menu hover" id="9"> <a href="{{ url('/soporte_tecnico') }}"> <h5>Soporte Tecnico</h5> </a> </li>

					</ul>
				</div>
			</div>
		</div>

		<div class="large-8 columns marco" id="panel_central" style="padding-top: 30px; height: 1000px;">
			<div class="row panel sombra" style="font-weight: bold; background-color: #ffffff;">
			@yield('contentInicio')
			</div>
		</div>

		<div class="small-12 medium-12 columns marco hide-for-large-up" id="panel_der_mob">
			<div class="large-12 medium-12 columns  ver_mi_cuenta">
				<div class="row panel small-12 medium-12 columns top" style="background-color: #E3E3E3;">
					<div class="row">
						<!--EN ESTE DIV SE RENDIZARÁ EL NOMBRE DE LA PERSONA A CONSULTAR, EL CUAL VENDRA DE LA BD-->
						<div class="large-12 medium-12" style="font-weight: bold;"> {{ Auth::user()->name }}</div>
						<div class="large-12 ver_mi medium-12">Ver mi cuenta</div>
						<div class="large-12 medium-12" style="font-size: 14px !important; border-bottom: 1px solid #A4A4A4;">
							<a href="{{ url('/auth/logout') }}">Cerrar sesión</a>
						</div>
						<div class="large-12 top medium-12" style="font-weight: bold;">Mi cotización</div>

						{{-- @if ($var_cot == 1)

							<p>Hay {{ $datos_cot->total() }} registro(s)</p>

							<table cellspacing="0">

								<tr>
									<th>#</th>
									<th>Descripcion</th>
									<th>Cant * Precio</th>
								</tr>
								{{ $i=0 }}
								@foreach ($datos_cot as $dato)
								<tr>
									<td>{{ $i = $i + 1 }}</td>
									<td>{{ $dato->id_producto }}</td>
									<td>{{ $dato->cantidad * $dato->precio_unitario }}</td>							
								</tr>
								@endforeach

							</table>
							{!! $datos_cot->render() !!}

						@endif --}}

					</div>
					<div class="row">
					</div>
				</div>
			</div>
		</div>

		<div class="large-2 medium-2 columns marco show-for-large-up" id="panel_der" >
			<div class="large-2 medium-2 columns side_fixed2 ver_mi_cuenta" >
				<div class="row panel large-12 medium-12 columns top" style="background-color: #E3E3E3;">
					<div class="row">
						<!--EN ESTE DIV SE RENDIZARÁ EL NOMBRE DE LA PERSONA A CONSULTAR, EL CUAL VENDRA DE LA BD-->
						<div class="large-12 medium-12" style="font-weight: bold;"> {{ \DB::table('empresas')->where('id', '=', Auth::id())->first()->nombre_persona }} </div>
						<div class="large-12 ver_mi medium-12">Ver mi cuenta</div>
						<div class="large-12 medium-12" style="font-size: 14px !important; border-bottom: 1px solid #A4A4A4;">
							<a href="{{ url('/auth/logout') }}">Cerrar sesión</a>
						</div>
						<div class="large-12 medium-12" style="font-weight: bold;">Mi cotización</div>

						
						@if ( !empty( DB::table('proyecto_actuals')->where('id_user', '=', Auth::id())->first() ) )
							@if ( !is_null( DB::table('cotizacion_temps')->first() ) )
								<table cellspacing="0">

									<tr class="encabezado">
										<th>Cantidad</th>
									</tr>
									<tr>
										<td>
											Tiene 
											<!--{{ $cant = 0 }}-->
											<!--{{ $d_cots = DB::table('cotizacion_temps')->paginate() }}-->
											@foreach ($d_cots as $dato) 
												<!-- {{ $cant = $cant + $dato->cantidad }} -->
											@endforeach
											{!! $cant !!}
											Productos cotizados!
										</td>
									</tr>

								</table>
							@else
								<table cellspacing="0">

									<tr class="encabezado">
										<th>Cantidad</th>
									</tr>
									<tr>
										<td>
											Tiene 0 Productos cotizados!
										</td>
									</tr>

								</table>

							@endif
							Felix
						@else
							<table cellspacing="0">

								<tr class="encabezado">
									<th>Cantidad</th>
								</tr>
								<tr>
									<td>Aun no inicia una Cotización</td>
								</tr>

							</table>
						@endif
						{{-- @if ($var_cot == 1)
						@if ( !empty($datos) )

							<p>Hay {{ $datos_cot->total() }} registro(s)</p>

							<table cellspacing="0">

								<tr class="encabezado">
									<th>#</th>
									<th>Descripcion</th>
									<th>Cant * Precio</th>
								</tr>
								{{ $i=0 }}
								@foreach ($datos_cot as $dato)
								<tr>
									<td>{{ $i = $i + 1 }}</td>
									<td>{{ $dato->id_producto }}</td>
									<td>{{ $dato->cantidad * $dato->precio_unitario }}</td>							
								</tr>
								@endforeach

							</table>
							{!! $datos_cot->render() !!}

						@endif --}}

						<!--div class="large-12" style="font-size: 14px;">No hay items añadidos por el momento</div-->
					</div>
					<div class="row">
					</div>
				</div>
			</div>
		</div>

		<script src="/js/foundation.min.js"></script>
		<script src="/js/vendor/jquery.js"></script>
		<script src="/js/vendor/fastclick.js"></script>
		<script type="text/javascript" src="/js/proyecto_list.js"></script>
	</body>
</html>