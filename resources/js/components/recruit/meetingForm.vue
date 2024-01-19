<template>
  <div class="d-flex align-center py-4">
    <div class="text-textmain w-30">日程選択</div>
    <VueDatePicker
      locale="ja"
      teleport-center
      :month-change-on-scroll="false"
      time-picker-inline
      minutes-increment="15"
      :start-time="startTime"
    ></VueDatePicker>
  </div>
  <v-divider></v-divider>
  <div class="d-flex justify-space-evenly mt-5">
    <cancel-btn class="w-15" @click="close" />
    <save-btn class="w-15" />
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useScheduleStore } from "@/stores/scheduleStore";

const emit = defineEmits(["close"]);
const store = useScheduleStore();
const startTime = ref({ hours: 9, minutes: 0 });

const close = () => {
  emit("close");
};
</script>

<style scoped></style>
