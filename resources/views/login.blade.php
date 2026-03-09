@extends('layouts.default')

@section('header')



@endsection


@section('maincontent')
<div class="container mt-5">
    <div class="card shadow-sm col-md-6 mx-auto">
        <div class="card-body">
            <h4 class="text-center mb-4">Login</h4>
              @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="/login" method="POST">
                @csrf

                <div class="mb-3">
                    <input type="text" name="loginname" class="form-control" placeholder="Username">
                </div>

                <div class="mb-3">
                    <input type="password" name="loginpassword" class="form-control" placeholder="Password">
                </div>

                <button class="btn btn-primary w-100">Log In</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')



@endsection
