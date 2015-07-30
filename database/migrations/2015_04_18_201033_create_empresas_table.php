<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas', function(Blueprint $table)
		{
			//Datos de la Empresa
			$table->increments('id');
			$table->string('rif', 15);
			$table->string('razon_social', 50);
			$table->string('registro_mercantil', 50);
			$table->string('email_empresa', 50);
			$table->string('telf_empresa', 15);
			$table->string('direccion', 200);
			$table->string('codigo_postal', 5);
			//Datos de la afiliacion
			$table->string('codigo_afiliacion', 60)->default('0');
			$table->date('fecha_afiliacion');
			$table->integer('id_tipo_cliente'); //Relacionado con tabla Tipo clientes que contiene un descuento.
			//Datos Personales
			$table->string('nombre_persona', 50);
			$table->string('telf_persona', 15);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empresas');
	}

}
