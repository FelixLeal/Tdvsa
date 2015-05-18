<?php namespace Tdvsa;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'productos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['tipo', 'nombre', 'modelo', 'descripcion_basica', 'descripcion_tecnica',
						   'imagen', 'cant_lentes', 'precio'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

}
