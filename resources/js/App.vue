<template>
  <div class="page">
    <p>{{ counter }}</p>
    <button @click="counter += 1">click!</button>
    <v-btn color="primary">aaaa</v-btn>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";

const counter = ref(0);
</script>
