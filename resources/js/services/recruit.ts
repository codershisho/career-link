import axios from "axios";
import { ApiResponse } from "@/types/recruitTypes";

const RecruitApiService = {
  searchRecruits: async () => {
    return await axios.get("/api/career-link/recruits");
  },
  showRecruit: async (id: number) => {
    return await axios.get("/api/career-link/recruits/" + id);
  },
};

export default RecruitApiService;
