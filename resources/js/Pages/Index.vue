<script setup>
import {defineProps, ref} from 'vue';
import Card from "@/Pages/Exercises/Card.vue";
import Layout from "@/Layouts/Layout.vue";
import { Link } from '@inertiajs/vue3';


const props = defineProps({
  fields: Object,
  exercises: Object
});

console.log("exercises component");
console.log("exercises.links", props.exercises.links);

// const ascendente = ref(false);
// const fieldOrder = ref(Object.keys(props.fields[0]));

// {{ascendente ? "(flecha hacia arriba" : "flecha hacia abajo"}}

</script>

<template>
  <Layout>
    <div class="card bg-blue-100 p-6">
      <div class="flex flex-wrap gap-6 justify-center">
        <Card
            v-for="exercise in exercises.data"
            :key="exercise.id"
            :exercise="exercise"
        />
      </div>

      <nav class="flex justify-center gap-2 mt-4">
        <template v-for="(link, index) in exercises.links" :key="index">
          <Link
              v-if="link.url"
              :href="link.url"
              class="px-3 py-1 border"
              v-html="link.label"
          />
          <span
              v-else
              class="px-3 py-1 border opacity-50"
              v-html="link.label"
          />
        </template>
      </nav>
    </div>

  </Layout>
</template>

<style scoped>

</style>