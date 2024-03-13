<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <main>
        <article>
            <h2>{{$product->productName}}</h2>
            <img src="{{$product->imgUrl}}" alt="{{$product->productDescription}}">
            <p>{{$product->productDescription}}</p>
            <p>{{$product->price}} EUR</p>
        </article>
    </main>
</body>
</html>