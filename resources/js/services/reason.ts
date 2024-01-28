import axios from "axios";
import { Master } from "@/types/mastersType";

const ReasonApiService = {
  index: async () => {
    return await axios.get("/api/career-link/ms/reasons");
  },
  show: async (id: number) => {
    return await axios.get("/api/career-link/ms/reasons" + id);
  },
  upsert: async (data: Master) => {
    return await axios.post("/api/career-link/ms/reasons", data);
  },
};

export default ReasonApiService;
