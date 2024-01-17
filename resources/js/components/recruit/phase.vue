<template>
  <v-card flat class="pa-4">
    <div class="d-flex align-center">
      <div class="w-10">
        <v-sheet width="100" height="100" color="grey">イメージ</v-sheet>
      </div>
      <div class="w-100">
        <span class="text-primary" style="font-size: 1.3rem">
          {{ recruitStore.recruit?.name }}
        </span>
        <span class="text-textmain"
          >（{{ recruitStore.recruit?.name_kana }}）</span
        >
        <v-divider class="my-2"></v-divider>
        <div class="d-flex align-center mt-5">
          <div class="d-flex align-center mr-auto">
            <div class="mr-2 text-textmain">希望部署</div>
            <v-chip
              v-for="(position, i) in recruitStore.recruit?.positions"
              :key="i"
              class="mr-2"
              color="info"
            >
              {{ position }}
            </v-chip>
          </div>
          <o-btn color="accent" variant="flat" @click="dialog = true">
            XXX 日程調整
          </o-btn>
        </div>
      </div>
    </div>
    <v-divider class="my-5"></v-divider>
    <div class="phases d-flex align-center justify-space-around">
      <div
        v-for="(schedule, i) in scheduleStore.schedules"
        :key="i"
        class="box rounded-lg"
      >
        <div class="bg-info title rounded-t-lg">{{ schedule.phase_name }}</div>
        <div class="bg-back date rounded-b-lg">
          <template v-if="schedule.start_datetime">
            <span class="pr-3">日程：</span>
            <span>{{ schedule.start_datetime }}</span>
          </template>
          <template v-else>
            <span class="pr-3">日程： 未定</span>
          </template>
        </div>
      </div>
    </div>
    <schedule v-model="dialog" @close="dialog = false" />
  </v-card>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useScheduleStore } from "@/stores/scheduleStore";
import { useRecruitStore } from "@/stores/recruitStore";
import schedule from "@/components/recruit/schedule.vue";

const scheduleStore = useScheduleStore();
const recruitStore = useRecruitStore();
const dialog = ref(false);

onMounted(async () => {
  await scheduleStore.searchSchedulesPhase();
  await scheduleStore.searchPhase();
});
</script>

<style scoped>
.phases > .box > div {
  width: 200px;
  height: 70px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.phases > .box > .title {
  color: white !important;
}
.phases > .box > .date {
  color: rgb(var(--v-theme-textmain)) !important;
}
</style>
