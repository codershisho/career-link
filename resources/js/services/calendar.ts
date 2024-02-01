import axios from "axios";

const CalendarApiService = {
  search: async () => {
    return await axios.get(`api/career-link/calendars`);
  },
};

export default CalendarApiService;
