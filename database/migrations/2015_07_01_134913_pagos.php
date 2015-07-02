<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pagos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_user')->unsigned();
			$table->string('forma_pago', 20);
			$table->string('nro_documento', 22);
			$table->float('monto');
			$table->date('fecha_transaccion');
			$table->string('comentario', 100);
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
		Schema::drop('pagos');
	}

}
