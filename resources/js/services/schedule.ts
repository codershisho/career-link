import axios from "axios";

const ScheduleService = {
  searchSchedulesPhase: async (id: number) => {
    return await axios.get(`/api/career-link/recruits/${id}/schedules`);
  },
  storeSchedulePhase: async (id: number, body: any) => {
    return await axios.post(`api/career-link/recruits/${id}/schedules`, body);
  },
};

export default ScheduleService;
