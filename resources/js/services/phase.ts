import axios from "axios";

const PhaseApiService = {
  index: async () => {
    return await axios.get("/api/career-link/ms/phases");
  },
  show: async (id: number) => {
    return await axios.get("/api/career-link/ms/phases" + id);
  },
};

export default PhaseApiService;
