<?php namespace Tdvsa\Http\Controllers\Inicio;

use Tdvsa\Http\Requests;
use Tdvsa\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Tdvsa\Soporte; //para el modelo


class UserController extends Controller {

	public function getLogin()
	{
		return "Felix...";
	}

	public function postLogin()
	{
		return "Daniel...";
	}

	public function getFelix()
	{
		return "Felix...";
	}

	public function postFelix()
	{
		return "Daniel...";
	}

	public function getSoporte()
	{
		$var_cot = 0;
		$datos_cot = "";
		$datos = Soporte::paginate();
		return view('inicio.soporte', compact('datos'));
	}

}
