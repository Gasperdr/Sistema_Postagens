<template>
  <div class="min-h-screen flex items-center justify-center bg-stone-200">
    <div class="w-full max-w-xs">
      <form @submit.prevent="cadastrarPost" class="bg-stone-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-bold text-center mb-4">Cadastrar Postagem</h2>


        <div v-if="errors.length" class="mb-4 text-red-600 text-sm">
          <ul class="list-disc list-inside">
            <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
          </ul>
        </div>


        <div class="mb-4">
          <label class="block text-stone-700 text-sm font-bold mb-2" for="titulo">
            Título
          </label>
          <input
            v-model="form.titulo"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-stone-600 leading-tight focus:outline-none focus:shadow-outline"
            id="titulo"
            type="text"
            required
          />
        </div>

    
        <div class="mb-4">
          <label class="block text-stone-700 text-sm font-bold mb-2" for="descricao">
            Descrição
          </label>
          <input
            v-model="form.descricao"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-stone-600 leading-tight focus:outline-none focus:shadow-outline"
            id="descricao"
            type="text"
            required
          />
        </div>

     
        <div class="mb-6">
          <label class="block text-stone-700 text-sm font-bold mb-2" for="imagem">
            URL da Imagem
          </label>
          <input
            v-model="form.imagem"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-stone-600 leading-tight focus:outline-none focus:shadow-outline"
            id="imagem"
            type="text"
            placeholder="https://exemplo.com/imagem.jpg"
            required
          />
        </div>

    
        <div class="flex items-center justify-between">
          <button
            type="submit"
            class="bg-stone-500 hover:bg-stone-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          >
            Cadastrar
          </button>
          <a
            href="/home"
            class="inline-block align-baseline font-bold text-sm text-stone-500 hover:text-red-600"
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
  name: 'CriarPost',
  data() {
    return {
      form: {
        titulo: '',
        descricao: '',
        imagem: ''
      },
      errors: []
    }
  },
  methods: {
    async cadastrarPost() {
      this.errors = []

      try {
        await axios.post('/post', this.form, {
          headers: {
            'X-CSRF-TOKEN': document
              .querySelector('meta[name="csrf-token"]')
              .getAttribute('content')
          }
        })

        window.location.href = '/home'
      } catch (error) {
        if (error.response && error.response.status === 422) {
          const serverErrors = error.response.data.errors
          this.errors = Object.values(serverErrors).flat()
        } else {
          console.error(error)
          alert('Erro ao cadastrar a postagem.')
        }
      }
    }
  }
}
</script>