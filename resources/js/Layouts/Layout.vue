<script setup lang="ts">
import Header from "@/Components/layouts/Header.vue";
import Footer from "@/Components/layouts/Footer.vue";
import { defineEmits } from "vue";

const emit = defineEmits<{
  (e: 'open-modal', type: 'login' | 'register'): void
}>()


</script>

<template>
  <Header @open-modal="(type) => emit('open-modal', type)" />

  <slot />

  <Footer />
</template>

<style scoped>

</style>