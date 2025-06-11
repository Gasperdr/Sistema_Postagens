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
