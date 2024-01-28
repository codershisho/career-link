<template>
  <div v-if="store.reasons">
    <v-table class="pa-4 com-table">
      <thead>
        <tr>
          <th class="text-left">ID</th>
          <th class="text-left">Name</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(reason, i) in store.reasons" :key="i">
          <td>{{ reason.id }}</td>
          <td>{{ reason.name }}</td>
        </tr>
      </tbody>
    </v-table>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useMasterStore } from "@/stores/masterStore";

const store = useMasterStore();

onMounted(async () => {
  await store.fetchReasons();
});
</script>

<style scoped></style>
