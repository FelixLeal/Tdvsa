<?php namespace Tdvsa;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cotizacions';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id_user', 'id_proyecto', 'concepto', 'monto', 'estado'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

}
