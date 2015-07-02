<?php namespace Tdvsa\Http\Controllers\Inicio;

use Tdvsa\Http\Requests;
use Tdvsa\Http\Controllers\Controller;

use Illuminate\Http\Request;


use Tdvsa\Proyecto; //para el modelo
use Tdvsa\Empresa; //para el modelo
use Tdvsa\User; //para el modelo
use Auth; // para buscar el usuario actual.
use Session;
use Illuminate\Contracts\Auth\Guard;


class ProyectoController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
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
		//$proyecto = Proyecto::where('id_empresa', $idEmpresa)->get();
		$datos = Proyecto::where('id_empresa', $idEmpresa)->paginate();
		//dd($lista); //Esta consulta trae los datos especificados por mi.

		//$datos = Proyecto::paginate(); // para la Pagincion de datos
		//dd($datos);

		$var_cot = 0;
		$datos_cot = "";

		//return view('inicio.proyecto_list', compact('datos'));
		return view('inicio.proyecto_list', compact('datos', 'datos_cot', 'var_cot'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$var_cot = 0;
		$datos_cot = "";
		
		return view('inicio.proyecto_hand', compact('datos_cot', 'var_cot'));
		//return view('inicio.proyecto_hand');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$uId = Auth::id(); // Obtengo el usuario actual
		$user = User::whereId($uId)->first(); // instancio el usuario actual en una variable
		$idEmpresa = $user->id_empresa; // Busco en el usuario actual, el id de empresa al que pertenece
		$idProyecto = Proyecto::insertGetId($request->except('_token')); // inserto el nuevo proyecto con los datos del formulario y lo instancio en una variable
		$proyecto = Proyecto::whereId($idProyecto)->update(['estado_espera' => 0, 'id_empresa' => $idEmpresa]); // el proyecto instanciado, lo busco y actualizo el estado del proyecto y el id de la empresa al que pertenece
		//return view('inicio.bienvenido'); // retorno la vista de bienvenido...
		return redirect()->route('inte.proyecto.index');
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

		$datos = Proyecto::FindOrFail($id);
		return view('inicio.proyecto_edit', compact('datos')); // este 'datos' tambien se usa en el Form::model del proyecto edit

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{

		$datos = Proyecto::FindOrFail($id);
		$datos->fill($request->except('_token'));
		$datos->save();
		//return redirect()->route('inte.proyecto.index');

		Session::flash('message', 'El registro fue actualizado');

		return redirect()->back(); // para ver el formulario con los cambios...

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		return dd('estoy entrando');

		Proyecto::destroy($id);
		// o
		//$datos = Proyecto::find($id);
		//$datos->delete();

		dd($datos);




		Session::flash('message', 'El registro fue eliminado');

	}

}
