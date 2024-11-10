// resources/views/product_details.blade.php



@section('content')
    <h1>{{ $product->name }}</h1>
    <img src="{{ $product->image }}" alt="{{ $product->name }}" />
    <p>{{ $product->description }}</p>
    <p>Price: ${{ number_format($product->price, 2) }}</p>

    <form action="{{ route('add_to_cart') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit">Add to Cart</button>
    </form>
@endsection
