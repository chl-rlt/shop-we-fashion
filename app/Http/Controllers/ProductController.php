<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\Size;

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
        $sizes = Size::pluck('name', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();
        return view('back.product.create', ['categories' => $categories, 'sizes' => $sizes]);
    }

    public function store(Request $request) // La méthode store va donc récupérer les données POST du formulaire que nous venons de mettre en place.
    {

        $this->validate($request, [ // méthide pour sécurisé et vérifier les données que l'on envoit en BDD
            'name' => 'required|min:5|max:100',
            'description' => 'string',
            'price' => 'required|numeric',
            'status' => 'required|in:published,unpublished',
            'state' => 'required|in:sale,standard',
            'reference' => 'required|max:16',
            'picture' => 'image|max:3000',
            'category_id' => 'integer',
            'size_id' => 'integer',
        ]);

        $product = Product::create($request->all()); // associé les fillables

        $product->sizes()->attach($request->sizes);

        // image 
        $im = $request->file('picture');
        $cat_name = $request->input('category_id');

        if (!empty($im)) {

            $folder = $cat_name == 2 ? 'femme' : 'homme';
            Storage::disk('local')->put($folder, $product->picture);

            $path = $request->file('picture')->store($folder . '');
            $product->picture = $path;
        }

        $product->save();

        return redirect()->route('product.index')->with('message', 'Le produit a bien été ajouté ! ');
    }

    // Met à jour un produit 
    public function edit($id)
    {
        $product = Product::find($id);

        $sizes = Size::pluck('name', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();

        return view('back.product.edit', compact('product', 'sizes', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ // méthide pour sécurisé et vérifier les données que l'on envoit en BDD
            'name' => 'required|min:5|max:100',
            'description' => 'string',
            'price' => 'required',
            'status' => 'required|in:published,unpublished',
            'state' => 'required|in:sale,standard',
            'reference' => 'required|max:16',
            'picture' => 'image|max:3000',
            'category_id' => 'integer',
        ]);

        $product = Product::find($id); // il faudra récupérer le produit que vous souhaitez modifier 

        $product->update($request->all()); // mettre à jour les données du produit

        // on utilisera la méthode sync pour mettre à jour les tailles dans la table de liaison
        $product->sizes()->sync($request->sizes);

        // image 
        $im = $request->file('picture');
        $cat_name = $request->input('category_id');

        if (!empty($im)) {

            $folder = $cat_name == 2 ? 'femme' : 'homme';
            Storage::disk('local')->put($folder, $product->picture);

            $path = $request->file('picture')->store($folder . '');
            $product->picture = $path;
        }

        $product->save();


        return redirect()->route('product.index')->with('message', 'Produit mis à jour !');
    }

    // Supprime un produit 
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index')->with('message', 'Suppression réussie !');
    }
}
