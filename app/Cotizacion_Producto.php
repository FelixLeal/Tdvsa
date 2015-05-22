<?php namespace Tdvsa;

use Illuminate\Database\Eloquent\Model;

class Cotizacion_Producto extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cotizacion__productos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id_cotizacion', 'id_producto', 'cantidad', 'precio_unitario'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];


}
