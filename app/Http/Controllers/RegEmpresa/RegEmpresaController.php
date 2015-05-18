<?php namespace Tdvsa\Http\Controllers\RegEmpresa;

use Tdvsa\Http\Requests;
use Tdvsa\Http\Controllers\Controller;

use Tdvsa\Empresa; //para el modelo
use Tdvsa\User; //para el modelo

use Auth; // para buscar el usuario actual.

use Illuminate\Http\Request; // Esta es con el parametro: Request $request

use Input;
use Validator;
use Redirect;
use Session;

class RegEmpresaController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registrar Empresa Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	//protected $request

	public function __construct()//Request $request)
	{
		//$this->middleware('auth');
		//$this->request = $request;
	}

	public function registro2()
	{
		return view('templates.reg_empresa');
	}

	public function guardar2(Request $request)
	{
		$idEmpresa = Empresa::insertGetId($request->except('_token'));
		$uId = Auth::id();
		User::whereId($uId)->update(['estado_registro' => 1, 'id_empresa' => $idEmpresa]);
		//$usuario = User::whereId($uId)->first();
		//return $usuario->estado_registro;

		return redirect('auth/register3');
	}

	public function registro3()
	{
		return view('templates.reg_empresa2');
	}

	public function guardar3(Request $request)
	{
		// getting all of the post data
		$file = array('registro_mercantil' => Input::file('registro_mercantil'));
		// setting up rules
		$rules = array('registro_mercantil' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
		// doing the validation, passing post data, rules and the messages
		$validator = Validator::make($file, $rules);
		if ($validator->fails()) {
			// send back to the page with the input data and errors
			return Redirect::to('/auth/register3')->withInput()->withErrors($validator);
		} else {
			// checking file is valid.
			if (Input::file('registro_mercantil')->isValid()) {
				$destinationPath = 'uploads'; // upload path
				$extension = Input::file('registro_mercantil')->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).'.'.$extension; // renameing image
				Input::file('registro_mercantil')->move($destinationPath, $fileName); // uploading file to given path
				// sending back with message
				//Session::flash('success', 'Upload successfully');
				
				$uId = Auth::id();
				$user = User::whereId($uId)->first();
				$idEmpresa = $user->id_empresa;
				Empresa::whereId($idEmpresa)->update($request->except(['_token', 'registro_mercantil']));
				Empresa::whereId($idEmpresa)->update(['registro_mercantil' => $fileName]);
				User::whereId($uId)->update(['estado_registro' => 2]);

				return view('templates.reg_success'); //Mensaje de registro satisfactorio...
			} else {
				// sending back with error message.
				//Session::flash('error', 'uploaded file is not valid');
				//return Redirect::to('/auth/register3');
				return redirect('auth/register3');
			}
		}
	}
}