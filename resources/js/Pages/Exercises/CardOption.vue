<script setup>

import {Link} from "@inertiajs/vue3";

const props = defineProps({img:String, title: String, description: String, action:String})


</script>

<template>
  <div class="card bg-base-100 w-96 shadow-sm">
    <figure class="px-10 pt-10">
      <img
          :src=props.img
          alt="Shoes"
          class="rounded-xl h-45"/>
    </figure>
    <div class="card-body items-center text-center">
      <h2 class="card-title">{{ props.title }}</h2>
      <p>{{ props.description }}</p>
      <div class="card-actions">
        <Link :href="props.action" as="button" class="btn btn-primary">
          Empezar
        </Link>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>