<template>
  <div class="min-h-screen flex items-center justify-center bg-stone-200">
    <div class="w-full max-w-xs">
      <form @submit.prevent="cadastrarUsuario" class="bg-stone-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-bold text-center mb-4">Cadastrar Usuário</h2>

   
        <div v-if="errors.length" class="mb-4 text-red-500 text-sm">
          <ul>
            <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
          </ul>
        </div>

  
        <div class="mb-4">
          <label class="block text-stone-700 text-sm font-bold mb-2" for="firstName">Nome</label>
          <input
            v-model="form.firstName"
            id="firstName"
            type="text"
            required
            class="shadow appearance-none border rounded w-full py-2 px-3 text-stone-600 leading-tight focus:outline-none focus:shadow-outline"
          />
        </div>

     
        <div class="mb-4">
          <label class="block text-stone-700 text-sm font-bold mb-2" for="lastName">Sobrenome</label>
          <input
            v-model="form.lastName"
            id="lastName"
            type="text"
            required
            class="shadow appearance-none border rounded w-full py-2 px-3 text-stone-600 leading-tight focus:outline-none focus:shadow-outline"
          />
        </div>

    
        <div class="mb-4">
          <label class="block text-stone-700 text-sm font-bold mb-2" for="email">Email</label>
          <input
            v-model="form.email"
            id="email"
            type="email"
            required
            class="shadow appearance-none border rounded w-full py-2 px-3 text-stone-600 leading-tight focus:outline-none focus:shadow-outline"
          />
        </div>

    
        <div class="mb-4">
          <label class="block text-stone-700 text-sm font-bold mb-2" for="password">Senha</label>
          <input
            v-model="form.password"
            id="password"
            type="password"
            required
            class="shadow appearance-none border rounded w-full py-2 px-3 text-stone-600 leading-tight focus:outline-none focus:shadow-outline"
          />
        </div>

    
        <div class="mb-6">
          <label class="block stone-700 text-sm font-bold mb-2" for="confirmPassword">Confirmar Senha</label>
          <input
            v-model="form.confirmPassword"
            id="confirmPassword"
            type="password"
            required
            class="shadow appearance-none border rounded w-full py-2 px-3 text-stone-600 leading-tight focus:outline-none focus:shadow-outline"
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
            :href="loginUrl"
            class="inline-block align-baseline font-bold text-sm text-stone-500 hover:text-stone-800"
          >
            Logar
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
  name: 'CadastroUsuario',
  props: {
    storeUrl: String,
    loginUrl: String
  },
  data() {
    return {
      form: {
        firstName: '',
        lastName: '',
        email: '',
        password: '',
        confirmPassword: ''
      },
      errors: []
    }
  },
  methods: {
    async cadastrarUsuario() {
      this.errors = []


      if (this.form.password !== this.form.confirmPassword) {
        this.errors.push('As senhas não coincidem.')
        return
      }

      try {
        await axios.post(this.storeUrl, this.form, {
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
        })

   
        window.location.href = '/home'
      } catch (error) {
        if (error.response?.status === 422) {
          const responseErrors = error.response.data.errors
          this.errors = Object.values(responseErrors).flat()
        } else {
          this.errors = ['Erro inesperado ao cadastrar.']
        }
      }
    }
  }
}
</script>