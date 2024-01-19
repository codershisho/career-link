import axios from "axios";

const ScheduleService = {
  searchSchedulesPhase: async (id: number) => {
    return await axios.get(`/api/career-link/recruits/${id}/schedules`);
  },
};

export default ScheduleService;
