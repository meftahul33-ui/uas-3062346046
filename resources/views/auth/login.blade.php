<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>body{font-family:inter,system-ui,Arial,Helvetica,sans-serif;margin:2rem} .card{max-width:420px;margin:0 auto;padding:24px;border:1px solid #eee;border-radius:8px} label{display:block;margin-top:12px} input{width:100%;padding:8px;margin-top:6px;box-sizing:border-box} .error{color:#b91c1c;margin-top:8px}
    .hint{font-size:.9rem;color:#374151;margin-top:8px}
    </style>
</head>
<body>
    <div class="card">
        <h2>Login</h2>

        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf

            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus />

            <label for="password">Password</label>
            <input id="password" name="password" type="password" required />

            <label style="display:flex;align-items:center;margin-top:12px"><input type="checkbox" name="remember" style="margin-right:8px"> Remember me</label>

            <div style="margin-top:16px">
                <button type="submit">Sign in</button>
            </div>
        </form>

        <p class="hint">Test user: <strong>test@example.com</strong> / <strong>password</strong></p>
    </div>
</body>
</html>