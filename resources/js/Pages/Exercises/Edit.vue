<script setup>

import Layout from "@/Layouts/Layout.vue";
import ExerciseForm from "@/Components/ExerciseForm.vue";

const props = defineProps({exercise:Object})


</script>

<template>
  <Layout>
    <ExerciseForm :exercise="props.exercise"/>
  </Layout>

</template>

<style scoped>

</style>