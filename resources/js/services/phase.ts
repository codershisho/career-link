import axios from "axios";

const PhaseApiService = {
  index: async () => {
    return await axios.get("/api/career-link/phases");
  },
  show: async (id: number) => {
    return await axios.get("/api/career-link/phases" + id);
  },
};

export default PhaseApiService;
