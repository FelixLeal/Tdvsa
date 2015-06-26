<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionTempsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cotizacion_temps', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('id_cotizacion')->unsigned();
			$table->integer('id_producto')->unsigned();
			$table->integer('cantidad');
			$table->float('precio_unitario');

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
		Schema::drop('cotizacion_temps');
	}

}
