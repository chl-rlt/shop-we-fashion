<?php

use Illuminate\Database\Seeder;


use App\Product; 
use App\Category; 
use App\Size; 
use App\Picture; 

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // création des catégories
        App\Category::create([
            'name' => 'homme'
        ]);
        App\Category::create([
            'name' => 'femme'
        ]);

        // création des tailles 

        App\Size::create([
            'name' => 'XS'
        ]);
        App\Size::create([
            'name' => 'S'
        ]);
        App\Size::create([
            'name' => 'M'
        ]);
        App\Size::create([
            'name' => 'L'
        ]);
        App\Size::create([
            'name' => 'XL'
        ]);
        

        // création de 80 produits à partir de la factory
        factory(App\Product::class, 80)->create()->each(function($product){

           /* $size = App\Size::find(rand(1,2));
            $product->size()->associate($size);*/ 

            // associons une catgeorie à un produit que nous venons de créer
            $category = App\Category::find(rand(1,2));

            // pour chaque $product on lui associe une categorie en particulier
            $product->category()->associate($category);


             // ajout des images

             $files = Storage::allFiles($category->name); 
             $fileIndex = array_rand($files); 
             $file = $files[$fileIndex]; 

             $product->picture = $file; 
            
            // ajout des tailles 

            $sizes = App\Size::pluck('id')->shuffle()->slice(0, rand(1, 5))->all(); 
            $filter_sizes = array_values(array_sort($sizes, function ($value) {
                return $value; 
            }));

            $product->sizes()->attach($filter_sizes); 

            $product->save(); // il faut sauvegarder l'association pour faire persister en base de données

        
        }); 
    }
}
