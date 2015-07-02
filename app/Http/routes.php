<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');


// Aqui van los controladors de inicio

	//Route::get('espera', 'Inicio\InicioController@espera');
	Route::get('inicio', 'Inicio\InicioController@index');

	Route::get('proyecto_list', 'Inicio\InicioController@proyecto_list');
	Route::get('proyecto_hand', 'Inicio\InicioController@proyecto_hand');
	Route::get('cotizacion_list', 'Inicio\InicioController@cotizacion_list');
	Route::get('cotizacion_hand', 'Inicio\InicioController@cotizacion_hand');
	Route::get('catalogo', 'Inicio\InicioController@catalogo');
	Route::get('reporte_pago', 'Inicio\InicioController@reporte_pago');
	Route::get('perfil', 'Inicio\InicioController@perfil');
	Route::get('soporte', 'Inicio\InicioController@soporte');
	Route::get('cotiz_create', 'Inicio\CotizacionController@getCreate');



	Route::get('/example', function()
	{
	  // Run controller and method
	  $app = app();
	  $controller = $app->make('ExampleController');
	  return $controller->callAction('index', $parameters = array());

	});

	Route::get('nuevo_coti', 'Inicio\CotizacionController@getCoti');

	Route::get('Cotisss_nuevo', 'Inicio\CotizacionController@getCotisss');

	Route::get('Cotisss_nuevo', array('as' => 'profile', 'uses' => 'Inicio\CotizacionController@getCotisss'));

	Route::post('save_pago', array('as' => 'pago', 'uses' => 'Inicio\InicioController@save_pago'));




	Route::post('proyecto_hand', 'Inicio\InicioController@proyecto_handE');

	Route::group(['prefix' => 'inte', 'namespace' => 'Inicio'], function(){

		Route::resource('proyecto', 'ProyectoController');
		Route::resource('cotiz', 'CotizacionController');

		Route::get('felix/{one?}/{dos?}', 'CotizacionController@felix');
		Route::get('nuevo/{one?}', 'CotizacionController@nuevo');

		Route::get('save_all', ['as' => 'save_all', 'uses' => 'CotizacionController@save_all']);

		Route::get('detalle_coti', ['as' => 'detalle_coti', 'uses' => 'CotizacionController@detalle_coti']);


	});

	

//fin Inicio


Route::get('auth/register2', 'RegEmpresa\RegEmpresaController@registro2');

Route::get('auth/register3', 'RegEmpresa\RegEmpresaController@registro3');

Route::post('auth/guardar2', 'RegEmpresa\RegEmpresaController@guardar2');

Route::post('auth/guardar3', 'RegEmpresa\RegEmpresaController@guardar3');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('soporte', 'Inicio\UserController@getSoporte');

Route::get('download', function() {
	return Response::download(Input::get('path'));
});



