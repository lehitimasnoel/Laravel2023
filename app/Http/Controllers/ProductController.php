<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct(){

        $products = product::latest()->paginate(6);
        //dd((request()->input('page', 1) - 1) * 5);
        return view('pages.product',compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
