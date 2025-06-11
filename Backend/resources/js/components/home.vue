<template>
  <div class="min-h-screen bg-stone-300">
  <header class="bg-stone-300 shadow-lg">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        </div>
      <PopoverGroup class="hidden lg:flex lg:gap-x-12">     
      </PopoverGroup>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="/login" class="text-xl font-semibold text-white ">Log in <span aria-hidden="true">&rarr;</span></a> 
        <a href="/login"><span class="flex items-center space-x-1"><span class="text-xl font-semibold text-white ml-10" >Sair</span><i class="material-icons text-xs/4 text-white">logout</i>
</span></a>  
      </div>
    </nav>
    <Dialog class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
      <div class="fixed inset-0 z-50" />
      <DialogPanel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="" />
          </a>
          <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = false">
            <span class="sr-only">Close menu</span>
            <XMarkIcon class="size-6" aria-hidden="true" />
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
              <Disclosure as="div" class="-mx-3" v-slot="{ open }">
                <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">
                  Product
                  <ChevronDownIcon :class="[open ? 'rotate-180' : '', 'size-5 flex-none']" aria-hidden="true" />
                </DisclosureButton>
                <DisclosurePanel class="mt-2 space-y-2">
                  <DisclosureButton v-for="item in [...products, ...callsToAction]" :key="item.name" as="a" :href="item.href" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">{{ item.name }}</DisclosureButton>
                </DisclosurePanel>
              </Disclosure>
              <a href="/admin/create" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Criar Post</a>
            </div>
            <div class="py-6">
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log in</a>
            </div>
          </div>
        </div>
      </DialogPanel>
    </Dialog>
  </header>
  <div class="container mx-auto p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <div
        v-for="post in postagens"
        :key="post.id"
        class="max-w-sm rounded overflow-hidden shadow-lg bg-stone-200"
      >
        <img class="w-full" :src="post.imagem" alt="Imagem">
        <button
  @click="irParaEditar(post.id)"
  class="bg-stone-500 hover:bg-stone-900 text-white font-bold py-2 px-4 rounded-full mt-2 ml-2"
>
  Editar
</button>
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2 text-stone-800">{{ post.titulo }}</div>
          <p class="text-stone-700 text-base">
            {{ limitarDescricao(post.descricao) }}
          </p>
        </div>
      </div>
    </div>
  </div>
  <button class="fixed bottom-18 right-18 bg-stone-900 text-white px-4 py-2 rounded-full shadow-lg hover:bg-stone-700">
    <a href="/admin/create"><span class="flex items-center space-x-1"><i class="material-icons text-white">add</i>
      <span class="text-xl font-ligth text-white" >Criar Post</span>
</span></a>
</button>
  </div>

</template> 

<script setup>

import { ref, onMounted } from 'vue';
import axios from 'axios';

const postagens = ref([]);


const limitarDescricao = (texto) => {
  return texto.length > 75 ? texto.substring(0, 75) + '...' : texto;
};

onMounted(async () => {
  try {
    const { data } = await axios.get('/api/postagens');
    postagens.value = data;
  } catch (error) {
    postagens.value = []; 
  }
});

function irParaEditar(id) {
  window.location.href = `/post/${id}/edit`;
}

import {
  Dialog,
  DialogPanel,
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Popover,
  PopoverButton,
  PopoverGroup,
  PopoverPanel,
} from '@headlessui/vue'
import {
  ArrowPathIcon,
  Bars3Icon,
  ChartPieIcon,
  CursorArrowRaysIcon,
  FingerPrintIcon,
  SquaresPlusIcon,
  XMarkIcon,
} from '@heroicons/vue/24/outline'
import { ChevronDownIcon, PhoneIcon, PlayCircleIcon } from '@heroicons/vue/20/solid'

const callsToAction = [
  { name: 'Watch demo', href: '#', icon: PlayCircleIcon },
  { name: 'Contact sales', href: '#', icon: PhoneIcon },
]

const mobileMenuOpen = ref(false)
</script>

<style>

</style>