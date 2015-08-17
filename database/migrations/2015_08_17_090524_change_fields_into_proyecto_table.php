<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldsIntoProyectoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('proyectos', function(Blueprint $table)
		{
			$table->dropColumn(['requerimientos', 'nombre']);
			$table->string('descripcion', 500)->change();
			$table->string('direccion', 200);
			$table->date('fecha_inicio');
			$table->date('fecha_duracion');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
