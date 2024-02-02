<template>
  <v-card flat class="pa-4">
    <div class="pa-2 text-textmain">{{ props.title }}</div>
    <slot name="conditions" />
    <slot name="graph" />
  </v-card>
</template>

<script setup lang="ts">
const props = defineProps({
  title: {
    type: String,
    required: true,
  },
});
</script>
