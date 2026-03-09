@extends('layouts.default')

@section('header')


@endsection


@section('maincontent')
<div class="container mt-5">
    <div class="card shadow-sm col-md-6 mx-auto">
        <div class="card-body">
            <h4 class="text-center mb-4">Register</h4>

                            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
                @endif

            <form action="/register" method="POST">
                @csrf

                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <button class="btn btn-success w-100">Register</button>
            </form>

            <div class="text-center mt-3">
                <a href="/login">Already have an account? Login</a>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')



@endsection
