<form method="POST" action="{{ route('register') }}">
    @csrf

    <label for="name">Nome:</label>
    <input type="text" name="name" required minlength="3" maxlength="50">

    <label for="email">E-mail:</label>
    <input type="email" name="email" required>

    <label for="password">Senha:</label>
    <input type="password" name="password" required minlength="6" maxlength="20">

    <label for="password_confirmation">Confirmação de Senha:</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Registrar</button>
</form>