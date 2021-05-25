<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product; 
use App\Category; 

class FrontController extends Controller
{

    public function __construct(){

        // méthode pour injecter des données à une vue partielle 
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('name', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories); // on passe les données à la vue
        });
    }


    public function index(){

        $products = Product::all();

        return view('front.index', ['products' => $products]); // retourne tous les produits de l'application
    }

    // retournera un produit en fonction de son identifiant
    public function show(int $id){

        // vous ne récupérez qu'un seul livre 
        $product = Product::find($id);

        // que vous passez à la vue
        return view('front.show', ['product' => $product]);
    }

    public function showProductsByCategory(int $id){
        // on récupère le modèle category.id 
        $category = Category::find($id);

        $products = $category->products()->paginate(5);

        return view('front.category', ['products' => $products, 'category' => $category]);
    }

    public function showProductsSale(){

        $products = Product::all()->where('state', 'sale');

        return view('front.state', ['products' => $products]);
    }
}
