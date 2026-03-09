<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Create Product (Admin Only)
  public function createPost(Request $request)
{
    if (!auth()->user()->is_admin) {
        abort(403);
    }

    $validated = $request->validate([
        'post' => 'required|string|max:255',
        'image' => 'required|image',
        'price' => 'required|numeric',
        'category' => 'required|string|max:255'
    ]);

    // Store image
    $imagePath = $request->file('image')->store('posts','public');

    // Find or create category
    $category = Category::firstOrCreate([
        'name' => $validated['category']
    ]);

    // Create product
    Post::create([
        'post' => $validated['post'],
        'image' => $imagePath,
        'price' => $validated['price'],
        'category_id' => $category->id,
        'user_id' => auth()->id()
    ]);

    return redirect('/')->with('success','Product uploaded successfully');
}

    // Home Page
    public function home(Request $request)
{
    $search = $request->search;

    $allProducts = Post::with('category')
        ->when($search, function ($query, $search) {
            $query->where('post', 'like', '%' . $search . '%')
                  ->orWhereHas('category', function ($q) use ($search) {
                      $q->where('name', 'like', '%' . $search . '%');
                  });
        })
        ->inRandomOrder()
        ->get();

    $bestSelling = Post::withCount('orders')
        ->with('category')
        ->when($search, function ($query, $search) {
            $query->where('post', 'like', '%' . $search . '%')
                  ->orWhereHas('category', function ($q) use ($search) {
                      $q->where('name', 'like', '%' . $search . '%');
                  });
        })
        ->orderBy('orders_count', 'desc')
        ->take(6)
        ->get();

    $latestProducts = Post::with('category')
        ->when($search, function ($query, $search) {
            $query->where('post', 'like', '%' . $search . '%')
                  ->orWhereHas('category', function ($q) use ($search) {
                      $q->where('name', 'like', '%' . $search . '%');
                  });
        })
        ->latest()
        ->take(6)
        ->get();

    return view('home', [
        'allProducts' => $allProducts,
        'bestSelling' => $bestSelling,
        'latestProducts' => $latestProducts
    ]);
}
}