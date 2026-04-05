<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand">Products</span>

    <div class="d-flex gap-2">

        <!-- Dashboard (Admin + Editor only) -->
        @if(auth()->user()->hasAnyRole(['admin','editor']))
            <a href="/admin" class="btn btn-primary btn-sm">
                Dashboard
            </a>
        @endif

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger btn-sm">
                Logout
            </button>
        </form>

    </div>
</nav>

<!-- Content -->
<div class="container mt-4">

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-4">

                <div class="card shadow-sm h-100">

                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}"
                             class="card-img-top"
                             style="height:200px; object-fit:cover;">
                    @endif

                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>

                        <p class="text-muted">
                            Category: {{ $product->category->name ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>
        @endforeach
    </div>

</div>

</body>
</html>
