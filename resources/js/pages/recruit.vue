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
          variant="flat"
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
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useRecruitStore } from "@/stores/recruitStore";
import phase from "@/components/recruit/phase.vue";
import info from "@/components/recruit/info.vue";
import docs from "@/components/recruit/docs.vue";
import result from "@/components/recruit/result.vue";

const props = defineProps({
  id: String,
});
const tabName = ref("infos");
const store = useRecruitStore();
store.setRecruitId(Number(props.id));

const tabButtons = [
  ["基本情報", "infos", "mdi-information"],
  ["書類", "docs", "mdi-file-document-check"],
  ["選考結果", "result", "mdi-flag-checkered"],
];
</script>

<style scoped>
.tab-chip {
  width: 30%;
}
.tab-chip > div > span {
  margin-right: 8px;
  width: 30%;
  height: 2.5rem;
}
.tab-chip--selected {
  background-color: rgb(var(--v-theme-info)) !important;
  color: rgb(var(--v-theme-constract));
}
</style>
