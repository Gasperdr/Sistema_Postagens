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
   <div>
    <nav>
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="{{{route('login.form')}}}">Login</a></li>
        <li><a href="{{route('login.create')}}">registro</a></li>    
      </ul>
    </div>
  </nav>
   </div>

   <div class="row container">
     
    @foreach ($postagens as $postagem)
     <div class="col s12 m4">
      <div class="card" style="height: 600px">
        <div class="card-image">
          <img src="{{ $postagem->imagem }}" width="400" height="400">
          
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
        </div>
        <div class="card-content">
            <span class="card-title">{{$postagem->titulo}}</span>
          <p>{{Str::limit($postagem->descricao, 75)}}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>

    


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>