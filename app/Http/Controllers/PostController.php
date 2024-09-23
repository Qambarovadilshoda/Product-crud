<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
       Post::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'image' => $this->uploadImage($request->file('image'),'images')
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $this->deleteImage( $post->image);
        $post->title = $request->title;
        $post->image =  $this->uploadImage($request->file('image'),'images');
        $post->description = $request->description;
        $post->update();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $this->deleteImage($post->image);
        $post->delete();    
        return redirect()->route('posts.index');
    }

    public function uploadImage($image,$folderPath)
    {
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $uploadedImage = $image->storeAs($folderPath, $fileName,'public');

        return $uploadedImage;
    }

    public function deleteImage($path)
    {
        @unlink(storage_path('app/public/' . $path));
    }
}
