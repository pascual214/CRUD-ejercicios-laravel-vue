<script setup lang="ts">
import Header from "@/Components/layouts/Header.vue";
import Footer from "@/Components/layouts/Footer.vue";
import { defineEmits } from "vue";

const emit = defineEmits(['open-modal'])

</script>

<template>
  <Header @open-modal="emit('open-modal')" />

  <slot />

  <Footer />
</template>

<style scoped>

</style>