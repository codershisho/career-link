import { defineStore } from "pinia";
import { default as service } from "@/services/recruit";
import { Recruit } from "@/types/recruitTypes";

export const useRecruitStore = defineStore("recruit", {
  state: () => ({
    _recruits: [] as Recruit[],
    _recruit: {} as Recruit,
    _recruitId: 0,
  }),

  getters: {
    recruits: (state) => state._recruits,
    recruit: (state) => state._recruit,
    recruitId: (state) => state._recruitId,
  },

  actions: {
    async search() {
      const res = await service.searchRecruits();
      this._recruits = res.data;
    },
    async show() {
      const res = await service.showRecruit(this._recruitId);
      this._recruit = res.data;
    },
    setRecruitId(id: number) {
      this._recruitId = id;
    },
  },
});
