<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Document</title>
</head>
<body>
  @csrf
   <div>
    <nav>
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="{{route('login.form')}}">Login</a></li>
        <li><a href="{{route('login.create')}}">registro</a></li>
        <button> <a href="{{ route('login.form')}}">Sair</a></button> 
      </ul>
    </div>
  </nav>
   </div>
   
  <a class="waves-effect waves-light btn" href="{{route('admin.create')}}">Cadastrar</a>
  
  @foreach ($post as $postagem)
    <div class="row">     
     <div class="col s12 m4">
      <div class="card" style="height: 600px">
        <div class="card-image">
          <img src="{{ $postagem->imagem }}" width="400" height="400">
          <span class="card-title">{{$postagem->titulo}}</span>   
          <a class="btn-floating halfway-fab waves-effect waves-light red" href="{{ route('post.edit', $postagem->id) }}"><i class="material-icons">edit</i></a>

        </div>
          <div class="card-content">
            <p>{{Str::limit($postagem->descricao, 75)}}</p>
          </div>
        </div>
      </div>
    </div>
  @endforeach


    


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>