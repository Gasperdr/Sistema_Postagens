<template>
  <div class="min-h-screen flex items-center justify-center bg-stone-200">
    <div class="w-full max-w-sm">
      <form @submit.prevent="login" class="bg-stone-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-bold text-center mb-4">Login</h2>

       
        <div v-if="erro" class="mb-4 text-red-600 text-sm text-center">
          {{ erro }}
        </div>

    
        <div v-if="validationErrors.length" class="mb-4 text-red-600 text-sm">
          <ul>
            <li v-for="(e, index) in validationErrors" :key="index">{{ e }}</li>
          </ul>
        </div>

        <div class="mb-4">
          <label class="block text-stone-700 text-sm font-bold mb-2" for="email">
            Email
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-stone-600 leading-tight focus:outline-none focus:shadow-outline"
            id="email"
            type="email"
            v-model="form.email"
            required
          />
        </div>

        <div class="mb-4">
          <label class="block text-stone-700 text-sm font-bold mb-2" for="password">
            Senha
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-stone-600 leading-tight focus:outline-none focus:shadow-outline"
            id="password"
            type="password"
            v-model="form.password"
            required
          />
        </div>

        <div class="mb-4">
          <label class="inline-flex items-center text-stone-700 text-sm">
            <input
              type="checkbox"
              v-model="form.remember"
              class="form-checkbox text-stone-600"
            />
            <span class="ml-2">Lembrar-me</span>
          </label>
        </div>

        <div class="flex items-center justify-between mb-4">
          <button
            class="bg-stone-500 hover:bg-stone-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"
          >
            Entrar
          </button>
        </div>

        <div class="flex justify-between text-sm">
          <a class="text-stone-500 hover:text-stone-700 font-semibold" :href="routes.cadastrar">
            Cadastrar
          </a>
          <a class="text-stone-500 hover:text-stone-700 font-semibold" :href="routes.recuperarSenha">
            Esqueci minha Senha
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
  name: 'LoginForm',
  props: {
    loginUrl: String,
    csrfToken: String,
    erro: String,
    validationErrors: Array,
    routes: Object 
  },
  data() {
    return {
      form: {
        email: '',
        password: '',
        remember: false
      }
    }
  },
  methods: {
    async login() {
      try {
        await axios.post(this.loginUrl, this.form, {
          headers: {
            'X-CSRF-TOKEN': this.csrfToken
          }
        })

        window.location.href = '/home'
      } catch (error) {
        console.error(error)
        alert('Erro ao fazer login. Verifique suas credenciais.')
      }
    }
  }
}
</script>