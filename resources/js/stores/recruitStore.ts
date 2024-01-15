import { defineStore } from "pinia";
import { default as service } from "@/services/recruit";
import { Recruit } from "@/types/recruitTypes";

export const useRecruitStore = defineStore("recruit", {
  state: () => ({
    _recruits: [] as Recruit[],
  }),

  getters: {
    recruits: (state) => state._recruits,
  },

  actions: {
    async search() {
      const res = await service.searchRecruits();
      this._recruits = res.data;
    },
  },
});
