@extends('master')
@section('content')

@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Recuperar Senha</title>
</head>
<body>
 <div id="app">
    <form-reset-password
  action-url="{{ route('link.senha') }}"
  csrf-token="{{ csrf_token() }}"
></form-reset-password>
 </div>
</body>
</html>
