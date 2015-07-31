<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoporteTecnicosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('soporte_tecnicos', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('nro_ticket', 30); // Nro del Ticket
			$table->string('nro_factura', 20); // Nro de Factura
			$table->string('proveedor', 20); // Proveedor: TDV, HRC, OTROS
			$table->string('fecha_compra', 11); // Fecha de la Compra
			$table->string('comentario', 250); // Comentario

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
		Schema::drop('soporte_tecnicos');
	}

}
