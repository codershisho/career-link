import { ref } from "vue";
import { defineStore } from "pinia";
import { default as service } from "@/services/schedule";
import { Schedule } from "@/types/scheduleTypes";

export const useScheduleStore = defineStore("schedule", () => {
  const recruitId = ref(0);
  const schedules = ref<Schedule[] | null>(null);

  const setRecruitId = (id: number) => {
    recruitId.value = id;
  };

  const searchSchedulesPhase = async () => {
    const res = await service.searchSchedulesPhase(recruitId.value);
    schedules.value = res.data;
  };

  return { recruitId, schedules, setRecruitId, searchSchedulesPhase };
});
