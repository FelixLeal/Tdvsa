<?php namespace Tdvsa\Http\Controllers\Admin;

use Tdvsa\Http\Requests;
use Tdvsa\Http\Controllers\Controller;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use Carbon\Carbon;


use Tdvsa\proyecto_actual; //para el modelo
use Tdvsa\cotizacion_temp; //para el modelo
use Tdvsa\Cotizacion; //para el modelo
use Tdvsa\Cotizacion_Producto; //para el modelo
use Tdvsa\Producto; //para el modelo
use Tdvsa\Proyecto; //para el modelo
use Tdvsa\Empresa; //para el modelo
use Tdvsa\User; //para el modelo
use Tdvsa\Pago; //para el modelo



use Auth; // para buscar el usuario actual.
use Session;
use Illuminate\Contracts\Auth\Guard;

use Validator;


class AdminUserController extends Controller {

	public function __construct(Request $request)
	{		
		//$this->middleware('auth');
	}

	public function empresasList()
	{
		$datos = Empresa::paginate();
		return view('admin.empresa_list', compact( 'datos'));
	}

	public function empresaDetalle($id)
	{
		$datos = Empresa::FindOrFail($id);
		return view('admin.empresa_detalle', compact('datos')); // este 'datos' tambien se usa en el Form::model del proyecto edit
	}

	public function empresaEdit($id)
	{
		$datos = Empresa::FindOrFail($id);
		return view('admin.empresa_edit', compact('datos')); // este 'datos' tambien se usa en el Form::model del proyecto edit
	}

	public function empresaAfiliar($id)
	{
		$datos = Empresa::FindOrFail($id);
		return view('admin.empresa_afiliar', compact('datos')); // este 'datos' tambien se usa en el Form::model del proyecto edit
	}

	public function empresaAfiliarStore($id, Request $request)
	{
		$uId = Auth::id();
		$user = User::where('id_empresa', $id)->first()->update(['estado_registro' => 3]);
		Empresa::whereId($id)->update(['codigo_afiliacion' => $request->codigo_afiliacion, 'fecha_afiliacion' => Carbon::now(), 'id_tipo_cliente' => $request->id_tipo_cliente]);

		$datos = Empresa::paginate();
		return view('admin.empresa_list', compact( 'datos'));
	}






	public function usuariosList()
	{
		$datos = User::where('type','!=',1)->paginate();
		return view('admin.usuario_list', compact( 'datos'));
	}

	public function usuarioNuevo()
	{
		return view('admin.usuario_nuevo');
	}

	public function usuarioNuevoStore(Request $request)
	{
		$valor =  Validator::make($request->only('name', 'email', 'password'), [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6',
		]);
		if ($valor->fails()){
			$this->throwValidationException(
				$request, $valor
			);
		}
		User::create([
			'name' => $request['name'],
			'email' => $request['email'],
			'password' => bcrypt($request['password']),
			'estado_registro' => 3,
			'type' => 1,
		]);
		Session::flash('message', 'Usuario agregado Satisfactoriamente');
		$datos = User::where('type','!=',1)->paginate();
		return view('admin.usuario_list', compact( 'datos'));
	}

	public function usuarioDetalle($id)
	{
		$datos_usuario = User::whereId($id)->first();
		if ($datos_usuario->estado_registro == 0 || $datos_usuario->estado_registro == 1) {
			Session::flash('message', 'El usuario no ha terminado su Registro');
			$datos = User::where('type','!=',1)->paginate();
			return view('admin.usuario_list', compact( 'datos'));
		} else {
			$datos_empresa = Empresa::where('id', $datos_usuario->id_empresa)->first();	
			return view('admin.usuario_detalle', compact('datos_usuario', 'datos_empresa')); // este 'datos' tambien se usa en el Form::model del proyecto edit
		}	
	}


	public function pagosList()
	{
		// ['id_user', 'forma_pago', 'nro_documento', 'monto', 'fecha_transaccion', 'comentario'];
		$datos = Pago::paginate();
		return view('admin.pago_list', compact('datos'));
	}

	public function pagoDetalle($id)
	{
		$datos = Pago::FindOrFail($id);
		return view('admin.pago_detalle', compact('datos')); // este 'datos' tambien se usa en el Form::model del proyecto edit
	}







