<template>
  <div>詳細</div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

const props = defineProps({
  id: String,
});

console.log(props.id);
</script>

<style scoped></style>
