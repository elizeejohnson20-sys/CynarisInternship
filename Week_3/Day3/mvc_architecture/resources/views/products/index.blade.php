<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

<h1>Products</h1>

<a href="{{ route('products.create') }}">Add Product</a>

<hr>

@if($products->count())
    @foreach($products as $product)

        <h2>{{ $product->name }}</h2>

        <p>{{ $product->description }}</p>

        <p>Price: ₹{{ $product->price }}</p>

        <a href="{{ route('products.show', $product) }}">View</a>

        <a href="{{ route('products.edit', $product) }}">Edit</a>

        <form method="POST"
              action="{{ route('products.destroy', $product) }}"
              style="display:inline">

            @csrf
            @method('DELETE')

            <button type="submit">Delete</button>

        </form>

        <hr>

    @endforeach
@else
    <p>No products available.</p>
@endif

</body>
</html>