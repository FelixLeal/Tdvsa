<?php namespace Tdvsa;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'empresas';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['rif', 'razon_social', 'registro_mercantil', 'email_empresa', 'telf_empresa',
						   'direccion', 'codigo_postal', 'codigo_afiliacion', 'fecha_afiliacion', 'id_tipo_cliente',
						   'nombre_persona', 'telf_persona'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['codigo_afiliacion', 'fecha_afiliacion', 'id_tipo_cliente'];

}
