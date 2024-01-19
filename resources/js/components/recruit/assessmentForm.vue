<template>
  <div class="d-flex align-center py-4">
    <div class="text-textmain w-30">評価入力</div>
    <o-auto
      v-if="store.assessments"
      :items="store.assessments"
      item-title="name"
      item-value="id"
    >
    </o-auto>
  </div>
  <div class="d-flex align-center py-4">
    <div class="text-textmain w-30">コメント</div>
    <o-area placeholder="評価に関してコメント"> </o-area>
  </div>
  <v-divider></v-divider>
  <div class="d-flex justify-space-evenly mt-5">
    <cancel-btn class="w-15" @click="close" />
    <save-btn class="w-15" />
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useScheduleStore } from "@/stores/scheduleStore";

const emit = defineEmits(["close"]);
const store = useScheduleStore();

const close = () => {
  emit("close");
};
</script>

<style scoped></style>
