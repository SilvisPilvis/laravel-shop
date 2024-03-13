<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <p>Shoppper</p>
        @auth
            <p>Welcome {{auth()->user()->name}}!</p>
            <a href="/logout" class="logout">Log Out</a>
        @endauth
        @guest
            <a href="/login" class="logout">Log In</a>
            <a href="/register" class="logout">Register</a>
        @endauth
    </header>
    <main>
        <h1>
            Products:
        </h1>
        <!-- katra produkta kartīte -->
        @foreach($products as $product)
        <article>
            <form action="/products/{{$product->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="trash">🗑️</button>
            </form>
            <h2>{{$product->productName}}</h2>
            <img src="{{$product->imgUrl}}" alt="{{$product->productDescription}}">
            <p>{{$product->productDescription}}</p>
            <p>{{$product->price}} EUR</p>
        </article>
        @endforeach
    </main>
</body>
</html>