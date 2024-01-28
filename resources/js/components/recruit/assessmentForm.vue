<template>
  <div v-if="store.selectedPhaseUser">
    <v-form v-model="valid">
      <div class="d-flex align-center py-4">
        <div class="text-textmain w-30">評価入力</div>
        <o-auto
          v-if="store.assessments"
          :items="store.assessments"
          item-title="name"
          item-value="id"
          v-model="store.selectedPhaseUser.assessment_id"
          :rules="[required]"
        >
        </o-auto>
      </div>
      <div class="d-flex align-center py-4">
        <div class="text-textmain w-30">理由</div>
        <o-auto
          v-if="store.assessments"
          :items="store.assessments"
          item-title="name"
          item-value="id"
          :rules="[required]"
        >
        </o-auto>
      </div>
      <div class="d-flex align-center py-4">
        <div class="text-textmain w-30">コメント</div>
        <o-area placeholder="評価に関してコメント" v-model="store.selectedPhaseUser.comment" :rules="[required]">
        </o-area>
      </div>
      <v-divider></v-divider>
      <div class="d-flex justify-space-evenly mt-5">
        <cancel-btn class="w-15" @click="close" />
        <save-btn class="w-15" :disabled="!valid" @click="save" />
      </div>
    </v-form>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useScheduleStore } from "@/stores/scheduleStore";

const emit = defineEmits(["close"]);
const store = useScheduleStore();
const valid = ref(false);
const required = (v: any) => !!v || "必ず入力してください";

const close = () => {
  emit("close");
};

const save = async () => {
  await store.storeResultPhaseUser();
  await store.searchResultPhaseUsers();
  close();
};
</script>

<style scoped></style>
