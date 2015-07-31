<?php namespace Tdvsa;

use Illuminate\Database\Eloquent\Model;

class SoporteTecnico extends Model {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'soporte_tecnicos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nro_ticket', 'nro_factura', 'proveedor', 'fecha_compra', 'comentario'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

}
