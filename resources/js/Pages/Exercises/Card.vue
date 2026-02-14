<script setup>
import Swal from 'sweetalert2';

const props = defineProps({
  exercise: Object,
});

function confirmarBorrado(e) {
  e.preventDefault() // Evita el envío automático
  const button = e.currentTarget;
  const form = button.closest("form");

  Swal.fire({
    title: "¿Estás seguro?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, borrar",
      cancelButtonText: "Cancelar",
}).then((result) => {
    if (result.isConfirmed) {
      form.submit(); // Solo se envía si se confirma el borrado
    }
  });
}

</script>

<template>
  <div class="card w-96 bg-base-100 card-md shadow-sm">
    <div class="card-body shadow-lg hover:shadow-[0_10px_25px_rgba(0,0,0,0.25)] transition-shadow duration-300">
      <h2 class="card-title justify-center font-bold underline">{{ exercise.name }}</h2>
      <p class="text-center">{{ exercise.description }}</p>
      <p>Tiempo del ejercicio: <strong>{{ exercise.time }} min</strong></p>
      <p>Tipo de ejercicio: <strong>{{ exercise.type }}</strong></p>
      <div class="justify-end card-actions">
        <a :href="`/exercises/${exercise.id}/edit?page=${page}`">
          <button class="btn btn-primary">Editar</button>
        </a>
        <button @click="confirmarBorrado" class="btn btn-secondary bg-red-600 border-red-700">
          Borrar
        </button>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>