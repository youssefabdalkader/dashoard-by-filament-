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

    <div class="d-flex align-items-center gap-3">

        @php
            $user = auth()->user();
        @endphp

        {{-- User Avatar --}}
        <div class="d-flex align-items-center gap-2">

            @if($user?->image)
                <img
                    src="{{ asset('storage/' . $user->image) }}"
                    style="width:40px;height:40px;border-radius:50%;object-fit:cover;"
                >
            @else
                <div style="width:24px;height:24px;border-radius:50%;background:#ccc;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:bold;">
                    {{ collect(explode(' ', $user?->name))
                        ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                        ->implode('') }}
                </div>
            @endif

            <span class="text-white small">
                {{ $user?->name }}
            </span>

        </div>

        {{-- Dashboard --}}
        @if($user->hasAnyRole(['admin','editor']))
            <a href="/admin" class="btn btn-primary btn-sm">
                Dashboard
            </a>
        @endif

        {{-- Logout --}}
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
