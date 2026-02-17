<script setup lang="ts">

import {Link, usePage} from "@inertiajs/vue3";
import {computed} from "vue";
import {defineEmits} from "vue";

const user = computed(()=>usePage().props.auth.user);

// defineEmits sirve para declarar los eventos que un componente puede emitir hacia su componente padre.
const emit = defineEmits(['open-modal'])

</script>

<template>
  <div class="navbar bg-base-100 shadow-sm">
    <div class="flex-1 ml-6">
      <Link href="/">
        <img src="images/HoopLab_recortada.png" alt="Logo" class="h-16">
      </Link>
    </div>
    <div class="flex gap-4">

      <!-- Si estoy autenticado -->
      <div v-if="user" class="flex gap-4">
        <div class="dropdown dropdown-end">

          <!-- Implementar botones -->
        <Link href="logout" method="post" as="button" class="btn btn-primary">
          Logout
        </Link>

      </div>
        <div class="dropdown dropdown-end">
          <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
              <img
                  alt="Tailwind CSS Navbar component"
                  src="https://static.vecteezy.com/system/resources/thumbnails/008/442/086/small/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg" />
            </div>
          </div>
          <ul
              tabindex="-1"
              class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
            <li>
              <a class="justify-between">
                Profile
                <span class="badge">New</span>
              </a>
            </li>
            <li><a>Settings</a></li>
            <li><a>Logout</a></li>
          </ul>
        </div>
      </div>

      <!-- Si no estoy autenticado -->
      <div v-else class="flex gap-4 mr-6">
        <Link href="register">
          <button class="btn btn-outline btn-primary">
            Registrarse
          </button>
        </Link>


          <button class="btn btn-primary" @click="emit('open-modal')">
            Iniciar sesión
          </button>

      </div>
    </div>
  </div>
</template>

<style scoped>

</style>