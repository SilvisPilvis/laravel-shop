<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <h1>Login</h1>
    <form action="/login" method="POST">
        @csrf
        <label>
            <span>Username:</span>
            <input type="text" name="username" id="">
        </label>
        @error('username')
        <p class="err">{{ $message }}</p>
        @enderror
        <label>
            <span>Password:</span>
            <input type="password" name="password" id="">
        </label>
        @error('password')
        <p class="err">{{ $message }}</p>
        @enderror
        <button>Login</button>
    </form>
    @if (session()->has("success"))
      <div x-data="{ open: true }">
        <div x-show="open">
          <p>{{ session("success") }}</p>
          <button @click="open = false">Close</button>
        </div>
      </div>
    @endif
</body>
</html>