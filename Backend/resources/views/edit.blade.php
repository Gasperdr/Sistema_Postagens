@extends('master')
@section('content')
@endsection
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
    <Edit
    :post='@json($post)'
    update-url="{{ route('post.update', $post->id) }}"
    status-message="{{ session('status') }}"
></Edit>
</div>
</body>
</html>


