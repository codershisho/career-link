<template>
  <v-data-table class="pa-4 com-table" :headers="headers" :items="store.recruits">
    <template v-slot:item.max_phase_name="{ item }">
      <v-chip v-if="item.max_phase_id" label color="accent" variant="flat">
        <v-icon start icon="mdi-stairs-box"></v-icon>
        {{ item.max_phase_name }}
      </v-chip>
      <v-chip v-else label>
        <v-icon start icon="mdi-sticker-alert"></v-icon>
        未選考　
      </v-chip>
    </template>
    <template v-slot:item.actions="{ item }">
      <o-btn color="primary" variant="flat" class="mr-2" prepend-icon="mdi-arrow-right-bold-circle">詳細</o-btn>
    </template>
  </v-data-table>
</template>

<script setup lang="ts">
import { useRecruitStore } from "@/stores/recruitStore";

const store = useRecruitStore();

const headers = [
  { title: "id", key: "id", align: "end" },
  { title: "応募者名", key: "name", align: "start" },
  { title: "カナ", key: "name_kana", align: "start" },
  { title: "最新フェーズ", key: "max_phase_name", align: "start" },
  { title: "詳細", key: "actions", sortable: false, align: "center" },
];
</script>
