<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>

<h1>Product Details</h1>

<h2>{{ $product->name }}</h2>

<p>{{ $product->description }}</p>

<p>Price: ₹{{ $product->price }}</p>

<a href="{{ route('products.edit', $product) }}">Edit Product</a>

<br><br>

<a href="{{ route('products.index') }}">Back to Products</a>

</body>
</html>