<template>
  <v-dialog v-model="value" width="1000">
    <v-card class="py-4 px-8">
      <div>
        <div class="d-flex align-center">
          <div class="text-textmain f-xl mr-auto">面談日程登録</div>
          <v-icon color="tabbg" icon="mdi-close" @click="value = false" />
        </div>
        <v-divider class="my-2"></v-divider>
        <div class="w-50">
          <div class="d-flex align-center py-4">
            <div class="text-textmain w-30">対象フェーズ</div>
            <v-autocomplete
              density="compact"
              hide-details="auto"
              variant="outlined"
              :items="store.notYetPhase"
              item-title="name"
              item-value="id"
            ></v-autocomplete>
          </div>
          <div class="d-flex align-center py-4">
            <div class="text-textmain w-30">担当者</div>
            <v-autocomplete
              density="compact"
              hide-details="auto"
              variant="outlined"
              :items="[
                'California',
                'Colorado',
                'Florida',
                'Georgia',
                'Texas',
                'Wyoming',
              ]"
            ></v-autocomplete>
          </div>
        </div>
      </div>
      <v-divider class="mb-8 mt-4"></v-divider>
      <FullCalendar :options="options" />
    </v-card>
  </v-dialog>
</template>

<script setup lang="ts">
import { reactive, computed } from "vue";
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
import { useScheduleStore } from "@/stores/scheduleStore";

const props = defineProps(["modelValue"]);
const emit = defineEmits(["update:modelValue"]);
const value = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    emit("update:modelValue", value);
  },
});
const store = useScheduleStore();

const options = reactive({
  plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin, bootstrap5Plugin],
  initialView: "timeGridWeek",
  headerToolbar: {
    left: "prev,next,today",
    center: "title",
    right: "dayGridMonth,timeGridWeek",
  },
  editable: true,
  selectable: true,
  weekends: false,
  allDaySlot: false,
  slotDuration: "00:15",
  slotMinTime: "09:00:00",
  slotMaxTime: "18:00:00",
  locale: jaLocale,
  timeZone: "local",
  themeSystem: "bootstrap5",
  height: 650,
  contentHeight: 600,

  events: [
    {
      title: "test",
      start: "2024-01-18 10:00:00",
      end: "2024-01-18 12:00:00",
    },
  ],
  eventColor: "#378006",
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
</script>

<style scoped></style>
