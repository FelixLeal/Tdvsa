<?php namespace Tdvsa\Http\Controllers\Inicio;

use Tdvsa\Http\Requests;
use Tdvsa\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Tdvsa\Cotizacion; //para el modelo
use Tdvsa\Cotizacion_Producto; //para el modelo
use Tdvsa\Producto; //para el modelo
use Tdvsa\Proyecto; //para el modelo
use Tdvsa\Empresa; //para el modelo
use Tdvsa\User; //para el modelo
use Auth; // para buscar el usuario actual.
use Session;
use Illuminate\Contracts\Auth\Guard;


class CotizacionController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Request $request)
	{		
		//$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return view('inicio.proyecto_list');
		//$lista = \DB::table('users')->get(); //Hace lo mas simple, traer toda la informacion de la Tabla.
		/*$lista = \DB::table('proyectos')
				  ->where()
				  ->select(['name', 'email'])
				  ->get(); //*/
		$uId = Auth::id();
		$user = User::whereId($uId)->first();
		$idEmpresa = $user->id_empresa;
		$datos = Proyecto::where('id_empresa', $idEmpresa);

		$valor = $datos->estado_espera;

		if ($valor == 1) {

			$datos = Proyecto::where('id_empresa', $idEmpresa)->paginate();
			
			return view('inicio.proyecto_list', compact('datos'));
			
		};

		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		//return $request->all();
		//return $request->all();
		

		//return $request->get('id_proyecto');


		
		$datos = Cotizacion::where('id_proyecto', $request->get('id_proyecto'))->count();
		//$nose = Cotizacion::where('id_proyecto', $request->get('id_proyecto'))->first();
		if ($datos == 0)
		{
			$idCotizacion = Cotizacion::insertGetId($request->except('_token'));
			//$nuevos = Cotizacion::whereId($idCotizacion)->paginate();
			//return "sapo";
		} else {
			//$vari = $request->id_proyecto;

			//$nose = Cotizacion::last();

			//$nuevos = Cotizacion::whereId($nose->id)->paginate();

			/*$cot_prod = Cotizacion_Producto::where('id_cotizacion' => )->first();

			if ($valor == 1) {
				$cotiz = Cotizacion::where('id_proyecto', $request->get('id_proyecto'))->first();

				$datos = Proyecto::where('id_empresa', $idEmpresa)->paginate();
				
				return view('inicio.proyecto_list', compact('datos'));
				
			};*/

		}/* else {
			return $cotiz = Cotizacion::where('id_proyecto', $request->get('id_proyecto'))->get('id');
			$cotizacion = Cotizacion::whereId($idProyecto)->update(['estado_espera' => 0, 'id_empresa' => $idEmpresa]);
		}*/

		$cotiz = Cotizacion::where('id_proyecto', $request->get('id_proyecto'))->first();

		
		//$proyecto = Cotizacion::whereId($idProyecto)->update(['estado_espera' => 0, 'id_empresa' => $idEmpresa]); // el proyecto instanciado, lo busco y actualizo el estado del proyecto y el id de la empresa al que pertenece
		//return view('inicio.bienvenido'); // retorno la vista de bienvenido...
		//return redirect()->route('inte.proyecto.index');

		

		//$sapo = '';
		//$tipoProd = Producto::all();
		//$productos = Producto::all();

		//$comboBox = $productos->lists('nombre','id');
		//$tipos = $productos->lists('nombre','id');

		//$tipo = $productos->lists('tipo');

		//$tipos = Tipo::all()->lists('nombre', 'id');
		//$combobox = array(0 => "Seleccione ... ") + $tipos;
		//$selected = array();


		//$todo = Producto::all()->lists('id', 'nombre');

		//dd( [ 'id' =>($id = Producto::all()->select('id')->get()) ]   );

		//$daniel = \DB::table('productos')->lists('id');
		//$daniel1 = \DB::table('productos')->select('nombre')->get();



		$camaras 		= Producto::where('tipo', 1)->lists('nombre', 'id');
		$lentes 		= Producto::where('tipo', 2)->lists('nombre', 'id');
		$monturas 		= Producto::where('tipo', 3)->lists('nombre', 'id');
		$fuentes		= Producto::where('tipo', 4)->lists('nombre', 'id');


		//dd($lentes);




		$camaras1 		= Producto::where('tipo', 1)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();
		$lentes1		= Producto::where('tipo', 2)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();
		$monturas1 		= Producto::where('tipo', 3)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();
		$fuentes1		= Producto::where('tipo', 4)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();

		//dd($camaras1);
		$felix = 0;

		return view("inicio.cotizacion_hand", compact('cotiz', 'felix', 'camaras', 'lentes', 'monturas', 'fuentes', 'camaras1', 'lentes1', 'monturas1', 'fuentes1'));

		//return view('inicio.cotizacion_hand'); //, compact('comboBox', 'tipo'));

	}

	public function felix($id1, $id2, Request $request)
	{
		//return $id2;
		//return "Calidadddd o queee";


		

		//$perro = Producto::where('id', $id)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();

		$perro = Producto::whereId($id1)->first();

		$felix = 1;

		$felix = $perro->tipo;

		return view("inicio.cotizacion_new", compact('id1', 'id2', 'felix', 'perro'));
	}


	/*public function nuevo($id, Request $request)
	{
		//return $id;
		//return "Calidadddd o queee";

		$nuevo =  Proyecto::whereId($id)->first();
		//return $nuevo;
		

		$camaras 		= Producto::where('tipo', 1)->lists('nombre', 'id');
		$lentes 		= Producto::where('tipo', 2)->lists('nombre', 'id');
		$monturas 		= Producto::where('tipo', 3)->lists('nombre', 'id');
		$fuentes		= Producto::where('tipo', 4)->lists('nombre', 'id');


		//dd($lentes);




		$camaras1 		= Producto::where('tipo', 1)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();
		$lentes1		= Producto::where('tipo', 2)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();
		$monturas1 		= Producto::where('tipo', 3)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();
		$fuentes1		= Producto::where('tipo', 4)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();

		//dd($camaras1);
		$felix = 0;

		return view("inicio.cotizacion_hand", compact('felix', 'camaras', 'lentes', 'monturas', 'fuentes', 'camaras1', 'lentes1', 'monturas1', 'fuentes1'));

	}*/



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		$cot_pro = Cotizacion_Producto::insertGetId($request->except('_token'));


		$cot_prod = Cotizacion_Producto::whereId($cot_pro)->first();


		$cotiz = Cotizacion::whereId($request->get('id_cotizacion'))->first();

		$dinero = ((int)$request->precio_unitario * (int)$request->cantidad) + $cotiz->monto;
		//return (int)$request->cantidad;

		
		$proyecto = Cotizacion::whereId($cotiz->id)->update(['monto' => $dinero]); // el proyecto instanciado, lo busco y actualizo el estado del proyecto y el id de la empresa al que pertenece
		
		//return $cot_prod->id_cotizacion;

		$otro = Cotizacion::whereId($cot_prod->id_cotizacion)->first();

		return redirect()->route('inte.cotiz.create', ['id_proyecto' => $otro->id_proyecto]);
		//return view('inicio.bienvenido'); // retorno la vista de bienvenido...
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
