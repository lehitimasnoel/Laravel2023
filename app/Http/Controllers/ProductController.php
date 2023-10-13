<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct(){

        $products = product::latest()->paginate(6);
        //dd((request()->input('page', 1) - 1) * 5);
        return view('pages.products.product',compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function productForm(){
        return view('pages.products.product_form');
    }

    public function addProduct(Request $request){

        $products = $request->all();
        if ($request->file('image')) {
            $image = $request->file('image');

            $destinationPath = 'images/product';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $products['image'] = $profileImage;
        }

        product::create($products);
        return redirect(route('show.product'))->with('message','Successfully created new product!');;

    }
    public function showEditProduct(string $id){
        return view('pages.products.edit_product_form',['product' => product::findOrFail($id)]);
    }
    public function updateProduct(Request $request,string $id){

        $data = $request->all();

        if ($request->file('image')) {
            $image = $request->file('image');

            $destinationPath = 'images/product';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = $profileImage;
        }else{
            unset($data['image']);
        }

        product::find($id)->update($data);

        return redirect(route('show.product'))->with('message','Successfully Updated');
    }
}
