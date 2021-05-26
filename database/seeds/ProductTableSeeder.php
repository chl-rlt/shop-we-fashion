<?php

use Illuminate\Database\Seeder;


use App\Product; 
use App\Category; 
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
        

        // création de 80 produits à partir de la factory
        factory(App\Product::class, 80)->create()->each(function($product){

            // associons une catgeorie à un produit que nous venons de créer
            $category = App\Category::find(rand(1,2));

            // pour chaque $product on lui associe une categorie en particulier
            $product->category()->associate($category);


             // ajout des images

             $files = Storage::allFiles($category->name); 
             $fileIndex = array_rand($files); 
             $file = $files[$fileIndex]; 

             $product->picture = $file; 
/*
             $product->picture()->create([
                'link' => $file
             ]);*/

             $product->save(); // il faut sauvegarder l'association pour faire persister en base de données

        
        }); 
    }
}
