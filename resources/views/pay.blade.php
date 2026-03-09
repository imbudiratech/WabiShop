@extends('layouts.default')

@section('maincontent')

<div class="container">

  <div class="card col-md-6 mx-auto shadow-sm">
    <div class="card-body">

      <h4 class="mb-3">Payment:</h4>

      <img src="{{ asset('storage/' . $post->image) }}"
           class="img-fluid mb-3">

      <h5>{{ $post->post }}</h5>

      <p class="fw-bold text-success">
        KES {{ number_format($post->price) }}
      </p>

      <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <button class="btn btn-success w-100 mb-2">
          pay
        </button>


      </form>

    </div>
  </div>

</div>

@endsection