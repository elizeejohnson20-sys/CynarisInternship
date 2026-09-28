<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>

<h1>Create Product</h1>

<form method="POST" action="{{ route('products.store') }}">

    @csrf

    <label>Name:</label>
    <input type="text" name="name">

    <br><br>

    <label>Description:</label>
    <textarea name="description"></textarea>

    <br><br>

    <label>Price:</label>
    <input type="number" name="price" step="0.01">

    <br><br>

    <button type="submit">Save Product</button>

</form>

<br>

<a href="{{ route('products.index') }}">Back to Products</a>

</body>
</html>