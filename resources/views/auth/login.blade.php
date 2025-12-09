<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>RecipeHome</title>
  @vite(['resources/css/app.css'])
  <style> .card{max-width:420px;margin:6rem auto;padding:2rem;background:var(--card-bg,#fff);border-radius:8px;box-shadow:0 6px 20px rgba(0,0,0,.06)} html.dark .card{background:#111}</style>
</head>
<body>
  <div class="card">
    <h2>Sign in</h2>
    @if($errors->any())
      <div style="color:#c53030;margin-bottom:1rem;">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
      @csrf
      <div style="margin-bottom:0.75rem;">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required style="width:100%;padding:.5rem;border:1px solid #ddd;border-radius:4px;margin-top:.25rem;">
      </div>

      <div style="margin-bottom:0.75rem;">
        <label>Password</label>
        <input type="password" name="password" required style="width:100%;padding:.5rem;border:1px solid #ddd;border-radius:4px;margin-top:.25rem;">
      </div>

      <div style="display:flex;gap:.5rem;align-items:center;">
        <button class="btn-primary" type="submit">Sign in</button>
        <a href="{{ route('register') }}" style="margin-left:auto;text-decoration:none;color:var(--orange);font-weight:600">Create account</a>
      </div>
    </form>
  </div>
</body>
</html>
