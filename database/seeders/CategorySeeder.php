<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories=[
            [
                'name' => 'Celulares y tablets',
                'slug' => Str::slug('Celulares y tablets'),
                'icon' => '<i class="fas fa-mobile-alt"></i>'
            ],


            [
                'name' => 'TV, audio y video',
                'slug' => Str::slug('TV, audio y video'),
                'icon' => '<i class="fas fa-tv"></i>'
            ],


            [
                'name' => 'Consola y videojuegos',
                'slug' => Str::slug('Consola y videojuegos'),
                'icon' => '<i class="fas fa-gamepad"></i>'
            ],


            [
                'name' => 'Computacion',
                'slug' => Str::slug('Computacion'),
                'icon' => '<i class="fas fa-laptop"></i>'
            ],


            [
                'name' => 'Tarjetas Gráficas',
                'slug' => Str::slug('Tarjetas Gráficas'),
                'icon' => '<i class="fas fa-tshirt"></i>'
            ]

        ];

        //se va a crear uno a uno, adicionalmente se crea la imagen
        foreach($categories as $category){
            //retorno de colecciones
            $category = Category::factory(1)->create($category)->first();
            $brands = Brand::factory(4)->create(); //Para brand(Marca)
            foreach ($brands as $brand){
                $brand->categories()->attach($category->id);
            }
        }
    }
}
