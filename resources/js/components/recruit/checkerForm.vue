<template>
  <div class="d-flex align-center py-4">
    <div class="text-textmain w-30">担当者</div>
    <v-autocomplete
      density="compact"
      hide-details="auto"
      variant="outlined"
      :items="store.users"
      item-title="name"
      item-value="id"
    ></v-autocomplete>
  </div>
  <v-divider></v-divider>
  <div class="d-flex justify-space-evenly mt-5">
    <cancel-btn class="w-15" @click="close" />
    <save-btn class="w-15" />
  </div>
</template>

<script setup lang="ts">
import { useScheduleStore } from "@/stores/scheduleStore";

const emit = defineEmits(["close"]);
const store = useScheduleStore();

const close = () => {
  emit("close");
};
</script>

<style scoped></style>
