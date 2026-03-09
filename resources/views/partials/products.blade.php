<div class="row">
@foreach($posts as $post)

<div class="col-md-4 mb-4">
<div class="card">

<img src="{{ asset('storage/'.$post->image) }}">

<div class="card-body">

<h5>{{ $post->post }}</h5>

<p>KES {{ number_format($post->price) }}</p>

<a href="{{ route('orders.pay',$post->id) }}" class="btn btn-warning">
Order Now
</a>

</div>
</div>
</div>

@endforeach
</div>