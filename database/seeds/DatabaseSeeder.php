<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Tdvsa\Producto;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('ProductoTableSeeder');
	}

}

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
			'nombre' => 'AllroundDual', // Nombre del producto
			'modelo' => 'M15', // MD5, AK47 etc
			'descripcion_basica' => 'Es una buena camara', // Algo que describa al producto en pocas palabras
			'descripcion_tecnica' => 'Es grande y tiene mucho poder', // Descripcion detallada de las especificaciones del producto
			'imagen' => '/img/AllroundDual-M15_medium-large.jpg', // Nombre de la Imagen
			'cant_lentes' => 2, // Nro
			'precio' => 150 // Precio del Producto

		]);

		Producto::create([

			'tipo' => 2, // 1-Camara, 2-Lente, 3-Montura, 4-Fuente de Alimentacion
			'nombre' => 'SensorModule', // Nombre del producto
			'modelo' => 'mx6MP', // MD5, AK47 etc
			'descripcion_basica' => 'Es una buen lente', // Algo que describa al producto en pocas palabras
			'descripcion_tecnica' => 'Es exacto', // Descripcion detallada de las especificaciones del producto
			'imagen' => '/img/mx_SensorModule_6MP.jpg_small.jpg', // Nombre de la Imagen
			'cant_lentes' => 0, // Nro
			'precio' => 50 // Precio del Producto

		]);

		Producto::create([

			'tipo' => 2, // 1-Camara, 2-Lente, 3-Montura, 4-Fuente de Alimentacion
			'nombre' => 'Lens Unit', // Nombre del producto
			'modelo' => 'S15', // MD5, AK47 etc
			'descripcion_basica' => 'Es una buen lente2', // Algo que describa al producto en pocas palabras
			'descripcion_tecnica' => 'Es exacto2', // Descripcion detallada de las especificaciones del producto
			'imagen' => '/img/mx_S15_lens_units_BW.jpg_small.jpg', // Nombre de la Imagen
			'cant_lentes' => 0, // Nro
			'precio' => 45 // Precio del Producto

		]);

		Producto::create([

			'tipo' => 1, // 1-Camara, 2-Lente, 3-Montura, 4-Fuente de Alimentacion
			'nombre' => 'DualDome', // Nombre del producto
			'modelo' => 'D15', // MD5, AK47 etc
			'descripcion_basica' => 'Es una buena camara', // Algo que describa al producto en pocas palabras
			'descripcion_tecnica' => 'Es grande y tiene mucho poder', // Descripcion detallada de las especificaciones del producto
			'imagen' => '/img/DualDome-D15_medium-large.jpg', // Nombre de la Imagen
			'cant_lentes' => 2, // Nro
			'precio' => 155 // Precio del Producto

		]);

		Producto::create([

			'tipo' => 1, // 1-Camara, 2-Lente, 3-Montura, 4-Fuente de Alimentacion
			'nombre' => 'DualMount', // Nombre del producto
			'modelo' => 'Small', // MD5, AK47 etc
			'descripcion_basica' => 'Es una buen lente', // Algo que describa al producto en pocas palabras
			'descripcion_tecnica' => 'Es exacto', // Descripcion detallada de las especificaciones del producto
			'imagen' => '/img/DualMount_small-medium.jpg', // Nombre de la Imagen
			'cant_lentes' => 1, // Nro
			'precio' => 100 // Precio del Producto

		]);

		Producto::create([

			'tipo' => 2, // 1-Camara, 2-Lente, 3-Montura, 4-Fuente de Alimentacion
			'nombre' => 'LensUnit co', // Nombre del producto
			'modelo' => 'D15D', // MD5, AK47 etc
			'descripcion_basica' => 'Es una buen lente2', // Algo que describa al producto en pocas palabras
			'descripcion_tecnica' => 'Es exacto2', // Descripcion detallada de las especificaciones del producto
			'imagen' => '/img/mx_D15D_LensUnit_co_6MP.jpg_small.jpg', // Nombre de la Imagen
			'cant_lentes' => 0, // Nro
			'precio' => 40 // Precio del Producto

		]);

		Producto::create([

			'tipo' => 2, // 1-Camara, 2-Lente, 3-Montura, 4-Fuente de Alimentacion
			'nombre' => 'OPT-F1', // Nombre del producto
			'modelo' => 'L20 L23', // MD5, AK47 etc
			'descripcion_basica' => 'Es una buen lente2', // Algo que describa al producto en pocas palabras
			'descripcion_tecnica' => 'Es exacto2', // Descripcion detallada de las especificaciones del producto
			'imagen' => '/img/mx-OPT-F1.8-L20-L23.jpg_small.jpg', // Nombre de la Imagen
			'cant_lentes' => 0, // Nro
			'precio' => 110 // Precio del Producto

		]);

		Producto::create([

			'tipo' => 3, // 1-Camara, 2-Lente, 3-Montura, 4-Fuente de Alimentacion
			'nombre' => 'SurroundMount', // Nombre del producto
			'modelo' => 'Small', // MD5, AK47 etc
			'descripcion_basica' => 'Es una buen lente', // Algo que describa al producto en pocas palabras
			'descripcion_tecnica' => 'Es exacto', // Descripcion detallada de las especificaciones del producto
			'imagen' => '/img/SurroundMount_small-medium.jpg', // Nombre de la Imagen
			'cant_lentes' => 0, // Nro
			'precio' => 120 // Precio del Producto

		]);

		Producto::create([

			'tipo' => 4, // 1-Camara, 2-Lente, 3-Montura, 4-Fuente de Alimentacion
			'nombre' => 'Fuente PoE', // Nombre del producto
			'modelo' => 'NPA-rj', // MD5, AK47 etc
			'descripcion_basica' => 'Es una buen lente2', // Algo que describa al producto en pocas palabras
			'descripcion_tecnica' => 'Es exacto2', // Descripcion detallada de las especificaciones del producto
			'imagen' => '/img/MX-NPA-PoE-RJ.jpg_small-medium.jpg', // Nombre de la Imagen
			'cant_lentes' => 0, // Nro
			'precio' => 90 // Precio del Producto

		]);

		Producto::create([

			'tipo' => 4, // 1-Camara, 2-Lente, 3-Montura, 4-Fuente de Alimentacion
			'nombre' => 'Power Adapter', // Nombre del producto
			'modelo' => 'Set New', // MD5, AK47 etc
			'descripcion_basica' => 'Es una buen lente2', // Algo que describa al producto en pocas palabras
			'descripcion_tecnica' => 'Es exacto2', // Descripcion detallada de las especificaciones del producto
			'imagen' => '/img/Netzwork-Power-Adapter-Set-new_small-medium.png', // Nombre de la Imagen
			'cant_lentes' => 0, // Nro
			'precio' => 80 // Precio del Producto

		]);
	}

}

