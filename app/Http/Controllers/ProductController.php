<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
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

            // image
            //$im = $request->file('picture');

            
            

            // si on associe une image à un book 
            //if (!empty($im)) {
                
            //Storage::disk('local')->allFiles($category->name);



            $im = $request->file('picture');
            $cat_name = $request->input('category_id'); 

            var_dump($cat_name);
           
            

            if (!empty($im)) {
 
                // $filename = time() . '.' . $im->getClientOriginalExtension();
               
                 $folder = $cat_name == 2 ? 'femme' : 'homme';
                 var_dump($folder);
        
                 Storage::disk('local')->put($folder, $product->picture);
                
                $path = $request->file('picture')->store($folder.'');
                var_dump($path);
               
                $product->picture = $path;
            
            

        }

        $product->save();
           
        //     $im = $request->file('picture');

        //     if (!empty($im)) {

        //         $cat_name = $request->input('category_id'); 
        //         // var_dump($cat_name); 
        //         // $filename = time() . '.' . $im->getClientOriginalExtension();
               
        //          $folder = $category->name == 'femme' ? 'femme' : 'homme';
        //          Storage::disk('local')->put($folder, $filename);
                
        //         $path = $folder . '' . $product->picture; 
        //         $new_product = new Product();
        //         $new_product->picture = $path; 
        //         $new_product->save();  
            
            

        // }
            // if($request->hasFile('picture')){

            //     $request->file->store('images/homme', 'public');
                    
            //     $product = new Product([
            //         "name" => $request->get('name'),
            //         "file_path" => $request->file->hashName()
            //     ]);
            //     var_dump($product);
            //     exit();  

                // $avatar = array($request->file('picture'));
                // var_dump($avatar); 
               

                // $filename = time() . '.' . $avatar->getClientOriginalExtension();
                // var_dump($filename); 
                
                // $product = Product::create($avatar)->save(public_path('/images/homme/' . $filename ) );
                 
                //  exit();
                // $user = Auth::user();
                // $user->avatar = $filename;
                // $user->save();
            //}

        // }
            return redirect()->route('product.index')->with('message', 'success');
    
    
        }

        public function edit($id)
        {
            $product = Product::find($id);
            $categories = Category::pluck('name', 'id')->all();

            return view('back.product.edit', compact('product', 'categories'));

        }

        public function update(Request $request, $id)
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

            $product = Product::find($id); // il faudra récupérer le livre que vous souhaitez modifier 

            $product->update($request->all()); // mettre à jour les données du livre

            return redirect()->route('product.index')->with('message', 'success');

        }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        public function destroy($id)
        {
            $product = Product::find($id);

            $product->delete();

            return redirect()->route('product.index')->with('message', 'success delete');
        }

        
}
