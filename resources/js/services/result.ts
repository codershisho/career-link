import axios from "axios";

const ResultService = {
  /**
   * 応募者に応じた各フェーズの選考担当者の評価情報を検索
   * @param id 応募者ID
   */
  searchResultPhaseUsers: async (id: number) => {
    return await axios.get(`/api/career-link/recruits/${id}/results`);
  },

  /**
   * 各フェーズを担当する選考担当者の登録
   * @param id 応募者ID
   * @param ids 選考担当者userID
   */
  storeResultPhaseUser: async (
    id: number,
    phaseId: number,
    ids: number[] = []
  ) => {
    const body = {
      phase_id: phaseId,
      ids: ids,
    };
    await axios.post(`/api/career-link/recruits/${id}/results/users`, body);
  },
};

export default ResultService;
