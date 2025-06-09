<h2>Editar Postagem</h2>

@if (session('status'))
    <div>{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('post.update', $post->id) }}">
    @csrf
    @method('PUT')

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" value="{{ old('titulo', $post->titulo) }}" required> <br>

    <label for="descricao">descricao:</label>
    <textarea name="descricao" required>{{ old('descricao', $post->descricao) }}</textarea> <br>

    <label for="titulo">Imagem:</label>
    <input type="imagem" name="imagem" value="{{ old('imagem', $post->imagem) }}" required> <br>

    <button type="submit">Salvar</button>
</form>