<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


use Exception;
use log;

class ProductController extends Controller
{

    public function search(Request $request)
    {

        $search = $request->input('q');

        if($search == null){

            $products = Product::latest()->paginate(5);
            $searchMessage = "Empty query displaying all elements!";
            return view('products.index',compact('products','searchMessage'))->with('i', (request()->input('page', 1) - 1) * 5);

        }

        $searchMessage = "Search completed!";

        $products = Product::query()
                    ->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('brand', 'LIKE', "%{$search}%")
                    ->orWhere('category', 'LIKE', "%{$search}%")->Paginate(5);


        if ($products->isEmpty()) {

            $searchMessage = "Nothing was found!";

         }else{

            $searchMessage = "Search completed!";

         }

        return view('products.index',compact('products','searchMessage'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function getProducts(){

        try{

            // Get the data from the URL
            $response = Http::get('dummyjson.com/products'); 

            // Cast the json file into an array
            $array = (array)json_decode($response,true)['products'];

            $length = count($array);

            // Loop through the array
            for ($i = 0; $i < $length; $i++) {

                // Create new product model and then save it
                $product = new Product($array[$i]);
                $product->category_id = Category::where('title','=',$array[$i]['category'])->first()->id;
                $product->save();

            }

            return "products were seeded!";

        }catch(Exception $e){
                // return error
                return $e;

        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $products = Product::latest()->paginate(5);
        //return view('products.index');
        return view('products.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function home()
    {
        // 
        $products = Product::latest()->paginate(5);
        //return view('products.index');
        return view('welcome',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    public function cart()
    {
        return view('cart');
    }


    // Add to the cart
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->thumbnail
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // Update the cart
    public function cartUpdate(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    // Remove from the cart
    public function removeFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'discountPercentage' => 'required|numeric|min:0|max:100|regex:/^\d+(\.\d{1,2})?$/',
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }

}
