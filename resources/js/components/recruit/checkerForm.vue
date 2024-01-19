<template>
  <div class="d-flex align-center py-4">
    <div class="text-textmain w-30">担当者</div>
    <o-auto
      v-if="store.users"
      :items="store.users"
      multiple
      item-title="name"
      item-value="id"
      chips
      v-model="users"
    >
    </o-auto>
  </div>
  <v-divider></v-divider>
  <div class="d-flex justify-space-evenly mt-5">
    <cancel-btn class="w-15" @click="close" />
    <save-btn
      class="w-15"
      :disabled="!users?.length"
      @click="storePhaseUsers"
    />
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
  service.storeResultPhaseUser(
    store.recruitId,
    store.selectedPhaseId,
    users.value
  );
}
</script>

<style scoped></style>
