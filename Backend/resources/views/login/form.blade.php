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
    <title>Login</title>
</head>
<body>
    <div id="app">
  <login
    login-url="{{ route('login.auth') }}"
    csrf-token="{{ csrf_token() }}"
    erro="{{ Session::get('erro') }}"
    :validation-errors='@json($errors->all())'
    :routes='@json([
      "cadastrar" => route("login.create"),
      "recuperarSenha" => route("auth.senha")
    ])'
  ></login>
</div>
</body>
</html>
