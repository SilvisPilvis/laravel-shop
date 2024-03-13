<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Prooduct</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>
<body>
    <form action="/products" method="POST" enctype="multipart/form-data">
        <!-- @if ($errors->any())
        <ul class="list-group">
            @foreach ($errors->all() as $err)
            <li class="m-1 list-group-item list-group-item-danger">{{ $err }}
            @endforeach
        </ul>
        @endif -->
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $err)
            <li class="err">{{ $err }}
            @endforeach
        </ul>
        @endif
        @csrf
        <label>
            Product Name:
            <input type="text" name="prodName">
        </label>
        <label>
            Description:
            <textarea id="" cols="30" rows="10" name="prodDesc"></textarea>
        </label>
        <label>
            Image:
            <input type="file" name="prodImg" id="" accept="image/*">
        </label>
        <label>
            Price:
            <input type="number" name="prodPrice" id="" min="0" step="0.01">
        </label>
        <button>Create</button>
    </form>
</body>
</html>