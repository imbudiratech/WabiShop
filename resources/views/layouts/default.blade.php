<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Wabi Shop</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
<div class="container">

<a class="navbar-brand fw-bold" href="/">Wabi Shop</a>

<div class="d-flex align-items-center ms-auto">

<!-- Search -->
<form action="/" method="GET" class="d-flex me-3">
<input 
class="form-control form-control-sm me-2"
type="search"
name="search"
placeholder="Search product..."
value="{{ request('search') }}"
>

<button class="btn btn-outline-warning btn-sm">
Search
</button>
</form>

<!-- Order History -->
<a href="/orders" class="btn btn-outline-warning btn-sm me-3">
Order History
</a>

@auth

<form action="/logout" method="POST" class="d-inline">
@csrf
<button class="btn btn-danger btn-sm">
Logout
</button>
</form>

@else

<a href="/register" class="btn btn-outline-light btn-sm me-2">
Register
</a>

<a href="/login" class="btn btn-outline-light btn-sm me-2">
Login
</a>

<a href="/" class="btn btn-outline-light btn-sm">
Home
</a>

@endauth

</div>
</div>
</nav>

<header>
@yield('header')
</header>

<main>
@yield('maincontent')
</main>

<footer>
@yield('footer')
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>