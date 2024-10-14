<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Auth::user()->products()->orderBy('created_at', 'desc')->paginate(6);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->user_id = Auth::id();
        $product->description = $request->description;
        $product->save();
        $image = $request->file('image');
        $uploadedImage = $this->uploadImage($image);
        $product->image()->create([
            'path' => $uploadedImage,
        ]);
        return redirect()->route('products.index');
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        if ($request->hasFile('image')) {
            if ($product->image) {
                $this->deleteImage($product->image->path);
            }
            $uploadedImage = $this->uploadImage($request->file('image'));
            $product->image()->update([
                'path' => $uploadedImage,
            ]);
        }
        $product->save();
        return redirect()->route('products.index');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {

            $this->deleteImage($product->image->path);
        }
        $product->delete();
        return redirect()->route('products.index');
    }
    public function uploadImage($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('images', $imageName, 'public');
        return $imagePath;
    }
    public function deleteImage($path)
    {
        @unlink(storage_path('app/public/' . $path));
    }
}
