<template>
  <div class="d-flex align-center py-4">
    <div class="text-textmain w-30">担当者</div>
    <v-autocomplete
      v-if="store.users"
      v-model="users"
      :items="store.users"
      chips
      closable-chips
      color="blue-grey-lighten-2"
      item-title="name"
      item-value="id"
      density="compact"
      hide-details="auto"
      variant="outlined"
      multiple
    >
      <template v-slot:chip="{ props, item }">
        <v-chip v-bind="props" :prepend-avatar="item.raw.image" :text="item.raw.name"></v-chip>
      </template>

      <template v-slot:item="{ props, item }">
        <v-list-item
          v-bind="props"
          :prepend-avatar="item.raw.image"
          :title="item.raw.name"
        ></v-list-item>
      </template>
    </v-autocomplete>
  </div>
  <v-divider></v-divider>
  <div class="d-flex justify-space-evenly mt-5">
    <cancel-btn class="w-15" @click="close" />
    <save-btn class="w-15" :disabled="!users?.length" @click="storePhaseUsers" />
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useScheduleStore } from "@/stores/scheduleStore";
import { default as service } from "@/services/result";

const emit = defineEmits(["close"]);
const store = useScheduleStore();
const users = ref<number[]>();
const close = () => {
  emit("close");
};

/** 選考担当者の登録 */
async function storePhaseUsers() {
  await service.storePhaseUser(store.recruitId, store.selectedPhaseId, users.value);
  await store.searchResultPhaseUsers();
  close();
}
</script>

<style scoped></style>
