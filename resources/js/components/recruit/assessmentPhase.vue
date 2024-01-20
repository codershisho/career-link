<template>
  <div v-if="store.phaseResults">
    <div class="d-flex align-center py-4">
      <div class="text-textmain w-30">評価入力</div>
      <o-auto
        v-if="store.phaseResults"
        :items="store.assessments"
        item-title="name"
        item-value="id"
        v-model="store.phaseResults[store.selectedPhaseId - 1].assessment_id"
      >
      </o-auto>
    </div>
    <div class="d-flex align-center py-4">
      <div class="text-textmain w-30">通過結果</div>
      <v-switch
        hide-details
        inset
        color="accent"
        :label="
          store.phaseResults[store.selectedPhaseId - 1].result_flg
            ? `通過`
            : `不合格`
        "
        :true-value="1"
        :false-value="0"
        v-model="store.phaseResults[store.selectedPhaseId - 1].result_flg"
      >
      </v-switch>
    </div>
    <div class="d-flex align-center py-4">
      <div class="text-textmain w-30">総評</div>
      <o-area
        placeholder="総評"
        v-model="store.phaseResults[store.selectedPhaseId - 1].review_comment"
      >
      </o-area>
    </div>
    <div class="d-flex align-center py-4">
      <div class="text-textmain w-30">メモ・備考</div>
      <o-area
        placeholder="メモ・備考"
        v-model="store.phaseResults[store.selectedPhaseId - 1].memo"
      >
      </o-area>
    </div>
    <v-divider></v-divider>
    <div class="d-flex justify-space-evenly mt-5">
      <cancel-btn class="w-15" @click="close" />
      <save-btn class="w-15" @click="save" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useScheduleStore } from "@/stores/scheduleStore";

const emit = defineEmits(["close"]);
const store = useScheduleStore();

const close = () => {
  emit("close");
};

const save = async () => {
  await store.storePhaseResult();
  await store.searchPhaseResults();
  close();
};
</script>

<style scoped></style>
