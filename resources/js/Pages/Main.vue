<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import Cronometro from "@/Pages/Cronometro.vue";
import {Link, usePage} from "@inertiajs/vue3";
import {computed, ref} from "vue";
import Modal from "../../../vendor/laravel/breeze/stubs/inertia-vue-ts/resources/js/Components/Modal.vue";
import Login from "../../../vendor/laravel/breeze/stubs/inertia-vue-ts/resources/js/Pages/Auth/Login.vue";

// Recomendado usar computed
const user = computed(() => usePage().props.auth.user);
const showLogin = ref(false);

</script>

<template>
  <Layout @open-modal="showLogin=true">

    <!-- Si el usuario está autenticado -->
    <div v-if="user">
      <h2 class="mb-6 px-6 text-3xl font-bold">
        Funcionalidades del proyecto
      </h2>
      <div class="grid gap-6 px-6 sm:grid-cols-3">
        <div class="card bg-base-100 w-96 shadow-sm">
          <figure class="px-10 pt-10">
            <img
                src="images/cronometro.avif"
                alt="Shoes"
                class="rounded-xl h-40"/>
          </figure>
          <div class="card-body items-center text-center">
            <h2 class="card-title">Cronometro</h2>
            <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
            <div class="card-actions">
              <Link href="crono">
                <button class="btn btn-primary">Empezar</button>
              </Link>
            </div>
          </div>
        </div>

        <div class="card bg-base-100 w-96 shadow-sm">
          <figure class="px-10 pt-10">
            <img
                src="images/entrenamiento-baloncesto.jpg"
                alt="Shoes"
                class="rounded-xl"/>
          </figure>
          <div class="card-body items-center text-center">
            <h2 class="card-title">Ejercicios</h2>
            <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
            <div class="card-actions">
              <Link href="/exercises" as="button" class="btn btn-primary">
                Empezar
              </Link>
            </div>
          </div>
        </div>

        <div class="card bg-base-100 w-96 shadow-sm">
          <figure class="px-10 pt-10">
            <img
                src="images/usuario_logo.jpg"
                alt="Shoes"
                class="rounded-xl h-40"/>
          </figure>
          <div class="card-body items-center text-center">
            <h2 class="card-title">Usuarios</h2>
            <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
            <div class="card-actions">
              <Link href="/exercises" as="button" class="btn btn-primary">
                Empezar
              </Link>
            </div>
          </div>
        </div>

        <div class="card bg-base-100 w-96 shadow-sm">
          <figure class="px-10 pt-10">
            <img
                src="images/entrenamiento-baloncesto.jpg"
                alt="Shoes"
                class="rounded-xl"/>
          </figure>
          <div class="card-body items-center text-center">
            <h2 class="card-title">Entrenadores</h2>
            <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
            <div class="card-actions">
              <Link href="/exercises" as="button" class="btn btn-primary">
                Empezar
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Si el usuario no está autenticado -->
    <div v-else>
      <div
          class="hero min-h-screen"
          style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);"
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

    <Modal :show="showLogin" @close="showLogin=false">
      <Login />
    </Modal>

  </Layout>
</template>

<style scoped>

</style>