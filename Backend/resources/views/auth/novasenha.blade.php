<form method="POST" action="{{ route('senha.nova') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">

    <input type="password" name="password" placeholder="Nova senha" required>
    <input type="password" name="password_confirmation" placeholder="Confirme a nova senha" required>
    <button type="submit">Redefinir senha</button>
</form>