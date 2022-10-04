<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            //Para categoria: celulares y tablets
            [
                'category_id' => 1,
                'name'=>'Celulares y smartphones',
                'slug'=>Str::slug('Celulares y smartphones'),
                'color'=> true
            ],

            [
                'category_id' => 1,
                'name'=>'Accesorios para celulares',
                'slug'=>Str::slug('Accesorios para celulares'),
            ],

            [
                'category_id' => 1,
                'name'=>'Smartwaches',
                'slug'=>Str::slug('Smartwaches'),
            ],


            //Para categoria: Tv y Audio

            [
                'category_id' => 2,
                'name'=>'TV y audio',
                'slug'=>Str::slug('TV y audio'),
            ],

            [
                'category_id' => 2,
                'name'=>'Audios',
                'slug'=>Str::slug('Audios'),
            ],

            [
                'category_id' => 2,
                'name'=>'Audios para autos',
                'slug'=>Str::slug('Audio para autos'),
            ],


            //Para categoria: Consola y videojuegos

            [
                'category_id' => 3,
                'name'=>'xbox',
                'slug'=>Str::slug('xbox'),
            ],

            [
                'category_id' => 3,
                'name'=>'PS',
                'slug'=>Str::slug('PS'),
            ],

            [
                'category_id' => 3,
                'name'=>'Nintendo',
                'slug'=>Str::slug('Nintendo'),
            ],

            //Para categoria: Computación

            [
                'category_id' => 4,
                'name'=>'Portatiles',
                'slug'=>Str::slug('Portatiles'),
            ],

            [
                'category_id' => 4,
                'name'=>'PC Escritorio',
                'slug'=>Str::slug('PC Escritorio'),
            ],


            //Para categoria: Moda

            [
                'category_id' => 5,
                'name'=>'Mujeres',
                'slug'=>Str::slug('Mujeres'),
                'color'=>true,
                'size'=>true,
            ],

            [
                'category_id' => 5,
                'name'=>'Hombres',
                'slug'=>Str::slug('Hombres'),
                'color'=>true,
                'size'=>true,
            ],

            [
                'category_id' => 5,
                'name'=>'Lentes',
                'slug'=>Str::slug('Lentes'),
            ],

            [
                'category_id' => 5,
                'name'=>'Relojes',
                'slug'=>Str::slug('Relojes'),
            ],

            
        ];

        foreach ($subcategories as $subcategory){
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
