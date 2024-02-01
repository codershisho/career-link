<template>
  <div class="ma-2 pa-4 h-100 bg-white rounded-lg">
    <FullCalendar :options="options" />
  </div>
</template>

<script setup lang="ts">
import { ref, reactive, onMounted, watch } from "vue";
import { useCalendarStore } from "@/stores/calendarStore";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-icons/font/bootstrap-icons.css";
import "@fullcalendar/core";
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
// import listPlugin from "@fullcalendar/list";
import interactionPlugin from "@fullcalendar/interaction";
import jaLocale from "@fullcalendar/core/locales/ja";
import bootstrap5Plugin from "@fullcalendar/bootstrap5";

const store = useCalendarStore();
const options = reactive({
  plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin, bootstrap5Plugin],
  initialView: "dayGridMonth",
  headerToolbar: {
    left: "prev,next,today",
    center: "title",
    right: "dayGridMonth,timeGridWeek",
  },
  editable: true,
  selectable: true,
  //   weekends: false,
  allDaySlot: false,
  // slotDuration: "00:15",
  slotMinTime: "09:00:00",
  slotMaxTime: "18:00:00",
  locale: jaLocale,
  timeZone: "local",
  themeSystem: "bootstrap5",
  height: "100%",
  contentHeight: 600,
  events: [
    {
      title: "test",
      start: "2024-02-18 10:00:00",
      end: "2024-02-18 12:00:00",
    },
  ],
  select: selectCal,
});

function selectCal(event: any) {
  console.log(event);
  const dateString = event.startStr;
  const dateObject = new Date(dateString);

  // 日本のタイムゾーンに変換
  const japanTime = dateObject.toLocaleString("ja-JP", {
    timeZone: "Asia/Tokyo",
  });

  console.log(japanTime);
  console.log(options.events);
}

onMounted(async () => {
  await store.search();
  options.events = store.calendars;
});
</script>

<style>
th.fc-day-sat {
  background-color: #eaf4ff;
}
th.fc-day-sun {
  background-color: #ffeaea;
}
th.fc-day-sat .fc-col-header-cell-cushion {
  color: blue;
}
th.fc-day-sun .fc-col-header-cell-cushion {
  color: red;
}
td.fc-day-sat {
  background-color: #eaf4ff;
}
td.fc-day-sun {
  background-color: #ffeaea;
}
.fc-col-header-cell-cushion {
  color: black;
}
.fc-daygrid-day-number {
  color: black;
}
td.fc-day-sat .fc-daygrid-day-number {
  color: blue;
}
td.fc-day-sun .fc-daygrid-day-number {
  color: red;
}
td.fc-timegrid-slot {
  height: 2.5em !important;
  border-bottom: 0 !important;
}
.fc-dayGridMonth-button,
.fc-timeGridWeek-button {
  background-color: #1bbc9c5b !important;
  border-color: #1bbc9c5b !important;
  color: white !important;
}
.fc-dayGridMonth-button.active,
.fc-timeGridWeek-button.active {
  background-color: #1bbc9c !important;
  border-color: #1bbc9c !important;
  color: white !important;
}

.fc-prev-button,
.fc-next-button,
.fc-today-button {
  background-color: #1bbc9c !important;
  border-color: #1bbc9c !important;
  color: white !important;
}
</style>
