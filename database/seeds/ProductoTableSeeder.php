<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Tdvsa\Producto;

class ProductoTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('productos')->delete();

		Producto::create([

			'tipo' => 1, // 1-Camara, 2-Lente, 3-Montura, 4-Fuente de Alimentacion
			'nombre' => 'Camara 1', // Nombre del producto
			'modelo' => 'MD', // MD5, AK47 etc
			'descripcion_basica' => 'Es una buena camara', // Algo que describa al producto en pocas palabras
			'descripcion_tecnica' => 'Es grande y tiene mucho poder', // Descripcion detallada de las especificaciones del producto
			'imagen' => '/img/M15-Side-281x300.png', // Nombre de la Imagen
			'cant_lentes' => 2 // Nro

		]);

		Producto::create([

			'tipo' => 2, // 1-Camara, 2-Lente, 3-Montura, 4-Fuente de Alimentacion
			'nombre' => 'Lente 1', // Nombre del producto
			'modelo' => 'LTE', // MD5, AK47 etc
			'descripcion_basica' => 'Es una buen lente', // Algo que describa al producto en pocas palabras
			'descripcion_tecnica' => 'Es exacto', // Descripcion detallada de las especificaciones del producto
			'imagen' => '/img/M15-Side-281x300.png', // Nombre de la Imagen
			'cant_lentes' => 0 // Nro

		]);

		Producto::create([

			'tipo' => 2, // 1-Camara, 2-Lente, 3-Montura, 4-Fuente de Alimentacion
			'nombre' => 'Lente 2', // Nombre del producto
			'modelo' => 'LTE2', // MD5, AK47 etc
			'descripcion_basica' => 'Es una buen lente2', // Algo que describa al producto en pocas palabras
			'descripcion_tecnica' => 'Es exacto2', // Descripcion detallada de las especificaciones del producto
			'imagen' => '/img/M15-Side-281x300.png', // Nombre de la Imagen
			'cant_lentes' => 0 // Nro

		]);
	}

}

