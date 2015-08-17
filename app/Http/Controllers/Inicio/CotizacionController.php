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
		$datos = Proyecto::where('id_empresa', $idEmpresa)->where('estado_espera', 1)->lists('nombre_empresa', 'id');

		$var_cot = 0;
		$datos_cot = "";
		
		return view('inicio.cotizacion_hand_1', compact('datos', 'datos_cot', 'var_cot'));
	}

	public function getCoti(Request $request)
	{
		$datos = Proyecto::whereId($request->size)->first();
		return Redirect::route('inte.cotiz.create', ['id_proyecto' => $datos->id, 'concepto' => $datos->nombre_empresa]);
	}

	public function getCotisss(Request $request)
	{
		return $request->all();
	}

	public function create(Request $request)
	{
		$pro_act = proyecto_actual::first();

		if ($pro_act) {

			$aja = true;

			if (($pro_act->id_user == Auth::id()) && ($pro_act->id_proyecto == $request->get('id_proyecto'))) {

			} else {
				proyecto_actual::truncate();
				proyecto_actual::insert(['id_user' => Auth::id(), 'id_proyecto' => $request->get('id_proyecto')]);
				cotizacion_temp::truncate();
			}

		} else {
			proyecto_actual::insert(['id_user' => Auth::id(), 'id_proyecto' => $request->get('id_proyecto')]);
			cotizacion_temp::truncate();
		}

		$id_cot = Cotizacion::orderBy('id', 'desc')->first();

		if (! $id_cot) {
			$cotiz = 1;
		} else {
			$cotiz = $id_cot->id + 1;
		}

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
	}

	public function felix($id1, $id2, Request $request)
	{
		$nro_lentes = Producto::whereId($id1)->first()->cant_lentes;

		$lentes 		= Producto::where('tipo', 2)->lists('nombre', 'id');
		$monturas 		= Producto::where('tipo', 3)->lists('nombre', 'id');
		$fuentes		= Producto::where('tipo', 4)->lists('nombre', 'id');

		$perro = Producto::whereId($id1)->first();

		$felix = $perro->tipo;

		return view("inicio.cotizacion_new", compact('id1', 'id2', 'felix', 'perro', 'lentes', 'monturas', 'fuentes', 'nro_lentes'));
	}

	public function store(Request $request)
	{
		if ( !empty(cotizacion_temp::all()->last()->relacion) ) {
			$relacion = cotizacion_temp::all()->last()->relacion + 1;
		} else {
			$relacion = 1;
		}

		$valor_id = cotizacion_temp::insertGetId(['relacion' => $relacion] + $request->only('id_producto','precio_unitario', 'id_cotizacion', 'cantidad'));

		if ($request->id_lente != 0) {
			$precio = Producto::whereId($request->id_lente)->first()->precio;
			$valor_id = cotizacion_temp::insertGetId(['relacion' => $relacion] + ['id_producto' => $request->id_lente] + ['precio_unitario' => $precio] + $request->only('id_cotizacion', 'cantidad'));
		};

		if ($request->id_lente1 != 0) {
			$precio = Producto::whereId($request->id_lente1)->first()->precio;
			$valor_id = cotizacion_temp::insertGetId(['relacion' => $relacion] + ['id_producto' => $request->id_lente1] + ['precio_unitario' => $precio] + $request->only('id_cotizacion', 'cantidad'));
		};

		if ($request->id_montura != 0) {
			$precio = Producto::whereId($request->id_montura)->first()->precio;
			$valor_id = cotizacion_temp::insertGetId(['relacion' => $relacion] + ['id_producto' => $request->id_montura] + ['precio_unitario' => $precio] + $request->only('id_cotizacion', 'cantidad'));
		};

		if ($request->id_fuente != 0) {
			$precio = Producto::whereId($request->id_fuente)->first()->precio;
			$valor_id = cotizacion_temp::insertGetId(['relacion' => $relacion] + ['id_producto' => $request->id_fuente] + ['precio_unitario' => $precio] + $request->only('id_cotizacion', 'cantidad'));
		};

		$datos_cot = cotizacion_temp::where('id_cotizacion', $request->id_cotizacion)->paginate();
		
		$var_cot = 1;

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

		Session::flash('new_product', 'Se ha agregado satisfactoriamente el producto a su cotización');

		return view("inicio.cotizacion_hand", compact('datos_cot', 'var_cot', 'cotiz', 'felix', 'camaras', 'lentes', 'monturas', 'fuentes', 'camaras1', 'lentes1', 'monturas1', 'fuentes1'));
	}

	public function save_all(Request $request)
	{
		$p_a = proyecto_actual::first();

		$p = Proyecto::whereId($p_a->id_proyecto)->first();

		$id = Cotizacion::insertGetId(['id' => $request->id_cotizacion, 'id_user' => Auth::id(), 'id_proyecto' => $p_a->id_proyecto, 'concepto' => $p->nombre]);

		$j = cotizacion_temp::where('id_cotizacion', $id)->count();

		for ($i=0; $i < $j; $i++) {
			$temp = cotizacion_temp::where('id_cotizacion', $id)->first();
			Cotizacion_Producto::insertGetId(['id_producto' => $temp->id_producto, 'precio_unitario' => $temp->precio_unitario, 'id_cotizacion' => $id, 'cantidad' => $temp->cantidad]);
			$cotiz = Cotizacion::whereId($id)->first();
			$dinero = ($temp->precio_unitario * $temp->cantidad) + $cotiz->monto;
			Cotizacion::whereId($id)->update(['monto' => $dinero]);
			cotizacion_temp::where('id_cotizacion', $id)->first()->delete();
		};
		cotizacion_temp::truncate();
		proyecto_actual::truncate();

		$datos = Cotizacion::where('id_user', Auth::id())->paginate();

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

	public function detalle_cotiDetalle(Request $request)
	{
		$productos = Producto::all();

		$datos = cotizacion_temp::paginate();		

		return view('inicio.cotizacion_detalle_list_uno', compact('datos', 'productos'));
	}

	public function detalle_cotiDetalleModificar($id, Request $request)
	{
		$datos = cotizacion_temp::whereId($id)->first();
		$nro_lentes = Producto::whereId($datos->id_producto)->first()->cant_lentes;
		$perro = Producto::whereId($datos->id_producto)->first();
		$felix = $perro->tipo;

		$id2 = $datos->id_cotizacion;

		$relacion = $datos->relacion;

		$lentes 		= Producto::where('tipo', 2)->lists('nombre', 'id');
		$monturas 		= Producto::where('tipo', 3)->lists('nombre', 'id');
		$fuentes		= Producto::where('tipo', 4)->lists('nombre', 'id');

		if ($felix == 1) {

			$pro_cot = cotizacion_temp::where('relacion', $relacion)->get();

			foreach ($pro_cot as $p) {
				if ( Producto::whereId($p->id_producto)->first()->tipo == 3 ) {
					$montura = Producto::whereId($p->id_producto)->first();
				}

				if ( Producto::whereId($p->id_producto)->first()->tipo == 4 ) {
					$fuente = Producto::whereId($p->id_producto)->first();
				}
			}

			if ($nro_lentes == 1) {
				foreach ($pro_cot as $p) {
					if ( Producto::whereId($p->id_producto)->first()->tipo == 2 ) {
						$lente1 = Producto::whereId($p->id_producto)->first();
					}
				}
				return view("inicio.cotizacion_new_edit", compact('relacion', 'id2', 'felix', 'perro', 'lente1', 'montura', 'fuente', 'lentes', 'monturas', 'fuentes', 'nro_lentes', 'datos'));
			} elseif ($nro_lentes == 2) {
				$lente_piv = 0;

				foreach ($pro_cot as $p) {
					if ($lente_piv == 0) {
						if ( Producto::whereId($p->id_producto)->first()->tipo == 2 ) {
							$lente1 = Producto::whereId($p->id_producto)->first();
							$lente_piv = 1;
						}
					}
				}
				$contar = cotizacion_temp::where('relacion', $relacion)
											->where('id_producto', $lente1->id)->count();
				if ($contar == 2) {
					$pro_cot = cotizacion_temp::where('relacion', $relacion)->orderBy('id', 'desc')->get();
					foreach ($pro_cot as $p) {
						if ($lente_piv == 1) {
							if ( Producto::whereId($p->id_producto)->first()->tipo == 2 ) {
								$lente2 = Producto::whereId($p->id_producto)->first();
								$lente_piv = 2;
							}
						}
					}
				} else {
					foreach ($pro_cot as $p) {
						if ( $p->id_producto != $lente1->id ) {
							if ( Producto::whereId($p->id_producto)->first()->tipo == 2 ) {
								$lente2 = Producto::whereId($p->id_producto)->first();
							}
						}
					}
				}
				return view("inicio.cotizacion_new_edit", compact('relacion', 'id2', 'felix', 'perro', 'lente1', 'lente2', 'montura', 'fuente', 'lentes', 'monturas', 'fuentes', 'nro_lentes', 'datos'));
			}

		} else {
			return view("inicio.cotizacion_new_edit", compact('relacion', 'id2', 'felix', 'perro', 'lentes', 'monturas', 'fuentes', 'nro_lentes', 'datos'));
		}
	}

	public function detalle_cotiDetalleModificarStore(Request $request)
	{
		$relacion = $request->relacion;

		cotizacion_temp::where('relacion', $relacion)->where('id_producto', $request->id_producto)->update($request->only('id_producto','precio_unitario', 'cantidad'));
		
		if ($request->id_lente != 0) {
			$precio = Producto::whereId($request->id_lente)->first()->precio;
			cotizacion_temp::where('relacion', $relacion)->where('id_producto', $request->id_lente_v)->update(['id_producto' => $request->id_lente] + ['precio_unitario' => $precio] + $request->only('cantidad'));
		};

		if ($request->id_lente1 != 0) {
			$precio = Producto::whereId($request->id_lente1)->first()->precio;
			cotizacion_temp::where('relacion', $relacion)->where('id_producto', $request->id_lente1_v)->orderBy('id', 'desc')->first()->update(['id_producto' => $request->id_lente1] + ['precio_unitario' => $precio] + $request->only('cantidad'));
		};

		if ($request->id_montura != 0) {
			$precio = Producto::whereId($request->id_montura)->first()->precio;
			cotizacion_temp::where('relacion', $relacion)->where('id_producto', $request->id_montura_v)->update(['id_producto' => $request->id_montura] + ['precio_unitario' => $precio] + $request->only('cantidad'));
		};

		if ($request->id_fuente != 0) {
			$precio = Producto::whereId($request->id_fuente)->first()->precio;
			cotizacion_temp::where('relacion', $relacion)->where('id_producto', $request->id_fuente_v)->update(['id_producto' => $request->id_fuente] + ['precio_unitario' => $precio] + $request->only('cantidad'));
		};

		$datos_cot = cotizacion_temp::where('id_cotizacion', $request->id_cotizacion)->paginate();
		
		$var_cot = 1;

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

		Session::flash('new_product', 'Se ha editado satisfactoriamente el producto de su cotización');

		$productos = Producto::all();

		$datos = cotizacion_temp::paginate();		

		return view('inicio.cotizacion_detalle_list_uno', compact('datos', 'productos'));
	}

	public function detalle_cotiDetalleUpdate($id, Request $request)
	{
		$datos = cotizacion_temp::FindOrFail($id);
		$datos->fill($request->except('_token', 'id_cotizacion', 'id_producto', 'nombre', 'precio_unitario'));
		$datos->save();
		Session::flash('message', 'El registro fue actualizado');

		$productos = Producto::all();

		$datos = cotizacion_temp::paginate();		

		return view('inicio.cotizacion_detalle_list_uno', compact('datos', 'productos'));
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}
