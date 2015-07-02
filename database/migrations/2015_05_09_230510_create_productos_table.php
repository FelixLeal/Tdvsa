<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tipo')->unsigned(); // 1-Camara, 2-Lente, 3-Montura, 4-Fuente de Alimentacion
			$table->string('nombre', 50); // Nombre del producto
			$table->string('modelo', 20); // MD5, AK47 etc
			$table->string('descripcion_basica', 250); // Algo que describa al producto en pocas palabras
			$table->string('descripcion_tecnica', 1000); // Descripcion detallada de las especificaciones del producto
			$table->string('imagen', 200); // Nombre de la Imagen
			$table->integer('cant_lentes'); // Nro de lentes que posee, si el producto es diferente de camaras se coloca en cero
			$table->float('precio');
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
		Schema::drop('productos');
	}

}
