<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Store a new order
    public function store(Request $request)
{
    $post = Post::findOrFail($request->post_id);

  Order::create([
    'user_id' => auth()->id(),
    'post_id' => $post->id
]);

    return back()->with('success', 'Product ordered successfully!');
}
    // Show all orders for logged-in user
   public function home()
{
    $orders = auth()->user()
        ->orders()
        ->with('post')
        ->latest()
        ->get();

    return view('orders.history', compact('orders'));
}

    // Cancel order
    public function destroy(Post $post)
    {
        auth()->user()->orders()->where('post_name', $post->id)->delete();
        return back()->with('success', 'Order cancelled successfully.');
    }

    public function pay($id)
{
    $post = \App\Models\Post::findOrFail($id);

    return view('pay', compact('post'));
}
}