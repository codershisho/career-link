import { ref } from "vue";
import { defineStore } from "pinia";
import { default as service } from "@/services/schedule";
import { default as pservice } from "@/services/phase";
import { default as uservice } from "@/services/user";
import { default as aservice } from "@/services/assessment";
import { default as rservice } from "@/services/result";
import {
  Schedule,
  Master,
  MasterAssessment,
  ResultPhaseUser,
} from "@/types/scheduleTypes";

export const useScheduleStore = defineStore("schedule", () => {
  const recruitId = ref(0);
  const schedules = ref<Schedule[] | null>(null);
  const phases = ref<Master[] | null>(null);
  const notYetPhase = ref<Master[] | null>(null);
  const users = ref<Master[] | null>(null);
  const assessments = ref<MasterAssessment[] | null>(null);
  const resultPhaseUsers = ref<ResultPhaseUser[] | null>(null);
  const selectedPhaseId = ref(0);

  const setRecruitId = (id: number) => {
    recruitId.value = id;
  };

  /** 選考結果タブで選択されたフェーズの情報保持 */
  const setPhaseId = (phaseId: number) => {
    selectedPhaseId.value = phaseId;
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

  /** マスタ検索 */
  const searchUsers = async () => {
    const res = await uservice.index();
    users.value = res.data;
  };

  /** マスタ検索 */
  const searchAssessments = async () => {
    const res = await aservice.index();
    assessments.value = res.data;
  };

  /** フェーズ毎の結果を検索 */
  const searchResultPhaseUsers = async () => {
    const res = await rservice.searchResultPhaseUsers(recruitId.value);
    resultPhaseUsers.value = res.data;
  };

  return {
    recruitId,
    schedules,
    phases,
    notYetPhase,
    users,
    assessments,
    resultPhaseUsers,
    selectedPhaseId,
    setRecruitId,
    setPhaseId,
    searchSchedulesPhase,
    searchPhase,
    searchUsers,
    searchAssessments,
    searchResultPhaseUsers,
  };
});
