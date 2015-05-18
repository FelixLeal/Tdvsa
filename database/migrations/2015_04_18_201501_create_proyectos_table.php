<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proyectos', function(Blueprint $table)
		{
			//Datos del Proyecto
			$table->increments('id');
			$table->string('nombre', 15);
			$table->string('descripcion', 200);
			$table->string('nro_control', 11);
			$table->string('nombre_empresa', 15);
			$table->string('requerimientos', 300);
			$table->integer('estado_espera')->default(0);

			// Relacion con la Empresa
			$table->integer('id_empresa')->unsigned(); //Relacion con el unico usuario.

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
		Schema::drop('proyectos');
	}

}
