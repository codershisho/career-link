import axios from "axios";

const UserApiService = {
  index: async () => {
    return await axios.get("/api/career-link/ms/users");
  },
  show: async (id: number) => {
    return await axios.get("/api/career-link/ms/users" + id);
  },
  upsert: async (params: any) => {
    const formData = new FormData();
    // キーと値をFormDataに追加
    Object.keys(params).forEach((key) => {
      formData.append(key, params[key]);
    });
    return await axios.post("/api/career-link/ms/users", formData);
  },
};

export default UserApiService;
