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

//Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

Route::get('/', 'Inicio\InicioController@index');
Route::get('proyecto_list', 'Inicio\InicioController@proyecto_list');
Route::get('proyecto_hand', 'Inicio\InicioController@proyecto_hand');
Route::get('cotizacion_list', 'Inicio\InicioController@cotizacion_list');
Route::get('cotizacion_hand', 'Inicio\InicioController@cotizacion_hand');
Route::get('reporte_pago', ['as' => 'reporte_pago', 'uses' => 'Inicio\InicioController@reporte_pago']);
Route::get('perfil', 'Inicio\InicioController@perfil');
Route::post('perfil/update', ['as' => 'perfil.update', 'uses' =>'Inicio\InicioController@perfilUpdate']);
Route::get('soporte', 'Inicio\InicioController@soporte');
Route::post('save_pago', array('as' => 'pago', 'uses' => 'Inicio\InicioController@save_pago'));
Route::post('proyecto_hand', 'Inicio\InicioController@proyecto_handE');
Route::get('soporte_tecnico/list', ['as' => 'soporte_tecnico.list', 'uses' => 'Inicio\InicioController@soporteTecnicoList']);
Route::get('soporte_tecnico/detalle/{one?}', ['as' => 'soporte_tecnico.detalle', 'uses' => 'Inicio\InicioController@soporteTecnicoDetalle']);
Route::get('soporte_tecnico', ['as' => 'soporte_tecnico', 'uses' => 'Inicio\InicioController@soporteTecnico']);
Route::post('soporte_tecnico/{soporte_tecnico}', ['as' => 'soporte_tecnico.store', 'uses' => 'Inicio\InicioController@soporteTecnicoStore']);
Route::get('cotiz_create', 'Inicio\CotizacionController@getCreate');
Route::get('nuevo_coti', 'Inicio\CotizacionController@getCoti');
Route::get('Cotisss_nuevo', 'Inicio\CotizacionController@getCotisss');
Route::get('Cotisss_nuevo', array('as' => 'profile', 'uses' => 'Inicio\CotizacionController@getCotisss'));

Route::get('/example', function()
{
  // Run controller and method
  $app = app();
  $controller = $app->make('ExampleController');
  return $controller->callAction('index', $parameters = array());

});

Route::group(['prefix' => 'inte', 'namespace' => 'Inicio'], function(){
	Route::resource('proyecto', 'ProyectoController');
	Route::resource('cotiz', 'CotizacionController');
	Route::get('felix/{one?}/{dos?}', 'CotizacionController@felix');
	Route::get('nuevo/{one?}', 'CotizacionController@nuevo');
	Route::get('save_all', ['as' => 'save_all', 'uses' => 'CotizacionController@save_all']);
	Route::get('detalle_coti', ['as' => 'detalle_coti', 'uses' => 'CotizacionController@detalle_coti']);
	Route::get('detalle_coti/detalle', ['as' => 'detalle_coti.detalle', 'uses' => 'CotizacionController@detalle_cotiDetalle']);
	Route::get('detalle_coti/detalle/{one?}', ['as' => 'detalle_coti.detalle.modificar', 'uses' => 'CotizacionController@detalle_cotiDetalleModificar']);
	Route::post('detalle_coti/detalle/modificar/{cotizacion}', ['as' => 'detalle_coti.detalle.modificar.store', 'uses' => 'CotizacionController@detalle_cotiDetalleModificarStore']);
	Route::post('detalle_coti/detalle/{cotizacion}', ['as' => 'detalle_coti.detalle.modificar.update', 'uses' => 'CotizacionController@detalle_cotiDetalleUpdate']);
	Route::get('pagos/{one?}', ['as' => 'pagos.inicio', 'uses' => 'InicioController@pagosList']);
	Route::get('pagos/create', ['as' => 'pagos.inicio.create', 'uses' => 'InicioController@pagosCreate']);
	Route::get('pago/detalle/{one?}', ['as' => 'pago.inicio.detalle', 'uses' => 'InicioController@pagoDetalle']);
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
	Route::get('empresas', ['as' => 'empresas', 'uses' => 'AdminUserController@empresasList']);
	Route::get('empresa/editar/{one?}', ['as' => 'empresas.edit', 'uses' => 'AdminUserController@empresaEdit']);
	Route::get('empresa/detalle/{one?}', ['as' => 'empresas.detalle', 'uses' => 'AdminUserController@empresaDetalle']);
	Route::get('empresa/afiliar/{one?}', ['as' => 'empresas.afiliar', 'uses' => 'AdminUserController@empresaAfiliar']);
	Route::post('empresa/afiliar/{empresa}', ['as' => 'empresas.afiliar.store', 'uses' => 'AdminUserController@empresaAfiliarStore']);
	Route::get('usuarios', ['as' => 'usuarios', 'uses' => 'AdminUserController@usuariosList']);
	Route::get('usuario/detalle/{one?}', ['as' => 'usuarios.detalle', 'uses' => 'AdminUserController@usuarioDetalle']);
	Route::get('usuario/nuevo', ['as' => 'usuarios.nuevo', 'uses' => 'AdminUserController@usuarioNuevo']);
	Route::post('usuario/nuevo/{user}', ['as' => 'usuarios.nuevo.store', 'uses' => 'AdminUserController@usuarioNuevoStore']);
	Route::get('pagos', ['as' => 'pagos', 'uses' => 'AdminUserController@pagosList']);
	Route::get('pago/detalle/{one?}', ['as' => 'pago.detalle', 'uses' => 'AdminUserController@pagoDetalle']);
	Route::get('proyectos', ['as' => 'proyectos', 'uses' => 'AdminUserController@proyectosList']);
	Route::get('proyecto/detalle/{one?}', ['as' => 'proyecto.detalle', 'uses' => 'AdminUserController@proyectoDetalle']);
	Route::get('proyecto/verificar/{one?}', ['as' => 'proyecto.verificar', 'uses' => 'AdminUserController@proyectoVerificar']);
	Route::post('proyecto/verificar/{proyecto}', ['as' => 'proyecto.verificar.store', 'uses' => 'AdminUserController@proyectoVerificarStore']);
	Route::get('proyecto/finalizar/{one?}', ['as' => 'proyecto.finalizar', 'uses' => 'AdminUserController@proyectoFinalizar']);
	Route::get('proyecto/cotizaciones/{one?}', ['as' => 'proyecto.cotizaciones', 'uses' => 'AdminUserController@proyectoCotizaciones']);
	Route::get('proyecto/cotizacion/detalle/{one?}', ['as' => 'proyecto.cotizacion.detalle', 'uses' => 'AdminUserController@proyectoCotizacionDetalle']);
	Route::get('proyecto/cotizacion/pagar/{one?}', ['as' => 'proyecto.cotizacion.pagar', 'uses' => 'AdminUserController@proyectoCotizacionPagar']);
	Route::get('proyecto/cotizacion/finalizar/{one?}', ['as' => 'proyecto.cotizacion.finalizar', 'uses' => 'AdminUserController@proyectoCotizacionFinalizar']);
});

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



