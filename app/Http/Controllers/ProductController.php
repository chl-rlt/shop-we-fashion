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
}
