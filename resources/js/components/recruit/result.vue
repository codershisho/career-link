<template>
  <v-card flat class="pa-4" v-if="store.resultPhaseUsers">
    <div>
      <template v-for="(phase, i) in store.resultPhaseUsers" :key="i">
        <div class="d-flex align-center">
          <div class="mr-auto text-textmain f-lg">
            {{ phase.phase_name }}
          </div>
          <div>
            <setting-btn
              class="mr-2"
              prepend-icon="mdi-star"
              @click="openAssessment(phase.phase_id)"
            >
              評価設定
            </setting-btn>
            <setting-btn
              class="mr-2"
              prepend-icon="mdi-draw-pen"
              @click="openChecker(phase.phase_id)"
            >
              選考担当者の設定
            </setting-btn>
            <setting-btn
              class="mr-2"
              prepend-icon="mdi-calendar-clock"
              @click="openMeeting(phase.phase_id)"
            >
              面談・面接日の設定
            </setting-btn>
          </div>
        </div>
        <div class="pt-3">
          <v-table v-if="phase.phase_users">
            <thead class="bg-blue-grey-lighten-5 text-textmain">
              <tr>
                <th class="text-left w-20">評価者</th>
                <th class="text-left w-10">評価</th>
                <th class="text-left">コメント</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(user, j) in phase.phase_users" :key="j">
                <td>{{ user.user_name }}</td>
                <td>
                  <v-chip
                    v-if="user.assessment_id"
                    label
                    :color="user.assessment_color"
                  >
                    {{ user.assessment_name }}
                  </v-chip>
                  <v-chip v-else label color="grey-darken-3"> 未実施 </v-chip>
                </td>
                <td>{{ user.comment }}</td>
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

const dialog = ref<InstanceType<typeof adialog> | null>(null);
const dialogTitle = ref("");
const form = ref("");

function openAssessment(phaseId: number) {
  store.setPhaseId(phaseId);
  dialogTitle.value = "評価設定";
  form.value = "assessmentForm";
  open();
}
function openChecker(phaseId: number) {
  store.setPhaseId(phaseId);
  dialogTitle.value = "選考担当者の設定";
  form.value = "checkerForm";
  open();
}
function openMeeting(phaseId: number) {
  store.setPhaseId(phaseId);
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
