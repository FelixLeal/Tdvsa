<?php namespace Tdvsa\Http\Controllers\Inicio;

use Tdvsa\Http\Requests;
use Tdvsa\Http\Controllers\Controller;

use Tdvsa\Proyecto; //para el modelo
use Tdvsa\Empresa; //para el modelo
use Tdvsa\User; //para el modelo

use Auth; // para buscar el usuario actual.

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class InicioController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('inicio.bienvenido');
	}

	/*public function espera()
	{
		return view('templates.espera_aprobacion');
	}*/

	/* Funciones de Proyecto */

		// ya l coloque en el Proyecto Controller para manejarlo mejor.
		
		/*public function proyecto_list()
		{
			//return view('inicio.proyecto_list');
			//$lista = \DB::table('users')->get(); //Hace lo mas simple, traer toda la informacion de la Tabla.
			/*	$lista = \DB::table('proyectos')
					  ->where()
					  ->select(['name', 'email'])
					  ->get(); //      */
		/*	$uId = Auth::id();
			$user = User::whereId($uId)->first();
			$idEmpresa = $user->id_empresa;
			//$proyecto = Proyecto::where('id_empresa', $idEmpresa)->get();
			$datos = Proyecto::where('id_empresa', $idEmpresa)->paginate();
			//dd($lista); //Esta consulta trae los datos especificados por mi.

			//$datos = Proyecto::paginate(); // para la Pagincion de datos
			//dd($datos);

			return view('inicio.proyecto_list', compact('datos'));
		}*/

		// ya l coloque en el Proyecto Controller para manejarlo mejor.

		/*public function proyecto_hand()
		{
			return view('inicio.proyecto_hand');
		}*/

		public function proyecto_handE(Request $request)
		{
			$uId = Auth::id(); // Obtengo el usuario actual
			$user = User::whereId($uId)->first(); // instancio el usuario actual en una variable
			$idEmpresa = $user->id_empresa; // Busco en el usuario actual, el id de empresa al que pertenece
			$idProyecto = Proyecto::insertGetId($request->except('_token')); // inserto el nuevo proyecto con los datos del formulario y lo instancio en una variable
			$proyecto = Proyecto::whereId($idProyecto)->update(['estado_espera' => 0, 'id_empresa' => $idEmpresa]); // el proyecto instanciado, lo busco y actualizo el estado del proyecto y el id de la empresa al que pertenece
			return view('inicio.bienvenido'); // retorno la vista de bienvenido...
		}
	/* Fin de Proyectos */


	/* Funciones de Cotizacion */
		public function cotizacion_list()
		{
			return view('inicio.cotizacion_list');
		}

		public function cotizacion_hand()
		{
			return view('inicio.cotizacion_hand');
		}
	/* Fin de Cotizacion */

	public function catalogo()
	{
		return view('inicio.catalogo');
	}

	public function reporte_pago()
	{
		return view('inicio.reporte_pago');
	}

	public function perfil()
	{
		return view('inicio.perfil');
	}

	public function soporte()
	{
		return view('inicio.soporte');
	}

}