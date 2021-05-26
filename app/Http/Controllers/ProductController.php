<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 
use App\Category; 

class ProductController extends Controller
{
    /**
    * Display a listing of the resource.
    * 
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $products = Product::paginate(15);

        return view('back.product.index', ['products' => $products]);
    }

    public function create()
        {
            // permet de récupérer une collection type array avec en clé id => name

            $categories = Category::pluck('name', 'id')->all();
            return view('back.product.create', ['categories' => $categories]);

        }

        public function store(Request $request) // La méthode store va donc récupérer les données POST du formulaire que nous venons de mettre en place.
        {
    
            $this->validate($request, [ // méthide pour sécurisé et vérifier les données que l'on envoit en BDD
                'name' => 'required|min:5|max:100',
                'description' => 'string',
                'price' => 'required',
                'size' => 'required|in:XS,S,M,L,XL',
                'status' => 'required|in:published,unpublished',
                'state' => 'required|in:sale,standard',
                'reference' => 'required|max:16',
                'picture' => 'image|max:3000',
                'category_id' => 'integer',
            ]);
    
            $product = Product::create($request->all()); // associé les fillables
    
            return redirect()->route('product.index')->with('message', 'success');
    
    
        }
}
