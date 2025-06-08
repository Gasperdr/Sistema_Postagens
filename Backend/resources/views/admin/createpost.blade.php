@if($errors->any())
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
</form>