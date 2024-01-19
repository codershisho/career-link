import axios from "axios";

const UserApiService = {
  index: async () => {
    return await axios.get("/api/career-link/ms/users");
  },
  show: async (id: number) => {
    return await axios.get("/api/career-link/ms/users" + id);
  },
};

export default UserApiService;
