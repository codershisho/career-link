<template>
  <v-card flat class="pa-4" v-if="store.recruit">
    <div class="info-row">
      <div class="mr-2">
        <div class="text-textmain pb-2">name:</div>
        <o-text v-model="store.recruit.name"></o-text>
      </div>
      <div>
        <div class="text-textmain pb-2">name kana:</div>
        <o-text v-model="store.recruit.name_kana"></o-text>
      </div>
    </div>
    <div class="info-row">
      <div class="d-flex w-50 mr-2">
        <div class="mr-2 w-50">
          <div class="text-textmain pb-2">birthday:</div>
          <o-text v-model="store.recruit.birth_date"></o-text>
        </div>
        <div class="w-50">
          <div class="text-textmain pb-2">join date:</div>
          <o-text v-model="store.recruit.join_date"></o-text>
        </div>
      </div>
      <div>
        <div class="text-textmain pb-2">email:</div>
        <o-text v-model="store.recruit.email"></o-text>
      </div>
    </div>
    <div class="info-row">
      <div class="d-flex mr-2 w-50">
        <div class="mr-2 w-50">
          <div class="text-textmain pb-2">phone:</div>
          <o-text v-model="store.recruit.phone"></o-text>
        </div>
        <div class="w-50">
          <div class="text-textmain pb-2">post code:</div>
          <o-text v-model="store.recruit.post_code"></o-text>
        </div>
      </div>
      <div>
        <div class="text-textmain pb-2">address:</div>
        <o-text v-model="store.recruit.address"></o-text>
      </div>
    </div>
    <div class="mt-2">
      <div class="text-textmain pb-2">free message:</div>
      <o-area variant="outlined" v-model="store.recruit.free_message"></o-area>
    </div>
    <div class="mt-2">
      <input type="file" accept="image/png,image/jpeg,image/jpg" @change="fileSelected" />
      <o-btn
        color="primary"
        variant="outlined"
        rounded="1"
        prepend-icon="mdi-arrow-up-bold-circle-outline"
        @click="fileUpload"
      >
        アップロード
      </o-btn>
    </div>
  </v-card>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useRecruitStore } from "@/stores/recruitStore";

const store = useRecruitStore();
const fileInfo = ref("");

onMounted(async () => {
  await store.show();
});

const fileSelected = async (event: any) => {
  fileInfo.value = event.target.files[0];
};

const fileUpload = async () => {
  const formData = new FormData();
  formData.append("file", fileInfo.value);
  await store.uploadImage(formData);
  fileInfo.value = "";
  await store.show();
};
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
