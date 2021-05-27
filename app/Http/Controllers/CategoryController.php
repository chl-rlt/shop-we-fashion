<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category; 
use App\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('back.category.index', ['categories' => $categories]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('name', 'id')->all();
        $category = Category::find($id); 
        

        return view('back.category.edit', ['category' => $category, 'categories' => $categories, 'product' => $product]);

    }

    public function update(Request $request, $id)
        {
            $this->validate($request, [ // méthide pour sécurisé et vérifier les données que l'on envoit en BDD
                'name' => 'required',
            ]);

            $category = Category::find($id); // il faudra récupérer le livre que vous souhaitez modifier 

            $category->update($request->all()); // mettre à jour les données du livre

            $category->save();

            return redirect()->route('category.index')->with('message', 'La catégorie a bien été mise à jour');

        }

        public function create()
    {
            // permet de récupérer une collection type array avec en clé id => name

            $categories = Product::pluck('category_id')->all();
            return view('back.category.create', ['categories' => $categories]);

        }

    public function store(Request $request) // La méthode store va donc récupérer les données POST du formulaire que nous venons de mettre en place.
    {
    
            $this->validate($request, [ // méthide pour sécurisé et vérifier les données que l'on envoit en BDD
                'name' => 'required',
                
            ]);
    
            $category = Category::create($request->all()); // associé les fillables
            

            $category->save();
        
            return redirect()->route('category.index')->with('message', 'La catégorie a bien été créé');
    
    
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('category.index')->with('message', 'Suppression réussie !');
        
    }

}
