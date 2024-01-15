<template>
  <v-card class="pa-4">
    <div class="info-row">
      <div class="mr-2">
        <div class="text-textmain pb-2">name:</div>
        <o-text variant="outlined" v-model="info.name"></o-text>
      </div>
      <div>
        <div class="text-textmain pb-2">name kana:</div>
        <o-text variant="outlined" v-model="info.name_kana"></o-text>
      </div>
    </div>
    <div class="info-row">
      <div class="d-flex w-50 mr-2">
        <div class="mr-2 w-50">
          <div class="text-textmain pb-2">birthday:</div>
          <o-text variant="outlined" v-model="info.birth_date"></o-text>
        </div>
        <div class="w-50">
          <div class="text-textmain pb-2">join date:</div>
          <o-text variant="outlined" v-model="info.join_date"></o-text>
        </div>
      </div>
      <div>
        <div class="text-textmain pb-2">email:</div>
        <o-text variant="outlined" v-model="info.email"></o-text>
      </div>
    </div>
    <div class="info-row">
      <div class="d-flex mr-2 w-50">
        <div class="mr-2 w-50">
          <div class="text-textmain pb-2">phone:</div>
          <o-text variant="outlined" v-model="info.phone"></o-text>
        </div>
        <div class="w-50">
          <div class="text-textmain pb-2">post code:</div>
          <o-text variant="outlined" v-model="info.post_code"></o-text>
        </div>
      </div>
      <div>
        <div class="text-textmain pb-2">address:</div>
        <o-text variant="outlined" v-model="info.address"></o-text>
      </div>
    </div>
    <div class="mt-2">
      <div class="text-textmain pb-2">free message:</div>
      <o-area variant="outlined" v-model="info.free_message"></o-area>
    </div>
  </v-card>
</template>

<script setup lang="ts">
import { ref, onBeforeMount } from "vue";
import { useRecruitStore } from "@/stores/recruitStore";
import { Recruit } from "@/types/recruitTypes";

const store = useRecruitStore();

const info = ref<Recruit>();

store.show();

onBeforeMount(async () => {
  info.value = store.recruit;
});
</script>

<style scoped>
.info-row {
  display: flex;
  margin-top: 8px;
}
.info-row > div {
  width: 50%;
}
</style>
