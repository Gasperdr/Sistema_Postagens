<form method="POST" action="{{ route('link.senha') }}">
    @csrf
    <input type="email" name="email" placeholder="Digite seu e-mail" required>
    <button type="submit">Enviar link de recuperação</button>
</form>