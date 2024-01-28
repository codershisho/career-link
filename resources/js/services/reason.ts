import axios from "axios";

const ReasonApiService = {
  index: async () => {
    return await axios.get("/api/career-link/ms/reasons");
  },
  show: async (id: number) => {
    return await axios.get("/api/career-link/ms/reasons" + id);
  },
};

export default ReasonApiService;
