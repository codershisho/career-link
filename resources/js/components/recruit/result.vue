<template>
  <v-card flat class="pa-4" v-if="store.schedules">
    <div>
      <template v-for="(schedule, i) in store.schedules" :key="i">
        <div class="d-flex align-center">
          <div class="mr-auto text-textmain f-lg">
            {{ schedule.phase_name }}
          </div>
          <div>
            <o-btn
              v-for="[name, icon, fn] in buttons"
              class="mr-2"
              color="primary"
              variant="outlined"
              rounded="1"
              :prepend-icon="icon"
              @click="fn"
            >
              {{ name }}
            </o-btn>
          </div>
        </div>
        <div class="pt-3">
          <v-table>
            <thead class="bg-blue-grey-lighten-5">
              <tr>
                <th class="text-left w-20">評価者</th>
                <th class="text-left w-10">評価</th>
                <th class="text-left">コメント</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in assessments" :key="item.id">
                <td>{{ item.user_name }}</td>
                <td>
                  <v-chip label color="yellow-darken-4">{{
                    item.assessment_name
                  }}</v-chip>
                </td>
                <td>{{ item.comment }}</td>
              </tr>
            </tbody>
          </v-table>
        </div>
        <v-divider></v-divider>
      </template>
    </div>
    <o-dialog
      ref="dialog"
      :title="dialogTitle"
      :form="form"
      @open="open"
      @close="close"
    >
    </o-dialog>
  </v-card>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useScheduleStore } from "@/stores/scheduleStore";
import adialog from "@/components/ui/dialog.vue";

const store = useScheduleStore();

const buttons = [
  ["評価設定", "mdi-star", () => openAssessment()],
  ["選考担当者の設定", "mdi-draw-pen", () => openChecker()],
  ["面談・面接日の設定", "mdi-calendar-clock", () => openMeeting()],
];
const dialog = ref<InstanceType<typeof adialog> | null>(null);
const dialogTitle = ref("");
const form = ref("");

const assessments = ref([
  {
    id: 0,
    user_name: "AAA",
    assessment_id: 1,
    assessment_name: "S評価",
    comment: "asc",
  },
  {
    id: 1,
    user_name: "BBB",
    assessment_id: 2,
    assessment_name: "A評価",
    comment: "axxv",
  },
]);

function openAssessment() {
  dialogTitle.value = "評価設定";
  form.value = "assessmentForm";
  open();
}
function openChecker() {
  dialogTitle.value = "選考担当者の設定";
  form.value = "checkerForm";
  open();
}
function openMeeting() {
  dialogTitle.value = "面談・面接日の設定";
  form.value = "meetingForm";
  open();
}
function open() {
  dialog.value?.open();
}
function close() {
  dialog.value?.close();
}
</script>

<style scoped></style>
