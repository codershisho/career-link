import axios from "axios";

const AssessmentApiService = {
  index: async () => {
    return await axios.get("/api/career-link/ms/assessments");
  },
  show: async (id: number) => {
    return await axios.get("/api/career-link/ms/assessments" + id);
  },
};

export default AssessmentApiService;
