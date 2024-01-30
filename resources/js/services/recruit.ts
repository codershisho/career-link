import axios from "axios";

const RecruitApiService = {
  searchRecruits: async () => {
    return await axios.get("/api/career-link/recruits");
  },
  showRecruit: async (id: number) => {
    return await axios.get("/api/career-link/recruits/" + id);
  },
  uploadImage: async (id: number, params: FormData) => {
    return await axios.post(`/api/career-link/recruits/${id}/image`, params);
  },
};

export default RecruitApiService;
