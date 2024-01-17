import axios from "axios";

const RecruitApiService = {
  searchRecruits: async () => {
    return await axios.get("/api/career-link/recruits");
  },
  showRecruit: async (id: number) => {
    return await axios.get("/api/career-link/recruits/" + id);
  },
};

export default RecruitApiService;
