<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamaraProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('camara__productos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_camara')->unsigned(); // Para que se repita una camara por producto
			$table->integer('id_producto')->unsigned(); // una camara con lestes, monturas, fuentes...
			$table->integer('tipo_producto')->unsigned(); // para saber si es lente, montura o fuente
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
		Schema::drop('camara__productos');
	}

}
