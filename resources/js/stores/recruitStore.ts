import { ref } from "vue";
import { defineStore } from "pinia";
import { default as service } from "@/services/recruit";
import { Recruit } from "@/types/recruitTypes";

export const useRecruitStore = defineStore("recruit", () => {
  const recruits = ref<Recruit[] | null>(null);
  const recruit = ref<Recruit | null>(null);
  const recruitId = ref(0);

  const setRecruitId = (id: number) => {
    recruitId.value = id;
  };

  const search = async () => {
    const res = await service.searchRecruits();
    recruits.value = res.data;
  };

  const show = async () => {
    const res = await service.showRecruit(recruitId.value);
    recruit.value = res.data;
  };

  return { recruits, recruit, recruitId, setRecruitId, search, show };
});
