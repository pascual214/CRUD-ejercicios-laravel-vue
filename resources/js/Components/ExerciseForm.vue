<script setup>

import {useForm, router} from "@inertiajs/vue3";
const props = defineProps({exercise:Object|null });

const form = useForm({
  name:props.exercise?.name ?? "",
  description:props.exercise?.description ?? "",
  time:props.exercise?.time ?? 0,
  type:props.exercise?.type ?? "",
})
const submit = ()=>{
  if (props.exercise)
    form.put(route("exercises.update", props.exercise.id));
  else{
    console.log ("Estoy guardando");
    console.log(form);
    form.post(route("exercises.store"));
  }

}

</script>

<template>
  <div class="bg-blue-100 min-h-full flex flex-col justify-center items-center">
    <div class="flex flex-col bg-white p-6 rounded-2xl shadow-lg max-w-xl mx-auto my-8 space-y-4">

      <!-- Volver -->
      <a href="/exercises" class="flex items-center text-blue-600 hover:text-blue-800 font-medium mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        <span>Volver</span>
      </a>

      <h2 class="text-2xl font-bold text-gray-800 text-center">Editar ejercicio</h2>
      <p class="text-gray-600 text-center">Modifica los detalles de este ejercicio.</p>

      <!-- Formulario -->
      <form @submit.prevent="submit" class="bg-white p-5 rounded-2xl space-y-4">

        <!-- Nombre -->
        <div>
          <label for="name" class="block font-semibold mb-1">Nombre</label>
          <input
              id="name"
              type="text"
              name="name"
              v-model="form.name"
              required
              class="input input-bordered w-full"
          />
          <p v-if="form.errors.name" class="text-error text-sm mt-1">{{ form.errors.name }}</p>
        </div>

        <!-- Descripción -->
        <div>
          <label for="description" class="block font-semibold mb-1">Descripción</label>
          <input
              id="description"
              type="text"
              name="description"
              v-model="form.description"
              class="input input-bordered w-full"
          />
          <p v-if="form.errors.description" class="text-error text-sm mt-1">{{ form.errors.description }}</p>
        </div>

        <!-- Tiempo -->
        <div>
          <label for="time" class="block font-semibold mb-1">Tiempo (minutos)</label>
          <input
              id="time"
              type="number"
              min="0"
              name="time"
              v-model="form.time"
              class="input input-bordered w-full"
          />
          <p v-if="form.errors.time" class="text-error text-sm mt-1">{{ form.errors.time }}</p>
        </div>

        <!-- Tipo -->
        <div>
          <label for="type" class="block font-semibold mb-1">Tipo</label>
          <input
              id="type"
              type="text"
              name="type"
              v-model="form.type"
              class="input input-bordered w-full"
          />
          <p v-if="form.errors.type" class="text-error text-sm mt-1">{{ form.errors.type }}</p>
        </div>

        <!-- Botón -->
        <div class="flex justify-center pt-4">
          <button
              type="submit"
              class="btn btn-primary"
              :class="{ 'btn-disabled loading': form.processing }"
          >
            Guardar
          </button>
        </div>

      </form>
    </div>
  </div>
</template>


<style scoped>

</style>