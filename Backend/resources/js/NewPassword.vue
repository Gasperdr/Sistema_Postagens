<template>
  <div class="min-h-screen flex items-center justify-center bg-stone-200">
    <div class="w-full max-w-xs">
      <form @submit.prevent="enviarNovaSenha" class="bg-stone-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-bold text-center mb-4">Redefinir Senha</h2>

        <div v-if="sucesso" class="mb-4 bg-green-100 text-green-800 p-2 rounded text-sm text-center">
          ✅ Senha redefinida com sucesso! Redirecionando...
        </div>

        <div v-if="erro" class="mb-4 bg-red-100 text-red-800 p-2 rounded text-sm text-center">
          ❌ Erro ao redefinir a senha. Verifique os dados.
        </div>

        <div class="mb-4">
          <label class="block text-stone-700 text-sm font-bold mb-2" for="password">
            Nova Senha
          </label>
          <input
            v-model="password"
            type="password"
            id="password"
            placeholder="Nova senha"
            required
            class="shadow appearance-none border rounded w-full py-2 px-3 text-stone-600 leading-tight focus:outline-none focus:shadow-outline"
          />
        </div>

        <div class="mb-4">
          <label class="block text-stone-700 text-sm font-bold mb-2" for="password_confirmation">
            Confirmar Senha
          </label>
          <input
            v-model="passwordConfirmation"
            type="password"
            id="password_confirmation"
            placeholder="Confirme a nova senha"
            required
            class="shadow appearance-none border rounded w-full py-2 px-3 text-stone-600 leading-tight focus:outline-none focus:shadow-outline"
          />
        </div>

        <div class="flex items-center justify-between">
          <button
            type="submit"
            class="w-full bg-stone-500 hover:bg-stone-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          >
            Redefinir senha
          </button>
        </div>
      </form>

      <p class="text-center text-gray-500 text-xs">
        &copy;2025 Seu Projeto. Todos os direitos reservados.
      </p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    actionUrl: {
      type: String,
      required: true,
    },
    csrfToken: {
      type: String,
      required: true,
    },
    token: {
      type: String,
      required: true,
    },
    email: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      password: '',
      passwordConfirmation: '',
      sucesso: false,
      erro: false,
    };
  },
  methods: {
    async enviarNovaSenha() {
      this.sucesso = false;
      this.erro = false;

      try {
        await axios.post(
          this.actionUrl,
          {
            token: this.token,
            email: this.email,
            password: this.password,
            password_confirmation: this.passwordConfirmation,
          },
          {
            headers: {
              'X-CSRF-TOKEN': this.csrfToken,
            },
          }
        );

        this.sucesso = true;
        this.password = '';
        this.passwordConfirmation = '';


        setTimeout(() => {
          window.location.href = '/login';
        }, 2000);
      } catch (e) {
        this.erro = true;
        console.error(e);
      }
    },
  },
};
</script>