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

	public function __construct()
	{
		//$this->middleware('auth');
	}

	public function index()
	{
		$uId = Auth::id();
		$user = User::whereId($uId)->first();
		$idEmpresa = $user->id_empresa;
		$datos = Proyecto::where('id_empresa', $idEmpresa)->paginate();
		$var_cot = 0;
		$datos_cot = "";
		return view('inicio.proyecto_list', compact('datos', 'datos_cot', 'var_cot'));
	}

	public function create()
	{
		$var_cot = 0;
		$datos_cot = "";
		
		return view('inicio.proyecto_hand', compact('datos_cot', 'var_cot'));
	}

	public function store(Request $request)
	{
		$uId = Auth::id(); // Obtengo el usuario actual
		$user = User::whereId($uId)->first(); // instancio el usuario actual en una variable
		$idEmpresa = $user->id_empresa; // Busco en el usuario actual, el id de empresa al que pertenece
		$idProyecto = Proyecto::insertGetId($request->except('_token')); // inserto el nuevo proyecto con los datos del formulario y lo instancio en una variable
		$proyecto = Proyecto::whereId($idProyecto)->update(['estado_espera' => 0, 'id_empresa' => $idEmpresa]); // el proyecto instanciado, lo busco y actualizo el estado del proyecto y el id de la empresa al que pertenece
		return redirect()->route('inte.proyecto.index');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$datos = Proyecto::FindOrFail($id);
		return view('inicio.proyecto_edit', compact('datos')); // este 'datos' tambien se usa en el Form::model del proyecto edit
	}

	public function update($id, Request $request)
	{
		$datos = Proyecto::FindOrFail($id);
		$datos->fill($request->except('_token'));
		$datos->save();
		Session::flash('message', 'El registro fue actualizado');
		return redirect()->back(); // para ver el formulario con los cambios...
	}

	public function destroy($id)
	{
		return dd('estoy entrando');

		Proyecto::destroy($id);
		dd($datos);

		Session::flash('message', 'El registro fue eliminado');
	}

}
