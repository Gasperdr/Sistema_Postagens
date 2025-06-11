<template>
  <div class="min-h-screen bg-stone-200">
    <!-- Formulário oculto de logout -->
    <form id="logout-form" action="/logout" method="POST" style="display:none;">
      <input type="hidden" name="_token" :value="csrfToken" />
    </form>

    <!-- Header -->
    <header class="bg-stone-200 shadow-lg">
  <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">

    <!-- Div esquerda: agora com o span -->
    <div class="flex lg:flex-1">
      <template v-if="usuario">
        <span class="text-4xl font-semibold text-stone-800">
         <h1> Olá, {{ usuario.firstName }} {{ usuario.lastName }} </h1>
        </span>
      </template>
    </div>

    <!-- Menu direita -->
    <div class="hidden lg:flex lg:flex-1 lg:justify-end space-x-6">
      <template v-if="!usuario">
        <a href="/login" class="text-xl font-semibold text-stone-800 hover:text-stone-600">Login</a>
        <a :href="routes.cadastrar" class="text-xl font-semibold text-stone-800 hover:text-stone-600">Cadastrar</a>
      </template>
      <template v-else>
        <button @click.prevent="logout" class="text-xl font-semibold text-red-800 hover:text-red-600">Sair</button>
      </template>
    </div>

  </nav>
</header>

    <!-- Conteúdo -->
    <div class="container mx-auto p-4">
      <div v-if="!usuario" class="mt-100 text-center text-4xl text-stone-700">
        Faça login para ver os posts.
      </div>

      <div v-else class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div
          v-for="post in postagensOrdenadas"
          :key="post.id"
          class="max-w-sm rounded overflow-hidden shadow-lg bg-stone-100 p-4 flex flex-col"
        >
          <img
            class="w-full h-[200px] object-cover rounded"
            :src="post.imagem"
            alt="Imagem"
          />

          <div class="flex-1 px-2 py-4 flex flex-col">
  <h2 class="font-bold text-xl mb-1 text-stone-800">{{ post.titulo }}</h2>

  <p class="text-stone-700 text-base">
    {{ limitarDescricao(post.descricao) }}
  </p>

  <!-- Rodapé com autor e data no fim -->
  <div class="mt-auto pt-4">
    <p class="text-sm text-stone-600 flex items-center justify-between">
      <!-- Grupo esquerda: ícone + nome -->
      <span class="flex items-center space-x-1">
        <i class="material-icons text-stone-800">person</i>
        <span>{{ post.autor.firstName }} {{ post.autor.lastName }}</span>
      </span>

      <!-- Grupo direita: ícone + data -->
      <span class="flex items-center space-x-1">
        <i class="material-icons text-stone-800 text-[6px]">calendar_month</i>
        <span>{{ formatarData(post.created_at) }}</span>
      </span>
    </p>
  </div>
</div>

          <div class="mt-auto px-2 pt-2" v-if="post.autor.id === usuario.id">
            <button
              @click="irParaEditar(post.id)"
              class="bg-stone-500 hover:bg-stone-700 text-white font-bold py-2 px-4 rounded w-full focus:outline-none focus:shadow-outline"
            >
              Editar
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Botão flutuante -->
    <button
      v-if="usuario"
      class="fixed bottom-8 right-8 bg-stone-600 text-white px-4 py-2 rounded-full shadow-lg hover:bg-stone-700 flex items-center space-x-1"
      @click="irParaCriar"
    >
      <i class="material-icons text-white">add</i>
      <span class="text-xl font-light">Criar Post</span>
    </button>
  </div>
</template>

<script>
export default {
  name: 'HomePage',
  props: {
    postagens: {
      type: Array,
      default: () => [],
    },
    usuario: {
      type: Object, // null se não estiver logado
      default: null,
    },
    routes: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      csrfToken: document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
    };
  },
  methods: {
    limitarDescricao(texto) {
      return texto.length > 75 ? texto.slice(0, 72) + '...' : texto;
    },
    irParaEditar(id) {
      window.location.href = `/post/${id}/edit`;
    },
    irParaCriar() {
      window.location.href = this.routes.criar;
    },
    logout() {
      const form = document.getElementById('logout-form');
      if (form) form.submit();
    },
    formatarData(dataISO) {
      const date = new Date(dataISO);
      return date.toLocaleDateString('pt-BR', {
        day: '2-digit',
        month: 'short',
        year: 'numeric',
      });
    },
  },
  computed: {
  postagensOrdenadas() {
    if (!this.usuario) return this.postagens;

    const meusPosts = this.postagens.filter(post => post.autor.id === this.usuario.id);
    const outrosPosts = this.postagens.filter(post => post.autor.id !== this.usuario.id);

    return [...meusPosts, ...outrosPosts];
  },
},
};
</script>

<style>
@import url('https://fonts.googleapis.com/icon?family=Material+Icons');
</style>
