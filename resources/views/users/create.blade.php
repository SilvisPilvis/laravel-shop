<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Register</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            gap: 0.7rem;
        }
        form button{
            width: 16rem;
        }
    </style>
</head>
<body>
    <h1>Register</h1>
    <form action="/register" method="POST">
        @csrf
        <label>
            <span>Username:</span>
            <input type="text" name="username" id="">
        </label>
        @error('username')
        <p class="err">{{ $message }}</p>
        @enderror
        <label>
            <span>Email:</span>
            <input type="text" name="email" id="">
        </label>
        @error('email')
        <p class="err">{{ $message }}</p>
        @enderror
        <label>
            <span>Password:</span>
            <input type="password" name="password" id="">
        </label>
        @error('password')
        <p class="err">{{ $message }}</p>
        @enderror
        <button>Register</button>
        <div x-data="{open: true}">
            <button @click="open = ! open">Toggle Content</button>
            @if (session()->has("success"))
            <p>{{session("success")}}</p>
            @endif
        </div>
    </form>
</body>
</html>