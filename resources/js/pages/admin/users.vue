<template>
  <div v-if="store.users">
    <v-table class="pa-4 com-table">
      <thead>
        <tr>
          <th class="text-left">ID</th>
          <th class="text-left">Name</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(user, i) in store.users" :key="i">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
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
  await store.fetchUsers();
});
</script>

<style scoped></style>
