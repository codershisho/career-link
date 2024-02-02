<template>
  <v-card flat class="pa-4" v-if="store.resultPhaseUsers">
    <div>
      <v-expansion-panels>
        <v-expansion-panel v-for="(phase, i) in store.resultPhaseUsers" :key="i" :elevation="0">
          <v-expansion-panel-title
            :color="panelColor(i)"
            :class="panelColor(i) == '' ? 'text-textmain' : 'text-constract'"
          >
            <div class="d-flex align-center w-100">
              <div>{{ phase.phase_name }}</div>
              <div class="ml-auto">
                <setting-btn
                  class="mr-2"
                  prepend-icon="mdi:mdi-star"
                  :color="panelColor(i) == '' ? '' : 'constract'"
                  @click.stop="openAssessmentPhase(phase.phase_id)"
                >
                  フェーズ評価
                </setting-btn>
                <setting-btn
                  class="mr-2"
                  prepend-icon="mdi:mdi-draw-pen"
                  :color="panelColor(i) == '' ? '' : 'constract'"
                  @click.stop="openChecker(phase.phase_id)"
                >
                  選考担当者の設定
                </setting-btn>
                <setting-btn
                  class="mr-2"
                  prepend-icon="mdi:mdi-calendar-clock"
                  :color="panelColor(i) == '' ? '' : 'constract'"
                  @click.stop="openMeeting(phase.phase_id)"
                >
                  面談・面接日の設定
                </setting-btn>
              </div>
            </div>
          </v-expansion-panel-title>
          <v-expansion-panel-text>
            <div class="pt-3">
              <v-table v-if="phase.phase_users" class="result-table">
                <thead class="bg-blue-grey-lighten-5 text-textmain">
                  <tr>
                    <th class="text-left w-20">評価者</th>
                    <th class="text-left w-10">評価</th>
                    <th class="text-left">理由</th>
                    <th class="text-left">コメント</th>
                    <th class="text-right">評価登録</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(user, j) in phase.phase_users" :key="j">
                    <td class="text-textmain">{{ user.user_name }}</td>
                    <td>
                      <v-chip v-if="user.assessment_id" label :color="user.assessment_color">
                        {{ user.assessment_name }}
                      </v-chip>
                      <v-chip v-else label color="grey-darken-3"> 未実施 </v-chip>
                    </td>
                    <td class="text-textmain">{{ user.reason_name }}</td>
                    <td class="text-textmain">
                      <div
                        style="
                          word-break: break-all;
                          overflow-wrap: break-word;
                          white-space: break-spaces;
                        "
                      >
                        {{ user.comment }}
                      </div>
                    </td>
                    <td class="text-right">
                      <o-btn variant="text" class="pa-0 text-info" @click="openAssessment(user)">
                        評価登録
                      </o-btn>
                    </td>
                  </tr>
                </tbody>
              </v-table>
            </div>
          </v-expansion-panel-text>
        </v-expansion-panel>
      </v-expansion-panels>
    </div>
    <o-dialog ref="dialog" :title="dialogTitle" :form="form"> </o-dialog>
  </v-card>
</template>

<script setup lang="ts">
import { ref, computed } from "vue";
import { useScheduleStore } from "@/stores/scheduleStore";
import { PhaseUser } from "@/types/scheduleTypes";
import adialog from "@/components/ui/dialog.vue";

const store = useScheduleStore();

const dialog = ref<InstanceType<typeof adialog> | null>(null);
const dialogTitle = ref("");
const form = ref("");

const panelColor = computed(() => (index: number): string => {
  if (store.phaseResults) {
    const resultFlg = store.phaseResults[index].result_flg;
    switch (resultFlg) {
      case true:
        return "success";
      case false:
        return "unsuccess";
      default:
        return "";
    }
  }
  return "";
});

function openAssessmentPhase(v: number) {
  store.setPhaseId(v);
  dialogTitle.value = "フェーズ評価";
  form.value = "assessmentPhase";
  open();
}

function openAssessment(v: PhaseUser) {
  store.setPhaseUser(v);
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
</script>

<style scoped>
.result-table table > thead > tr > th:nth-child(1),
.result-table table > thead > tr > th:nth-child(2),
.result-table table > thead > tr > th:nth-child(5) {
  width: 10%;
}
.result-table table > thead > tr > th:nth-child(3),
.result-table table > thead > tr > th:nth-child(4) {
  width: 35%;
}
</style>
