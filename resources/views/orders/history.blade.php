@extends('layouts.default')

@section('header')



@endsection

@section('maincontent')
    <h2 class="mb-4">Order History</h2>

    @if($orders->count() > 0)
        <div class="row">
@foreach($orders as $order)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">

            <img src="{{ asset('storage/' . $order->post->image) }}"
                 class="card-img-top"
                 style="height:200px; object-fit:cover;">

            <div class="card-body">
                <h5>{{ $order->post->post }}</h5>

                <p class="fw-bold text-success">
                    KES {{ number_format($order->post->price) }}
                </p>

                <small class="text-muted">
                    Ordered on {{ $order->created_at->format('d M, Y') }}
                </small>
            </div>

        </div>
    </div>
@endforeach
        </div>
    @else
        <p>You have not ordered any products yet.</p>
    @endif
</div>


@endsection

@section('footer')



@endsection

