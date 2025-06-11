@extends('../master')

@section('content')
@endsection


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
  <Create-post /><Create-post />
</div>
</body>
</html>
{{-- @if($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif

<form action="{{route('post.store')}}" method="POST">
    @csrf

    Titulo: <br> <input type="text" name="titulo"> <br>

    descrição: <br> <input type="text" name="descricao"> <br>

    imagem: <br> <input type="imagem" name="imagem"> <br>    

    
    <button type="submit"> Cadastrar</button>
</form> --}}