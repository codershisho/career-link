import axios from "axios";

const DocApiService = {
  search: async (id: number) => {
    return await axios.get(`api/career-link/recruits/${id}/docs/`);
  },
  upload: async (id: number, formData: FormData) => {
    return await axios.post(`api/career-link/recruits/${id}/docs/upload`, formData);
  },
};

export default DocApiService;
