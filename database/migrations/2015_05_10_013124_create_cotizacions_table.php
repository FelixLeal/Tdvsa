<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cotizacions', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('id_proyecto')->unsigned();
			$table->string('concepto', 50);
			$table->float('monto');
			$table->integer('estado')->default(0);// 0-no pagado,  1-pagado
			
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
		Schema::drop('cotizacions');
	}

}
