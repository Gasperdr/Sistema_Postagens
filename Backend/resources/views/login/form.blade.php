@if($mensagem = Session::get('erro'))
{{$mensagem}}
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif

<form  method="POST" action="{{route('login.auth')}}">
    @csrf

    Email: <br> <input type="email" name="email"> <br>
    Senha: <br> <input type="password" name="password"> <br>
    <br> <input type="checkbox" name="remember"> Lembrar-me 
    <br> <button type="submit"> Entrar</button>
</form>