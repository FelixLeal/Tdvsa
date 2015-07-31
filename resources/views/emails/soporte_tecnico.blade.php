<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
	</head>

	<body>

		<div class="large-12 columns" style="pading: 0px"><h3>Soporte Tecnico</h3></div>
		<div class="large-12 columns prod report" style="padding: 0px;">
			<div class="large-12 columns alto-estandar" style="font-weight: bold !important;">
	            {!! Form::label('nro_ticket', 'Nro de Ticket') !!}
	            {!! Form::text('nro_ticket', $nro_ticket) !!}
	        </div>
	        <div class="large-12 columns alto-estandar" style="font-weight: bold !important;">
	            {!! Form::label('nro_factura', 'Nro de Factura') !!}
	            {!! Form::text('nro_factura', $nro_factura) !!}
	        </div>
	        <div class="large-12 columns alto-estandar" style="font-weight: bold !important;">
	            {!! Form::label('proveedor', 'Proveedor') !!}
	            {!! Form::text('proveedor', $proveedor) !!}
	        </div>
	        <div class="large-12 columns alto-estandar" style="font-weight: bold !important;">
	            {!! Form::label('fecha_compra', 'Fecha de Compra') !!}
	            {!! Form::text('fecha_compra', $fecha_compra) !!}
	        </div>
	        <div class="large-12 columns" style="font-weight: bold !important;">
	            {!! Form::label('comentario', 'Comentario') !!}
	            {!! Form::textarea('comentario', $comentario) !!}
	        </div>
	    </div>

	</body>
</html>