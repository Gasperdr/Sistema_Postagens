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
    <title>Document</title>
</head>
<body>
    <div id="app">
    <new-password
  action-url="{{ route('senha.nova') }}"
  csrf-token="{{ csrf_token() }}"
  token="{{ $token }}"
  email="{{ $email }}"
></new-password>
    </div>
</body>
</html>