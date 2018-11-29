<?php

use App\Category;
use App\Client;
use App\Dish;
use App\Gallery;
use App\Image;
use App\Reservation;
use App\Table;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    	$faker = Faker::create();

        Category::truncate();
        Client::truncate();
        Dish::truncate();
        Gallery::truncate();
        Image::truncate();
        Table::truncate();
        Reservation::truncate();
       	User::truncate();
        
       	DB::table('dish_reservation')->truncate();
       	DB::table('gallery_image')->truncate();


        $cantidadCategorias = 30; // No importa el numero 
        $cantidadClientes = 100; // No importa el numero
        $cantidadComidas = 40; // No importa el numero
        $cantidadGalerias = 50; // Deben ser menos que las imagenes
        $cantidadImagenes = 600; // Deben ser mayores a las galerias
        $cantidadPagos = 200; // debe ser igual a la cantidad de reservaciones
        $cantidadReservaciones = 200; // debe ser igual a la cantidad de pagos
        $cantidadMesas = 30; // Debe ser proporcional a las cantidades anteriores
        $cantidadUsuarios = 5; // Usuarios del sistema del panel de administracion

        factory(User::class, $cantidadUsuarios)->create();
        factory(Category::class, $cantidadCategorias)->create();
        factory(Client::class, $cantidadClientes)->create();
        factory(Table::class, $cantidadMesas)->create();
        factory(Image::class, $cantidadImagenes)->create();
        factory(Gallery::class, $cantidadGalerias)->create();
        factory(Dish::class, $cantidadComidas)->create();
        factory(Reservation::class, $cantidadReservaciones)->create();
        
        $galerias = Gallery::all();
        Image::all()->each(function($image) use ($galerias){
            $image->galleries()->attach(
                $galerias->random(rand(1,3))->pluck('id')
            );
        });

        $reservaciones = Reservation::all();
        foreach (range(1, 3) as $i) {
            foreach ($reservaciones as $reservacion) {
                $dish = Dish::all()->random();
                $cantidad = $faker->numberBetween($min = 1, $max = 3);
                DB::table('dish_reservation')->insert(array( 
                    'dish_id' => $dish->id,
                    'reservation_id' => $reservacion->id,
                    'quantity' => $cantidad,
                    'price' => $dish->price * $cantidad,
                    )
                );
            }
        }
    }
}
