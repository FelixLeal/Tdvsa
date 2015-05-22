<?php namespace Tdvsa\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

//use Illuminate\Http\Request;
//use Illuminate\Contracts\Auth\Registrar;

use Tdvsa\User; //para el modelo
use Auth; // para buscar el usuario actual.


use Tdvsa\Http\Requests;



class Authenticate {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->guest('auth/login');
			}
		}

		$uId = Auth::id();
		$usuario = User::whereId($uId)->first();
		$estado_reg = $usuario->estado_registro;
		if ($estado_reg == 0) {

			return redirect('auth/register2');

		} elseif ($estado_reg == 1) {

			return redirect('auth/register3');

		} elseif ($estado_reg == 2) {

			//return 'En espera de Afiliacion';
			return view('templates.espera_aprobacion');

		} else {

			return $next($request);
			
		}

	}

}
