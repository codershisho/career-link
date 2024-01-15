<template>
  <v-data-table class="pa-3" :headers="headers" :items="desserts">
    <template v-slot:item.actions="{ item }">
      <o-btn color="primary" variant="flat" class="mr-2">詳細</o-btn>
    </template>
  </v-data-table>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useRecruitStore } from "@/stores/recruitStore";
import { Recruit } from "@/types/recruitTypes";

const desserts = ref<Recruit[]>();
const store = useRecruitStore();

const headers = [
  { title: "id", key: "id", align: "end" },
  { title: "応募者名", key: "name", align: "start" },
  { title: "カナ", key: "name_kana", align: "start" },
  { title: "詳細", key: "actions", sortable: false, align: "center" },
];

onMounted(async () => {
  await store.search();
  desserts.value = store.recruits;
});
</script>