	public function proyectosList()
	{
		// ['id_user', 'forma_pago', 'nro_documento', 'monto', 'fecha_transaccion', 'comentario'];
		$datos = Proyecto::paginate();
		return view('admin.proyecto_list', compact( 'datos'));
	}

	public function proyectoDetalle($id)
	{
		$datos = Proyecto::FindOrFail($id);
		return view('admin.proyecto_detalle', compact('datos')); // este 'datos' tambien se usa en el Form::model del proyecto edit
	}

	public function proyectoVerificar($id)
	{
		$datos = Proyecto::FindOrFail($id);
		return view('admin.proyecto_verificar', compact('datos')); // este 'datos' tambien se usa en el Form::model del proyecto edit
	}

	public function proyectoVerificarStore($id, Request $request)
	{
		Proyecto::whereId($id)->update(['estado_espera' => 1]);
		
		$datos = Proyecto::paginate();
		return view('admin.proyecto_list', compact( 'datos'));
	}

	public function proyectoFinalizar($id)
	{
		$dato = Proyecto::whereId($id)->update(['estado_espera' => 3]);
		$datos = Proyecto::paginate();
		return view('admin.proyecto_list', compact( 'datos'));
	}

	public function proyectoCotizaciones($id)
	{
		$datos_proyecto = Proyecto::FindOrFail($id);
		$datos_cotizaciones = Cotizacion::where('id_proyecto', $id)->paginate();
		if (!$datos_cotizaciones) {
			Session::flash('message', 'No hay cotizaciones registradas aun');
			$datos = Proyecto::paginate();
			return view('admin.proyecto_list', compact( 'datos'));
		} else {
			return view('admin.proyecto_cotizaciones_list', compact( 'datos_cotizaciones', 'datos_proyecto'));
		}
	}

	public function proyectoCotizacionDetalle($id)
	{
		$datos = Cotizacion::FindOrFail($id);
		$datos_cotizacion_producto = Cotizacion_Producto::where('id_cotizacion', $id)->paginate();
		$productos = Producto::all();
		return view('admin.proyecto_cotizacion_detalle', compact('datos', 'datos_cotizacion_producto', 'productos'));
	}

	public function proyectoCotizacionPagar($id)
	{
		Cotizacion::whereId($id)->update(['estado' => 1]);
		$dato = Cotizacion::whereId($id)->first();
		$datos_proyecto = Proyecto::FindOrFail($dato->id_proyecto);
		$datos_cotizaciones = Cotizacion::where('id_proyecto', $dato->id_proyecto)->paginate();
		return view('admin.proyecto_cotizaciones_list', compact( 'datos_cotizaciones', 'datos_proyecto'));
	}

	public function proyectoCotizacionFinalizar($id)
	{
		Cotizacion::whereId($id)->update(['estado' => 2]);
		$dato = Cotizacion::whereId($id)->first();
		$datos_proyecto = Proyecto::FindOrFail($dato->id_proyecto);
		$datos_cotizaciones = Cotizacion::where('id_proyecto', $dato->id_proyecto)->paginate();
		return view('admin.proyecto_cotizaciones_list', compact( 'datos_cotizaciones', 'datos_proyecto'));
	}



















	public function usuarioEdit($id)
	{
		$datos = Empresa::FindOrFail($id);
		return view('admin.usuario_edit', compact('datos')); // este 'datos' tambien se usa en el Form::model del proyecto edit
	}

	public function usuarioAfiliar($id)
	{
		$datos = Empresa::FindOrFail($id);
		return view('admin.usuario_afiliar', compact('datos')); // este 'datos' tambien se usa en el Form::model del proyecto edit
	}

	public function usuarioAfiliarStore($id, Request $request)
	{
		$uId = Auth::id();
		$user = User::where('id_empresa', $id)->first()->update(['estado_registro' => 3]);
		Empresa::whereId($id)->update(['codigo_afiliacion' => $request->codigo_afiliacion, 'fecha_afiliacion' => Carbon::now(), 'id_tipo_cliente' => $request->id_tipo_cliente]);

		$datos = Empresa::paginate();
		return view('admin.usuario_list', compact( 'datos'));
	}

}
