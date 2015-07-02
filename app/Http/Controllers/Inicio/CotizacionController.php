<?php namespace Tdvsa\Http\Controllers\Inicio;

use Tdvsa\Http\Requests;
use Tdvsa\Http\Controllers\Controller;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use Tdvsa\proyecto_actual; //para el modelo
use Tdvsa\cotizacion_temp; //para el modelo
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

	

	public function __construct(Request $request)
	{		
		//$this->middleware('auth');

		$var_coti = 0;

	}

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

			$var_cot = 0;
			$datos_cot = "";
			
			return view('inicio.proyecto_list', compact('datos', 'datos_cot', 'var_cot'));
			
			//return view('inicio.proyecto_list', compact('datos'));
			
		};

		$var_cot = 0;
		$datos_cot = "";
			
		return view('inicio.proyecto_list', compact('datos_cot', 'var_cot'));

		
	}

	public function getCreate()
	{
		$uId = Auth::id();
		$user = User::whereId($uId)->first();
		$idEmpresa = $user->id_empresa;
		$datos = Proyecto::where('id_empresa', $idEmpresa)->where('estado_espera', 1)->lists('nombre', 'id');

		$var_cot = 0;
		$datos_cot = "";
		
		return view('inicio.cotizacion_hand_1', compact('datos', 'datos_cot', 'var_cot'));

		//return view("inicio.cotizacion_hand_1", compact('datos'));
	}

	public function getCoti(Request $request)
	{
		$datos = Proyecto::whereId($request->size)->first();

		//return Redirect::route('profile', ['id_proyecto' => $datos->id, 'concepto' => $datos->nombre]);

		return Redirect::route('inte.cotiz.create', ['id_proyecto' => $datos->id, 'concepto' => $datos->nombre]);
		
	}

	public function getCotisss(Request $request)
	{
		//return "Felix";
		return $request->all();
	}

	public function create(Request $request)
	{
		

		$pro_act = proyecto_actual::first();

		//return $pro_act;
		//return  $request->get('id_proyecto');

		if ($pro_act) {

			$aja = true;

			if (($pro_act->id_user == Auth::id()) && ($pro_act->id_proyecto == $request->get('id_proyecto'))) {

				//return "Son iguales";

			} else {
				proyecto_actual::truncate();
				//$loco = proyecto_actual::insertGetId(['id_user' => Auth::id(), 'id_proyecto' => $request->get('id_proyecto')]);
				proyecto_actual::insert(['id_user' => Auth::id(), 'id_proyecto' => $request->get('id_proyecto')]);
				cotizacion_temp::truncate();
			}



		
			//return "algo";

		} else {
			//return "nada";
			//$loco = proyecto_actual::insertGetId(['id_user' => Auth::id(), 'id_proyecto' => $request->get('id_proyecto')]);
			proyecto_actual::insert(['id_user' => Auth::id(), 'id_proyecto' => $request->get('id_proyecto')]);
			cotizacion_temp::truncate();
			//return $loco;
		}
		//proyecto_actual::all();
		//return $daniel;





		//return $request->all();
		/*
		if (! Cotizacion::where('id_proyecto', $request->get('id_proyecto'))->first())
		{
			//return "Entre";
			$idCotizacion = Cotizacion::insertGetId($request->except('_token'));
			//return "Fino";

			$var_cot = 0;
			$datos_cot = "";
		} else {

			$id_cotis = Cotizacion::where('id_proyecto', $request->get('id_proyecto'))->first();

			$datos_cot = Cotizacion_Producto::where('id_cotizacion', $id_cotis->id)->paginate();
			$var_cot = 1;
			//return "Fallo";
		};*/

		//return cotizacion_temp::orderBy('id', 'desc')->first();
		$id_cot = Cotizacion::orderBy('id', 'desc')->first();

		if (! $id_cot) {
			$cotiz = 1;
		} else {
			$cotiz = $id_cot->id + 1;
		}
		//return $cotiz;

		//$cotiz = Cotizacion::where('id_proyecto', $request->get('id_proyecto'))->first();

		$camaras 		= Producto::where('tipo', 1)->lists('nombre', 'id');
		$lentes 		= Producto::where('tipo', 2)->lists('nombre', 'id');
		$monturas 		= Producto::where('tipo', 3)->lists('nombre', 'id');
		$fuentes		= Producto::where('tipo', 4)->lists('nombre', 'id');

		$camaras1 		= Producto::where('tipo', 1)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();
		$lentes1		= Producto::where('tipo', 2)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();
		$monturas1 		= Producto::where('tipo', 3)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();
		$fuentes1		= Producto::where('tipo', 4)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();


		$felix = 0;

		if (cotizacion_temp::first()) {
			$felix = 1;
		}


		return view("inicio.cotizacion_hand", compact('datos_cot', 'var_cot', 'cotiz', 'felix', 'camaras', 'lentes', 'monturas', 'fuentes', 'camaras1', 'lentes1', 'monturas1', 'fuentes1'));

		//return view('inicio.cotizacion_hand'); //, compact('comboBox', 'tipo'));

	}

	public function felix($id1, $id2, Request $request)
	{
		//return $request->all();
		//return $id2;
		//return "Calidadddd o queee";

		//return Producto::whereId($id1)->first()->cant_lentes;

		$nro_lentes = Producto::whereId($id1)->first()->cant_lentes;

		$lentes 		= Producto::where('tipo', 2)->lists('nombre', 'id');
		$monturas 		= Producto::where('tipo', 3)->lists('nombre', 'id');
		$fuentes		= Producto::where('tipo', 4)->lists('nombre', 'id');

	

		//$perro = Producto::where('id', $id)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();

		$perro = Producto::whereId($id1)->first();

		//$felix = 1;

		$felix = $perro->tipo;

		//$felix = 0;

		return view("inicio.cotizacion_new", compact('id1', 'id2', 'felix', 'perro', 'lentes', 'monturas', 'fuentes', 'nro_lentes'));

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

		//return $request->only('id_lente', 'id_montura', '_token');
		//return $request->all();
		//return $request->id_lente;

		/*"id_producto":"5"
		"precio_unitario":"100.00"
		"id_cotizacion":"1"
		"id_lente":"7"
		"id_montura":"0"
		"id_fuente":"0"
		"cantidad":"3"*/

		//return $request->only('id_producto','precio_unitario', 'id_cotizacion', 'cantidad');

		$valor_id = cotizacion_temp::insertGetId($request->only('id_producto','precio_unitario', 'id_cotizacion', 'cantidad'));

		if ($request->id_lente != 0) {
			$precio = Producto::whereId($request->id_lente)->first()->precio;
			//return ['id_producto' => $request->id_lente] + ['precio_unitario' => $precio] + $request->only('id_cotizacion', 'cantidad');
			//$valor_id = Cotizacion_Producto::insertGetId(['id_producto' => $request->id_lente] + ['precio_unitario' => $precio] + $request->only('id_cotizacion', 'cantidad'));
			$valor_id = cotizacion_temp::insertGetId(['id_producto' => $request->id_lente] + ['precio_unitario' => $precio] + $request->only('id_cotizacion', 'cantidad'));
			//return "hay un lente";
		};

		if ($request->id_lente1 != 0) {
			$precio = Producto::whereId($request->id_lente1)->first()->precio;
			//return ['id_producto' => $request->id_lente1] + ['precio_unitario' => $precio] + $request->only('id_cotizacion', 'cantidad');
			$valor_id = cotizacion_temp::insertGetId(['id_producto' => $request->id_lente1] + ['precio_unitario' => $precio] + $request->only('id_cotizacion', 'cantidad'));
			//return "hay dos lentes";
		};

		if ($request->id_montura != 0) {
			$precio = Producto::whereId($request->id_montura)->first()->precio;
			//return ['id_producto' => $request->id_montura] + ['precio_unitario' => $precio] + $request->only('id_cotizacion', 'cantidad');
			$valor_id = cotizacion_temp::insertGetId(['id_producto' => $request->id_montura] + ['precio_unitario' => $precio] + $request->only('id_cotizacion', 'cantidad'));
			//return "hay una montura";
		};

		if ($request->id_fuente != 0) {
			$precio = Producto::whereId($request->id_fuente)->first()->precio;
			//return ['id_producto' => $request->id_fuente] + ['precio_unitario' => $precio] + $request->only('id_cotizacion', 'cantidad');
			$valor_id = cotizacion_temp::insertGetId(['id_producto' => $request->id_fuente] + ['precio_unitario' => $precio] + $request->only('id_cotizacion', 'cantidad'));
			//return "hay una fuente";
		};

		//sreturn "que paso";

		//Cotizacion_Producto::insertGetId($request->only('id_producto','precio_unitario', 'id_cotizacion', 'cantidad'));

		//$cotizacion_producto = Cotizacion_Producto::where('id_cotizacion', $request->id_cotizacion)->get();

		$datos_cot = cotizacion_temp::where('id_cotizacion', $request->id_cotizacion)->paginate();

		//return $cotizacion_producto;

		//$datos = Proyecto::where('id_empresa', $idEmpresa)->paginate();
		
		$var_cot = 1;
		//return view('inicio.bienvenido', compact('datos_cot', 'var_cot'));





		//nuevo 12/06/2015

		$cotiz = $request->get('id_cotizacion');

		$camaras 		= Producto::where('tipo', 1)->lists('nombre', 'id');
		$lentes 		= Producto::where('tipo', 2)->lists('nombre', 'id');
		$monturas 		= Producto::where('tipo', 3)->lists('nombre', 'id');
		$fuentes		= Producto::where('tipo', 4)->lists('nombre', 'id');

		$camaras1 		= Producto::where('tipo', 1)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();
		$lentes1		= Producto::where('tipo', 2)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();
		$monturas1 		= Producto::where('tipo', 3)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();
		$fuentes1		= Producto::where('tipo', 4)->select('id', 'nombre', 'descripcion_basica', 'imagen')->get();


		$felix = 0;

		if (cotizacion_temp::first()) {
			$felix = 1;
		}


		return view("inicio.cotizacion_hand", compact('datos_cot', 'var_cot', 'cotiz', 'felix', 'camaras', 'lentes', 'monturas', 'fuentes', 'camaras1', 'lentes1', 'monturas1', 'fuentes1'));















		//No se, tengo que revisar, pero probare otra cosa.
		/*$cot_pro = Cotizacion_Producto::insertGetId($request->except('_token'));


		$cot_prod = Cotizacion_Producto::whereId($cot_pro)->first();


		$cotiz = Cotizacion::whereId($request->get('id_cotizacion'))->first();

		$dinero = ((int)$request->precio_unitario * (int)$request->cantidad) + $cotiz->monto;
		//return (int)$request->cantidad;

		
		$proyecto = Cotizacion::whereId($cotiz->id)->update(['monto' => $dinero]); // el proyecto instanciado, lo busco y actualizo el estado del proyecto y el id de la empresa al que pertenece
		
		//return $cot_prod->id_cotizacion;

		$otro = Cotizacion::whereId($cot_prod->id_cotizacion)->first();*/

		


		//return redirect()->route('inte.cotiz.create', ['id_proyecto' => $otro->id_proyecto]);
		//return view('inicio.bienvenido'); // retorno la vista de bienvenido...
	}

	public function save_all(Request $request)
	{
		//return $request->id_cotizacion;

		$p_a = proyecto_actual::first();

		$p = Proyecto::whereId($p_a->id_proyecto)->first();


		$id = Cotizacion::insertGetId(['id' => $request->id_cotizacion, 'id_user' => Auth::id(), 'id_proyecto' => $p_a->id_proyecto, 'concepto' => $p->nombre]);

		$j = cotizacion_temp::where('id_cotizacion', $id)->count();

		//return $j;


		for ($i=0; $i < $j; $i++) {
			$temp = cotizacion_temp::where('id_cotizacion', $id)->first();

			//return $temp;

			Cotizacion_Producto::insertGetId(['id_producto' => $temp->id_producto, 'precio_unitario' => $temp->precio_unitario, 'id_cotizacion' => $id, 'cantidad' => $temp->cantidad]);
			$cotiz = Cotizacion::whereId($id)->first();
			$dinero = ($temp->precio_unitario * $temp->cantidad) + $cotiz->monto;
			Cotizacion::whereId($id)->update(['monto' => $dinero]);
			cotizacion_temp::where('id_cotizacion', $id)->first()->delete();
		};
		cotizacion_temp::truncate();
		proyecto_actual::truncate();
		//return "Guarde todo";


		$datos = Cotizacion::where('id_user', Auth::id())->paginate();

		//return $datos_c;

		$var_cot = 0;
		$datos_cot = "";
			
		return view('inicio.cotizacion_list', compact('datos_cot', 'var_cot', 'datos'));
	}

	public function detalle_coti(Request $request)
	{
		$coti_padre = Cotizacion::whereId($request->id_cotizacion)->first();

		$datos = Cotizacion_Producto::where('id_cotizacion', $request->id_cotizacion)->paginate();

		$productos = Producto::all();

		return view('inicio.cotizacion_detalle_list', compact('datos', 'coti_padre', 'productos'));
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
