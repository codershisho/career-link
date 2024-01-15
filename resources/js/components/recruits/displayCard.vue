<template>
  <div class="d-flex flex-wrap">
    <v-card v-for="(recruit, i) in recruits" class="ma-2 pa-4 flex-basis-30">
      <div class="recruit-top">
        <div class="pl-3">
          <v-sheet width="100" height="100" color="grey">イメージ</v-sheet>
        </div>
      </div>
      <div class="recruit-center">
        <div class="py-5 pl-3">
          <span class="text-primary font-weight-bold">{{ recruit.name }}</span>
          <span class="text-textmain font-weight-bold">
            （{{ recruit.name_kana }}）
          </span>
        </div>
      </div>
      <div class="recruit-bottom">
        <o-btn color="primary" variant="flat">詳細</o-btn>
        <o-btn color="primary">キャンセル</o-btn>
      </div>
    </v-card>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useRecruitStore } from "@/stores/recruitStore";
import { Recruit } from "@/types/recruitTypes";

const recruits = ref<Recruit[]>();
const store = useRecruitStore();

onMounted(async () => {
  await store.search();
  recruits.value = store.recruits;
});
</script>
<style scoped>
.flex-basis-30 {
  flex-basis: 23%; /* 列の幅を調整 */
}
.recruit-bottom > button {
  width: 45%;
  margin: 0 4px;
}
</style>
