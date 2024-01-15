<template>
  <div>
    <phase />
  </div>
  <div class="mt-3">
    <div class="tab-btn">
      <o-btn
        color="accent"
        variant="flat"
        rounded="8"
        @click="tabName = 'info'"
      >
        infos
      </o-btn>
      <o-btn
        color="accent"
        variant="flat"
        rounded="8"
        @click="tabName = 'docs'"
      >
        docs</o-btn
      >
      <o-btn
        color="accent"
        variant="flat"
        rounded="8"
        @click="tabName = 'result'"
      >
        result</o-btn
      >
    </div>
    <div class="mt-3">
      <info v-if="tabName == 'info'" />
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
const tabName = ref("info");
const store = useRecruitStore();
store.setRecruitId(Number(props.id));
</script>

<style scoped>
.tab-btn > button {
  margin-right: 8px;
}
</style>
