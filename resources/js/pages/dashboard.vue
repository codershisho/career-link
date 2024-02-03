<template>
  <div class="text-textmain">応募状況</div>
  <v-divider></v-divider>
  <div class="d-flex tw-gap-x-5 px-5">
    <div v-for="(phase, i) in phases" :key="i" class="tw-w-1/5 phase-card px-10 py-5 rounded">
      <div class="name">{{ phase.name }}</div>
      <div class="count">{{ phase.count }}</div>
    </div>
  </div>
  <div class="d-flex tw-gap-x-5">
    <div class="tw-w-1/2">
      <div class="text-textmain mt-5">お知らせ</div>
      <v-divider></v-divider>
      <div class="ml-5 pa-5 bg-constract rounded"></div>
    </div>
    <div class="tw-w-1/2">
      <div class="text-textmain mt-5">今月の面談情報</div>
      <v-divider></v-divider>
      <div class="ml-5 mr-5 pa-5 bg-constract rounded"></div>
    </div>
  </div>
  <div class="text-textmain mt-5">採用チーム内連絡事項</div>
  <v-divider></v-divider>
  <div class="mx-5 pa-5 bg-constract rounded">
    <QuillEditor theme="snow" :toolbar="toolbar" :options="options" />
  </div>
</template>

<script setup lang="ts">
const phases = [
  {
    id: 1,
    name: "書類選考",
    count: 5,
  },
  {
    id: 2,
    name: "一次選考",
    count: 10,
  },
  {
    id: 3,
    name: "二次選考",
    count: 15,
  },
  {
    id: 4,
    name: "最終選考",
    count: 20,
  },
  {
    id: 5,
    name: "内定",
    count: 25,
  },
];

const toolbar = [
  ["bold", "italic", "underline", "strike"],
  [{ header: [1, 2, 3, 4, 5, 6, false] }],
  [{ list: "ordered" }, { list: "bullet" }],
  [{ color: [] }, { background: [] }],
];

const options = {
  // undo setting
  history: {
    delay: 500,
    maxStack: 500,
    userOnly: true,
  },
};
</script>

<style scoped>
.phase-card {
  background-color: rgb(var(--v-theme-constract)) !important;
}
.phase-card > .name {
  color: rgb(var(--v-theme-textmain)) !important;
}
.phase-card > .count {
  color: rgb(var(--v-theme-secondary)) !important;
  font-size: 2rem;
  font-weight: bold;
  text-align: center;
}
</style>
