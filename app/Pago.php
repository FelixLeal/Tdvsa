<?php namespace Tdvsa;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pagos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id_user', 'forma_pago', 'nro_documento', 'monto', 'fecha_transaccion', 'comentario'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

}
