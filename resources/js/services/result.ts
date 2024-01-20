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
  storePhaseUser: async (id: number, phaseId: number, ids: number[] = []) => {
    const body = {
      phase_id: phaseId,
      ids: ids,
    };
    await axios.post(`/api/career-link/recruits/${id}/results/users`, body);
  },

  /**
   * 各フェーズの選考担当者の評価登録
   * @param id
   * @param body
   */
  storeResultPhaseUser: async (id: number, body: any) => {
    await axios.post(
      `/api/career-link/recruits/${id}/results/users/result`,
      body
    );
  },

  /**
   * 各フェーズの結果を検索
   * @param id
   */
  searchPhaseResults: async (id: number) => {
    return await axios.get(`/api/career-link/recruits/${id}/results/phases`);
  },

  /** 各フェーズの結果を登録 */
  storePhaseResult: async (id: number, body: any) => {
    await axios.post(`/api/career-link/recruits/${id}/results/phases`, body);
  },
};

export default ResultService;
