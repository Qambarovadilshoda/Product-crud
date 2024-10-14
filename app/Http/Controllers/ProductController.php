<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function index(){
        $products = Auth::user()->products;
        return view('products.index',compact('products'));
    }
    public function create(){
        return view('products.create');
    }
    
    public function store(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->user_id = Auth::id();
        $product->description = $request->description;
        $product->save();
        $image = $request->file('image');
        $imagePath = time() . '.' . $image->getClientOriginalExtension();
        $uploadedImage = $image->storeAs('images', $imagePath, 'public');
        $product->image()->create([
            'path'=> $uploadedImage,
        ]);
        return redirect()->route('products.index');

    }
    
}
