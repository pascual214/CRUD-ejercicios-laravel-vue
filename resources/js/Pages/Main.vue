<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import Cronometro from "@/Pages/Cronometro.vue";
import {Link, usePage} from "@inertiajs/vue3";
import {computed, ref} from "vue";
import Modal from "../../../vendor/laravel/breeze/stubs/inertia-vue-ts/resources/js/Components/Modal.vue";
import Login from "../../../vendor/laravel/breeze/stubs/inertia-vue-ts/resources/js/Pages/Auth/Login.vue";
import CardOption from "@/Pages/Exercises/CardOption.vue";
import Register from "../../../vendor/laravel/breeze/stubs/inertia-vue-ts/resources/js/Pages/Auth/Register.vue";

// Recomendado usar computed
const user = computed(() => usePage().props.auth.user);
const props = defineProps({CardOption: Object});


const activeModal = ref<'login' | 'register' | null>(null)

function openModal(type: 'login' | 'register') {
  activeModal.value = type
}

</script>

<template>
  <Layout @open-modal="openModal">

    <!-- Si el usuario está autenticado -->
    <div v-if="user" class="mt-10 mb-10">
      <h2 class="mb-6 px-6 text-3xl font-bold text-center">
        Funcionalidades del proyecto
      </h2>
      <div class="grid gap-6 px-6 sm:grid-cols-3 justify-items-center">

        <CardOption v-for="card in props.CardOption" :key="card.title"
                    :title="card.title"
                    :description="card.description"
                    :action="card.action"
                    :img="card.img"
        />

      </div>
    </div>


    <!-- Si el usuario no está autenticado -->
    <div v-else>
      <div
          class="hero min-h-screen"
          style="background-image: url('/images/pizarra.png');"
      >
        <div class="hero-overlay"></div>
        <div class="hero-content text-neutral-content text-center">
          <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
            <p class="mb-5">
              Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
              quasi. In deleniti eaque aut repudiandae et a id nisi.
            </p>
            <button class="btn btn-primary">Empezar</button>
          </div>
        </div>
      </div>
    </div>

    <Modal :show="activeModal === 'login'" @close="activeModal = null">
      <Login />
    </Modal>

    <Modal :show="activeModal === 'register'" @close="activeModal = null">
      <Register />
    </Modal>

  </Layout>

</template>

<style scoped>

</style>