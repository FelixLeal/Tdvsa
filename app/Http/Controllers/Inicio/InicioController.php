<?php namespace Tdvsa\Http\Controllers\Inicio;

use Tdvsa\Http\Requests;
use Tdvsa\Http\Controllers\Controller;

use Validator;

use Tdvsa\Cotizacion; //para el modelo
use Tdvsa\Producto; //para el modelo
use Tdvsa\Proyecto; //para el modelo
use Tdvsa\Empresa; //para el modelo
use Tdvsa\User; //para el modelo
use Tdvsa\Pago; //para el modelo
use Tdvsa\SoporteTecnico; //para el modelo



use Carbon\Carbon;

use Auth; // para buscar el usuario actual.

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class InicioController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		if (Auth::user()->type == 1) {
			$name_user = Auth::user()->name;
			return view('admin.bienvenido', compact('name_user'));
		} else {
			$var_cot = 0;
			$datos_cot = "";
			$name_person = Empresa::whereId(Auth::user()->id_empresa)->first()->nombre_persona;
			return view('inicio.bienvenido', compact('datos_cot', 'var_cot', 'name_person'));
		};
	}

	public function proyecto_handE(Request $request)
	{
		$uId = Auth::id(); // Obtengo el usuario actual
		$user = User::whereId($uId)->first(); // instancio el usuario actual en una variable
		$idEmpresa = $user->id_empresa; // Busco en el usuario actual, el id de empresa al que pertenece
		$idProyecto = Proyecto::insertGetId($request->except('_token')); // inserto el nuevo proyecto con los datos del formulario y lo instancio en una variable
		$proyecto = Proyecto::whereId($idProyecto)->update(['estado_espera' => 0, 'id_empresa' => $idEmpresa]); // el proyecto instanciado, lo busco y actualizo el estado del proyecto y el id de la empresa al que pertenece
		return view('inicio.bienvenido'); // retorno la vista de bienvenido...
	}

	public function cotizacion_list()
	{
		$datos = Cotizacion::where('id_user', Auth::id())->paginate();
		$var_cot = 0;
		$datos_cot = "";
		return view('inicio.cotizacion_list', compact('datos_cot', 'var_cot', 'datos'));
	}

	public function cotizacion_hand()
	{
		return view('inicio.cotizacion_hand');
	}

	public function reporte_pago()
	{
		$var_cot = 0;
		$datos_cot = "";
		
		return view('inicio.reporte_pago', compact('datos_cot', 'var_cot'));
	}

	public function perfil()
	{
		$var_cot = 0;
		$datos_cot = "";

		$uId = Auth::id();
		$user = User::whereId($uId)->first();

		$empresa = Empresa::whereId($user->id_empresa)->first();
		
		return view('inicio.perfil', compact('datos_cot', 'var_cot', 'user', 'empresa'));
	}

	public function perfilUpdate(Request $request)
	{
		$id = Auth::id();
		$id_e = Auth::user()->id_empresa;
		User::whereId($id)->update(['name' => $request->name, 'email' => $request->email]);
		Empresa::whereId($id_e)->update($request->only('telf_persona', 'email_empresa', 'direccion', 'telf_empresa'));

		$user = User::whereId($id)->first();
		$empresa = Empresa::whereId($id_e)->first();
		return view('inicio.perfil', compact('user', 'empresa'));
	}

	public function soporte()
	{
		$var_cot = 0;
		$datos_cot = "";
		
		return view('inicio.soporte', compact('datos_cot', 'var_cot'));
	}

	public function save_pago(Request $request)
	{
		$validator = Validator::make($request->only('nro_documento','monto','fecha_transaccion')
		,[
			'nro_documento' => 'required|numeric|min:5',
			'monto' => 'required|numeric',
			'fecha_transaccion' => 'required'
		]);

		if ($validator->fails()) {
			return view('inicio.reporte_pago')->withErrors($validator);
		}
		
		$IdPago = Pago::insertGetId( $request->except('_token') );
		return view('inicio.pago_exitoso');
	}

	public function pagosList($id)
	{
		$datos = Pago::where('id_user', $id)->paginate();
		return view('inicio.pago_list', compact('datos'));
	}

	public function pagosCreate()
	{
		return view('inicio.reporte_pago');
	}

	public function pagoDetalle($id)
	{
		$datos = Pago::FindOrFail($id);
		return view('inicio.pago_detalle', compact('datos')); // este 'datos' tambien se usa en el Form::model del proyecto edit
	}

	public function soporteTecnicoList()
	{
		$datos = SoporteTecnico::paginate();
		return view('inicio.soporte_tecnico_list', compact( 'datos'));
	}

	public function soporteTecnicoDetalle($id)
	{
		$datos = SoporteTecnico::whereId($id)->first();
		return view('inicio.soporte_tecnico_detalle', compact( 'datos'));
	}

	public function soporteTecnico()
	{
		return view('inicio.soporte_tecnico');
	}

	public function soporteTecnicoStore(Request $request)
	{
		$date = Carbon::now();
 		$fecha = $date->format('dmy');
		$string = str_random(4);
		$id = Auth::id();

		$nro_ticket = "TS-$fecha-$string-$id";

		$st_id = SoporteTecnico::insertGetId([
			'nro_ticket' => $nro_ticket,
			'nro_factura' => $request['nro_factura'],
			'proveedor' => $request['proveedor'],
			'fecha_compra' => $request['fecha_compra'],
			'comentario' => $request['comentario'],
		]);

		$data = ['nro_ticket' => $nro_ticket, 'nro_factura' => $request['nro_factura'], 'proveedor' => $request['proveedor'], 'fecha_compra' => $request['fecha_compra'], 'comentario' => $request['comentario']];
		
		\Mail::send('emails.soporte_tecnico', $data, function($message){
			$message->to('felix@softwarecriollo.com', 'Tdvsa')->subject('Se a registrado un nuevo caso de Soporte Tecnico');
			//'soporte@tdvsa.com'
		});

		return view('inicio.ticket_exitoso');
	}

}