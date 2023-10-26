<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Utils\Paginate;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct(){

       $productss = product::orderBy('created_at','desc')->get()->toArray();
        $mapped = Arr::map($productss, function (array $value, string $key) {
            $value['detail'] = Str::limit($value['detail'], 10);
            return $value;
        });

        $products = Paginate::paginate($mapped,3);

        return view('pages.products.product',compact('products'));

        /*$products = product::latest()->paginate(3);
        dd(request()->input('page'));
        return view('pages.products.product',compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);*/
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
        }else{
            $products['image'] = "";
        }

        product::create($products);
        return redirect(route('show.product'))->with('message','Successfully created new product!');

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

    public function deleteProduct(Request $request, string $id){

        product::where('id',$id)->delete();
        return redirect(route('show.product'))->with('message','Successfully deleted!');

    }
}
