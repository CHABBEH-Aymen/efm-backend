<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Products</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Rule Label</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product['product'][0]->id }}</td>
                    <td>{{ $product['product'][0]->nom }}</td>
                    <td>{{ $product['product'][0]->stock }}</td>
                    <td>{{ $product['product'][0]->prix }}</td>
                    <td>{{ $product['rule'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>