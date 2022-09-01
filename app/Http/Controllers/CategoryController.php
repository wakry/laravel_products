<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    //
    public function getCategories(){

        try{

            // Get the data from the URL
            $response = Http::get('dummyjson.com/products'); 

            // Cast the json file into an array
            $array = (array)json_decode($response,true)['products'];
            $categories = array();
            $length = count($array);

            // Loop through the products array then add the categories into another array.
            for ($i = 0; $i < $length; $i++) {

                if (!in_array($array[$i]['category'], $categories)){

                    array_push($categories,$array[$i]['category']);

                }
            }

            // Loop and seeds category into the database.
            $length = count($categories);
            for ($i = 0; $i < $length; $i++) {
                // Create new category model and then save it
                $category = new Category();
                $category->id = $i+1;
                $category->title = $categories[$i];
                $category->save();
            }

            return "categories were seeded!";

        }catch(Exception $e){
                // return error
                return $e;

        }

    }

    public function index(){
        $categories = Category::All();
        return view('categories.index',compact('categories'));
    }

}
