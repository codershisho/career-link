import { ref } from "vue";
import { defineStore } from "pinia";
import { default as service } from "@/services/schedule";
import { default as pservice } from "@/services/phase";
import { Schedule, Phase } from "@/types/scheduleTypes";

export const useScheduleStore = defineStore("schedule", () => {
  const recruitId = ref(0);
  const schedules = ref<Schedule[] | null>(null);
  const phases = ref<Phase[] | null>(null);
  const notYetPhase = ref<Phase[] | null>(null);

  const setRecruitId = (id: number) => {
    recruitId.value = id;
  };

  const searchSchedulesPhase = async () => {
    const res = await service.searchSchedulesPhase(recruitId.value);
    schedules.value = res.data;
  };

  const searchPhase = async () => {
    const res = await pservice.index();
    phases.value = res.data;
    filterNotYetPhase();
  };

  const filterNotYetPhase = () => {
    // とりあえず、未スケジュールのフェーズをセットする
    const notYetPhases = schedules.value?.filter(
      (schedule) => schedule.start_datetime == null
    );
    // 条件に合致するデータの特定の要素（例: phase）だけを抽出する
    const notYetPhasesValues =
      notYetPhases?.map((schedule) => {
        return {
          id: schedule.phase_id,
          name: schedule.phase_name,
        };
      }) || [];

    notYetPhase.value = notYetPhasesValues;
  };

  return {
    recruitId,
    schedules,
    phases,
    notYetPhase,
    setRecruitId,
    searchSchedulesPhase,
    searchPhase,
  };
});
