<script setup>
import {Link, useForm} from "@inertiajs/vue3";
import Layout from "@/Layouts/Layout.vue";

const props = defineProps({
  exercise: Object
});


const form = useForm({
  name: props.exercise?.name || "",
  description: props.exercise?.description || "",
  time: props.exercise?.time || "",
  type: props.exercise?.type || "",
});

// Función para enviar el formulario
function submit() {
  console.log(form);
  form.post(route("exercises.store"), {
    onSuccess: () => {
      form.reset();
    }
  });
}
</script>

<template>
  <Layout>
  <div class="bg-blue-100 min-h-full flex flex-col justify-center items-center">
    <div class="flex flex-col bg-white p-6 rounded-2xl shadow-lg max-w-xl mx-auto my-8 space-y-4">

      <!-- Botón volver -->
      <Link :href="route('exercises.index')" class="flex items-center text-blue-600 hover:text-blue-800 font-medium mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        <span>Volver</span>
      </Link>

      <h2 class="text-2xl font-bold text-gray-800 text-center">¡Crea un nuevo ejercicio!</h2>
      <p class="text-gray-600 text-center">
        Crea un nuevo ejercicio para que otros entrenadores puedan usarlo en sus entrenamientos.
      </p>
      <p class="text-gray-500 text-sm text-center">
        Añade detalles claros sobre el ejercicio, como el nombre, la descripción, el tipo y la duración.
        Cuanta más información proporciones, más fácil será para otros entrenadores utilizarlo correctamente.
      </p>

      <!-- Formulario -->
      <form @submit.prevent="submit" class="bg-white p-5 rounded-2xl space-y-4">

        <!-- Nombre -->
        <div>
          <label for="name" class="block font-semibold">Nombre</label>
          <input
              id="name"
              type="text"
              name="name"
              v-model="form.name"
              class="input input-bordered w-full mt-1"
              required
              autofocus
          />
          <span v-if="form.errors.name" class="text-error text-sm mt-1">{{ form.errors.name }}</span>
        </div>

        <!-- Descripción -->
        <div>
          <label for="description" class="block font-semibold">Descripción</label>
          <input
              id="description"
              type="text"
              name="description"
              v-model="form.description"
              class="input input-bordered w-full mt-1"
          />
          <span v-if="form.errors.description" class="text-error text-sm mt-1">{{ form.errors.description }}</span>
        </div>

        <!-- Tiempo -->
        <div>
          <label for="time" class="block font-semibold">Tiempo (en minutos)</label>
          <input
              id="time"
              type="number"
              min="0"
              name="time"
              v-model="form.time"
              class="input input-bordered w-full mt-1"
          />
          <span v-if="form.errors.time" class="text-error text-sm mt-1">{{ form.errors.time }}</span>
        </div>

        <!-- Tipo -->
        <div>
          <label for="type" class="block font-semibold">Tipo</label>
          <input
              id="type"
              type="text"
              name="type"
              v-model="form.type"
              class="input input-bordered w-full mt-1"
          />
          <span v-if="form.errors.type" class="text-error text-sm mt-1">{{ form.errors.type }}</span>
        </div>

        <!-- Botón crear -->
        <div class="flex justify-center pt-4">
          <button type="submit" class="btn btn-primary" :class="{ 'btn-disabled loading': form.processing }">
            Crear
          </button>
        </div>

      </form>
    </div>
  </div>
  </Layout>
</template>

<style scoped>
/* Puedes agregar estilos extra aquí si quieres */
</style>
