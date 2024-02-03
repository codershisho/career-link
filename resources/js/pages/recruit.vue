<template>
  <div>
    <phase />
  </div>
  <div class="mt-3">
    <div class="tab-chip">
      <v-chip-group selected-class="tab-chip--selected">
        <v-chip
          v-for="[name, kbn, icon] in tabButtons"
          label
          :prepend-icon="icon"
          @click="tabName = kbn"
        >
          {{ name }}
        </v-chip>
      </v-chip-group>
    </div>
    <div>
      <info v-if="tabName == 'infos'" />
      <docs v-if="tabName == 'docs'" />
      <result v-if="tabName == 'result'" />
      <timeline v-if="tabName == 'timeline'" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useRecruitStore } from "@/stores/recruitStore";
import { useScheduleStore } from "@/stores/scheduleStore";
import phase from "@/components/recruit/phase.vue";
import info from "@/components/recruit/info.vue";
import docs from "@/components/recruit/docs.vue";
import result from "@/components/recruit/result.vue";
import timeline from "@/components/recruit/timeline.vue";

const props = defineProps({
  id: String,
});

const store = useRecruitStore();
const scheduleStore = useScheduleStore();
const tabName = ref("infos");
store.setRecruitId(Number(props.id));
scheduleStore.setRecruitId(Number(props.id));

const tabButtons = [
  ["基本情報", "infos", "mdi:mdi-information"],
  ["書類", "docs", "mdi:mdi-file-document-check"],
  ["選考結果", "result", "mdi:mdi-flag-checkered"],
  ["タイムライン", "timeline", "mdi:mdi-flag-checkered"],
];
</script>

<style scoped>
.tab-chip {
  width: 60%;
}
.tab-chip > div > span {
  margin-right: 8px;
  width: 20%;
  height: 2.5rem;
}
.tab-chip--selected {
  background-color: rgb(var(--v-theme-info)) !important;
  color: rgb(var(--v-theme-constract));
}
</style>
