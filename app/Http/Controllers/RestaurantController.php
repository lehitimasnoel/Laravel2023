<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function showPage(){

        $data = restaurant::get();
        return view('pages.restaurant.restaurant_list',compact('data'));
    }

    public function showMenu(string $name, string $category){

        $data = menu::where('name',$name)->get();
        $menu = [];
        $restaurant = [];
        $categorizedObjects = [];

        foreach($data as $key => $val){
            $menu[] = $val->categories;
            if($category == 'null'){
                $restaurant = $data;
            }else{
                if($val->categories == $category){
                    $restaurant[] = $val;
                }
            }


            $categories2 = $val->categories;

            // Check if the category key exists in the array
            if (!array_key_exists($categories2, $categorizedObjects)) {
                // If not, create a new array for the category
                $categorizedObjects[$categories2] = [];
            }

            // Store the object in the appropriate category
            $categorizedObjects[$categories2][] = $val;

        }

        $menu = array_unique($menu);
        //dd( $categorizedObjects);

        //return compact('menu','restaurant','name','categorizedObjects');
       return view('pages.restaurant.restaurant_menu',compact('menu','restaurant','name','categorizedObjects'));
    }


}
