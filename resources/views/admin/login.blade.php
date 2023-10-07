<form action="{{ route('admin.logged') }}" method="post">
    @csrf
    <input type="email" name="email" required> <br>
    <input type="password" name="password" required> <br>
    <button type="submit">Login</button>
</form>
