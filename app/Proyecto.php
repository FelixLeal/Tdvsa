<?php namespace Tdvsa;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'proyectos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre', 'descripcion', 'direccion', 'nro_control', 'fecha_inicio', 'fecha_duracion', 'nombre_empresa',
						   'estado_espera', 'id_empresa'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id_empresa'];

}
