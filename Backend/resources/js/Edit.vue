<template>
  <div class="min-h-screen flex items-center justify-center bg-stone-200">
  <div class="w-full max-w-xs">
    <form @submit.prevent="atualizarPost" class="bg-stone-100 shadow-md rounded px-8 pt-6 pb-8 mb-4 text-stone-900">
      <h2 class="text-xl font-bold text-center mb-4">Editar Postagem</h2>

      <div v-if="statusMessage" class="mb-4 text-green-800 text-sm text-center">
        {{ statusMessage }}
      </div>

      <div class="mb-4">
        <label class="block text-stone-700 text-sm font-bold mb-2" for="titulo">
          Título
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-600 leading-tight focus:outline-none focus:shadow-outline"
          id="titulo"
          type="text"
          v-model="form.titulo"
          required
        />
      </div>

      <div class="mb-4">
        <label class="block text-stone-700 text-sm font-bold mb-2" for="descricao">
          Descrição
        </label>
        <textarea
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-600 leading-tight focus:outline-none focus:shadow-outline"
          id="descricao"
          v-model="form.descricao"
          required
        ></textarea>
      </div>

      <div class="mb-6">
        <label class="block text-stone-700 text-sm font-bold mb-2" for="imagem">
          Imagem
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-600 leading-tight focus:outline-none focus:shadow-outline"
          id="imagem"
          type="text"
          v-model="form.imagem"
          required
        />
      </div>

      <div class="flex items-center justify-between">
        <button
          class="bg-stone-500 hover:bg-stone-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          type="submit"
        >
          Salvar
        </button>
        <a
          class="inline-block align-baseline font-bold text-sm text-stone-500 hover:text-red-600"
          href="/home"
        >
          Cancelar
        </a>
      </div>
    </form>

    <p class="text-center text-gray-500 text-xs">
      &copy;2025 Seu Projeto. Todos os direitos reservados.
    </p>
  </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'EditarPost',
  props: {
    post: Object,
    updateUrl: String,
    statusMessage: String
  },
  data() {
    return {
      form: {
        titulo: this.post.titulo || '',
        descricao: this.post.descricao || '',
        imagem: this.post.imagem || ''
      }
    }
  },
  methods: {
    async atualizarPost() {
      try {
        await axios.post(this.updateUrl, {
          _method: 'PUT',
          ...this.form
        }, {
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
        })

        // Redirecionar para /home
        window.location.href = '/home'
      } catch (error) {
        console.error(error)
        alert('Erro ao atualizar o post.')
      }
    }
  }
}
</script>