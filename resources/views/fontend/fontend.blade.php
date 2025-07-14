@extends('fontend.master')
@section('content')
<div class="container mt-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-md-5  g-3">
        @foreach(App\Models\Product::with('category')->get() as $item)
            <div class="col">
                <div class="card h-100 shadow-sm" style="font-size: 14px;">
                    <!-- Product Image -->
                    <img src="{{ asset('uploads/' . ($item->product_image ?? 'default.png')) }}"
                         alt="{{ $item->product_name }}"
                         class="card-img-top"
                         style="height: 100px; object-fit: cover;">

                    <div class="card-body p-2">
                        <h6 class="card-title mb-1">{{ $item->product_name }}</h6>
                        <p class="mb-1">Category: {{ $item->category->category_name ?? 'No Category' }}</p>
                        <p class="mb-2">Price: ৳{{ $item->product_price }}</p>
                        <a href="{{ route('cart.add', $item->id) }}" class="btn btn-sm btn-primary w-100">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
