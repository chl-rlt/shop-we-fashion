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
            'name' => 'female'
        ]);
        App\Category::create([
            'name' => 'male'
        ]);

        // création de 80 produits à partir de la factory
        factory(App\Product::class, 80)->create()->each(function($product){

            // associons une catgeorie à un livre que nous venons de créer
            $category = App\Category::find(rand(1,2));

            // pour chaque $book on lui associe une categorie en particulier
            $product->category()->associate($category);

            $product->save(); // il faut sauvegarder l'association pour faire persister en base de données

             // ajout des images
/*
            $link = str_random(12) . '.jpg'; 
            $file = file_get_contents('' . rand(1, 9)); 
            Storage::disk('local')->put($link, $file);

            $book->picture()->create([
                'title' => 'Default', 
                'link' => $link
            ]);

            */

        }); 
    }
}
