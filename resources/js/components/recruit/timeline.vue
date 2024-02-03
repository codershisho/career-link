<template>
  <v-card flat class="pa-4">
    <div v-for="(timeline, i) in timelines" :key="i" class="px-5">
      <div class="pb-3">
        <span class="text-textmain pr-5">{{ timeline.name }}</span>
        <span class="text-textmain tw-text-sm">{{ timeline.created_at }}</span>
      </div>
      <div class="text-textmain">{{ timeline.message }}</div>
      <v-divider></v-divider>
    </div>
  </v-card>
</template>

<script setup lang="ts">
const timelines = [
  {
    id: 1,
    name: "AAAA",
    message: "一次面接の結果を入力しました。",
    created_at: "2024-02-02 10:00",
  },
  {
    id: 2,
    name: "AAAAAAAAAAAAAAAA",
    message: "一次面接はMM月DD日で確定しました。",
    created_at: "2024-02-01 10:00",
  },
];
</script>

<style scoped></style>
