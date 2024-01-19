<template>
  <v-autocomplete
    v-bind="$attrs"
    density="compact"
    hide-details="auto"
    variant="outlined"
    v-model="value"
  ></v-autocomplete>
</template>

<script setup lang="ts">
import { computed } from "vue";

const props = defineProps(["modelValue"]);
const emit = defineEmits(["update:modelValue"]);

const value = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    emit("update:modelValue", value);
  },
});
</script>
