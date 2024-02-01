import { ref } from "vue";
import { defineStore } from "pinia";
import { default as service } from "@/services/calendar";

interface Calendar {
  id: number;
  start: string;
  end: string;
  title: string;
}

export const useCalendarStore = defineStore("calendar", () => {
  const calendars = ref<Calendar[]>();

  const search = async () => {
    const res = await service.search();
    calendars.value = res.data;
  };

  return { calendars, search };
});
