<!-- resources/views/admin/login.blade.php -->

<h1>Login Admin</h1>

@if(session('error'))
    <div style="color: red;">{{ session('error') }}</div>
@endif

<form method="post" action="{{ route('admin.login') }}">
    @csrf
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>
