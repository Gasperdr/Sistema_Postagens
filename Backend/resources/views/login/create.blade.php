@extends('../master')

@section('content')
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastro</title>
</head>
<body>
    <div id="app">
  <create-account
    store-url="{{ route('users.store') }}"
    login-url="{{ route('login.form') }}"
  ></create-account>
</div>

</body>
</html>

{{-- @if($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif

<form action="{{route('users.store')}}" method="POST">
    @csrf

    Nome: <br> <input type="text" name="firstName"> <br>

    Sobrenome: <br> <input type="text" name="lastName"> <br>

    Email: <br> <input type="email" name="email"> <br>
    
    Senha: <br> <input type="password" name="password"> <br>
    <button type="submit"> Cadastrar</button> <br>
    <a class="waves-effect waves-light btn" href="{{route('login.form')}}">Logar</a> <br>

</form> --}}