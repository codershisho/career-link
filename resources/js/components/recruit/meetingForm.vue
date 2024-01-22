<template>
  <div style="min-height: 400px">
    <div class="d-flex align-center py-4">
      <div class="text-textmain w-30">日程選択</div>
      <div class="date-picker d-flex">
        <VueDatePicker
          v-if="store.schedules"
          locale="ja"
          :month-change-on-scroll="false"
          time-picker-inline
          minutes-increment="15"
          week-start="0"
          :start-time="startTime"
          format="yyyy-MM-dd HH:mm:ss"
          model-type="yyyy-MM-dd HH:mm:ss"
          select-text="選択"
          cancel-text="ｷｬﾝｾﾙ"
          now-button-label="現在を選択"
          :day-class="getDayClass"
          v-model="store.schedules[store.selectedPhaseId - 1].start_datetime"
        ></VueDatePicker>
        <div class="mx-5 pt-2 text-textmain">～</div>
        <VueDatePicker
          v-if="store.schedules"
          locale="ja"
          :month-change-on-scroll="false"
          time-picker-inline
          minutes-increment="15"
          week-start="0"
          :start-time="startTime"
          format="yyyy-MM-dd HH:mm:ss"
          model-type="yyyy-MM-dd HH:mm:ss"
          select-text="選択"
          cancel-text="ｷｬﾝｾﾙ"
          now-button-label="現在を選択"
          :day-class="getDayClass"
          v-model="store.schedules[store.selectedPhaseId - 1].end_datetime"
        ></VueDatePicker>
      </div>
    </div>
    <div class="d-flex align-center py-4">
      <div class="text-textmain w-30">メモ</div>
      <o-area
        placeholder="メモ"
        v-model="store.schedules[store.selectedPhaseId - 1].description"
      >
      </o-area>
    </div>
  </div>
  <v-divider></v-divider>
  <div class="d-flex justify-space-evenly mt-5">
    <cancel-btn class="w-15" @click="close" />
    <save-btn class="w-15" @click="save" />
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useScheduleStore } from "@/stores/scheduleStore";

const emit = defineEmits(["close"]);
const store = useScheduleStore();
const startTime = ref({ hours: 9, minutes: 0 });

const close = () => {
  emit("close");
};

const save = async () => {
  await store.storeSchedulePhase();
  await store.searchSchedulesPhase();
  close();
};

const getDayClass = (date: any) => {
  const weekDay = new Date(date).getDay();
  if (weekDay == 6) {
    // 土曜日の場合、classに"saturday"を追加
    return "saturday";
  }
  if (weekDay == 0) {
    // 日曜日の場合、classに"sunday"を追加
    return "sunday";
  }
  return "";
};
</script>

<style>
/* scopedの中には書かない */
.saturday {
  background-color: #e6e6ff;
  color: #0000ff;
}
.sunday {
  background-color: #fde4e4;
  color: #ff0000;
}
.dp--menu-wrapper {
  /* position: sticky; */
  z-index: 99999;
}
.dp__action_button {
  width: 100px;
  height: 35px;
}
</style>

<style scoped>
.date-picker {
  /* margin: 60px auto 0; */
  /* width: 50%; */
}
</style>
