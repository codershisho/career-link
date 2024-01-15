import axios from "axios";
import { ApiResponse } from "@/types/recruitTypes";

const RecruitApiService = {
  searchRecruits: async (): ApiResponse => {
    console.log("aaaa");
    return await axios.get("/api/recruits");
  },
};

export default RecruitApiService;
