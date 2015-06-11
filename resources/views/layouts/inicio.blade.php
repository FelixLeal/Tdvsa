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

	<body id="principal">
	
		<div class="large-2 columns marco" id="panel_izq">
			<div class="large-2 columns side_fixed">
				<div style="background-color: #3B4C54; padding-top: 15px; padding-bottom: 15px;">
					<!--img src="img/logo-tdvsa-med.png"-->
					<img src="{{ asset('/img/logo-tdvsa-med.png') }}">
				</div>
				<div id="items_izq" style="padding-top: 0px;">
						<ul class="side-nav" style="padding-top: 0px;">

							<li><h5>Proyectos</h5>
								<ul class="side-nav"> 
									<!--li class="sub-menus sub_menu"><a href="{{ url('/proyecto_list') }}"><h5>Mis Proyectos</h5></a></li-->
									<li class="sub-menus sub_menu"><a href="{{ url('inte/proyecto') }}"><h5>Mis Proyectos</h5></a></li>
									<!--li class="sub-menus sub_menu"><a href="{{ url('/proyecto_hand') }}"><h5>Nuevo proyecto</h5></a></li-->
									<li class="sub-menus sub_menu"><a href="{{ url('inte/proyecto/create') }}"><h5>Nuevo proyecto</h5></a></li>
									<li class="sub-menus sub_menu"><a href="{{ url('/cotizacion_list') }}"><h5>Mis cotizaciones</h5></a></li>
									<li class="sub-menus sub_menu"><a href="{{ url('inte/cotiz/create') }}"><h5>Nueva cotizacion</h5></a></li>
								</ul>
							</li>

							<li> <a href="{{ url('/catalogo') }}"> <h5>Catálogo</h5> </a> </li>
							<li> <a href="{{ url('/reporte_pago') }}"> <h5>Reporte de pago</h5> </a> </li>
							<li> <a href="{{ url('/perfil') }}"> <h5>Mi cuenta</h5> </a> </li>
							<li> <a href="{{ url('/soporte') }}"> <h5>Soporte</h5> </a> </li>

						</ul>
					</div>
				</div>
			</div>
		

			<div class="large-8 columns marco" id="panel_central" style="padding: 30px; height: 1000px;">
			@yield('contentInicio')
			</div>
		
			<div class="large-2 columns marco" id="panel_der" >
				<div class="large-2 columns side_fixed2" style="padding-top: 30px; background-color:#F0F0F0; padding-right: 2.5%;">
				<div class="row panel large-12 columns" style="background-color: #E3E3E3;">
					<div class="row">
						<!--EN ESTE DIV SE RENDIZARÁ EL NOMBRE DE LA PERSONA A CONSULTAREL CUAL VENDRA DE LA BD-->
						<!--    -->
						<div class="large-12" style="font-weight: bold;"></div>
						<div class="large-12" style="font-size: 14px;">Ver mi cuenta</div>
						<div class="large-12" style="font-size: 14px !important; border-bottom: 1px solid black;">
							<a href="{{ url('/auth/logout') }}">Cerrar sesion</a>
						</div>
						<br>
						<div class="large-12" style="font-weight: bold;">Mi presupuesto</div>
						<!--div class="large-12" style="font-size: 14px;">No hay items añadidos por el momento</div-->
						
					</div>
					<div class="row">
					</div>
				</div>
				</div>
			</div>
		

	</body>
</html>



    

    