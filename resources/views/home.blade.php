@extends('layouts.default')

@section('header')
@endsection


@section('maincontent')

{{-- ADMIN PRODUCT UPLOAD --}}
@auth
@if(auth()->user()->is_admin == 1)

<div class="container mb-4">

<div class="card shadow-sm">
<div class="card-body">

<h4 class="mb-3">Upload Product:</h4>

<form action="/create-post" method="POST" enctype="multipart/form-data">
@csrf

<div class="row g-3">

<div class="col-md-4">
<input type="text"
class="form-control"
name="post"
placeholder="Product name"
required>
</div>

<div class="col-md-4">
<input type="file"
class="form-control"
name="image"
required>
</div>

<div class="col-md-3">
<input type="number"
class="form-control"
name="price"
placeholder="Price"
required>
</div>

<div class="col-md-3">
<input type="text"
class="form-control"
name="category"
placeholder="Enter Category"
required>
</div>

<div class="col-12">
<button class="btn btn-primary w-100">
Upload Product
</button>
</div>

</div>

</form>

</div>
</div>

</div>

@endif
@endauth



{{-- PRODUCTS SECTION --}}

<div class="container">

<div class="card shadow-sm">
<div class="card-body">


{{-- PRODUCT TABS --}}
<ul class="nav nav-tabs mb-4">

<li class="nav-item">
<button class="nav-link active"
data-bs-toggle="tab"
data-bs-target="#all">
All Products
</button>
</li>

<li class="nav-item">
<button class="nav-link"
data-bs-toggle="tab"
data-bs-target="#best">
Best Selling
</button>
</li>

<li class="nav-item">
<button class="nav-link"
data-bs-toggle="tab"
data-bs-target="#latest">
Latest Products
</button>
</li>

</ul>



{{-- TAB CONTENT --}}
<div class="tab-content">


{{-- ALL PRODUCTS --}}
<div class="tab-pane fade show active" id="all">

<div class="row">

@foreach($allProducts as $post)

<div class="col-md-4 mb-4">

<div class="card h-100">

<img
src="{{ asset('storage/'.$post->image) }}"
class="card-img-top"
style="height:200px; object-fit:cover;"
>

<div class="card-body">

<h5>{{ $post->post }}</h5>

<p class="fw-bold text-success">
KES {{ number_format($post->price) }}
</p>

@auth

<a href="{{ route('orders.pay',$post->id) }}"
class="btn btn-warning w-100">
Order Now
</a>

@else

<a href="/login"
class="btn btn-secondary w-100">
Login to Order
</a>

@endauth

</div>

</div>

</div>

@endforeach

</div>

</div>



{{-- BEST SELLING --}}
<div class="tab-pane fade" id="best">

<div class="row">

@foreach($bestSelling as $post)

<div class="col-md-4 mb-4">

<div class="card h-100">

<img
src="{{ asset('storage/'.$post->image) }}"
class="card-img-top"
style="height:200px; object-fit:cover;"
>

<div class="card-body">

<h5>{{ $post->post }}</h5>

<p class="fw-bold text-success">
KES {{ number_format($post->price) }}
</p>

@auth

<a href="{{ route('orders.pay',$post->id) }}"
class="btn btn-warning w-100">
Order Now
</a>

@else

<a href="/login"
class="btn btn-secondary w-100">
Login to Order
</a>

@endauth

</div>

</div>

</div>

@endforeach

</div>

</div>



{{-- LATEST PRODUCTS --}}
<div class="tab-pane fade" id="latest">

<div class="row">

@foreach($latestProducts as $post)

<div class="col-md-4 mb-4">

<div class="card h-100">

<img
src="{{ asset('storage/'.$post->image) }}"
class="card-img-top"
style="height:200px; object-fit:cover;"
>

<div class="card-body">

<h5>{{ $post->post }}</h5>

<p class="fw-bold text-success">
KES {{ number_format($post->price) }}
</p>

@auth

<a href="{{ route('orders.pay',$post->id) }}"
class="btn btn-warning w-100">
Order Now
</a>

@else

<a href="/login"
class="btn btn-secondary w-100">
Login to Order
</a>

@endauth

</div>

</div>

</div>

@endforeach

</div>

</div>



</div>


</div>
</div>

</div>

@endsection



@section('footer')
@endsection