<template>
  <div v-if="store.reasons">
    <div class="d-flex">
      <o-btn
        class="ml-auto mb-4"
        color="accent"
        variant="flat"
        prepend-icon="mdi:mdi-plus-circle"
        @click="newOpen"
      >
        新規作成
      </o-btn>
    </div>
    <v-table class="pa-4 com-table">
      <thead>
        <tr>
          <th class="text-left">ID</th>
          <th class="text-left">Name</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(reason, i) in store.reasons" :key="i" @click="editOpen(reason)">
          <td>{{ reason.id }}</td>
          <td>{{ reason.name }}</td>
        </tr>
      </tbody>
    </v-table>
  </div>
  <o-dialog ref="dialog" title="理由編集" form="reasonForm" @close="close"> </o-dialog>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useMasterStore } from "@/stores/masterStore";
import { Master } from "@/types/mastersType";
import adialog from "@/components/ui/dialog.vue";

const store = useMasterStore();
const dialog = ref<InstanceType<typeof adialog> | null>(null);

onMounted(async () => {
  await store.fetchReasons();
});

const newOpen = () => {
  store.editReason = {
    id: 0,
    name: "",
  };
  dialog.value?.open();
};

const editOpen = (reason: Master) => {
  store.editReason = reason;
  dialog.value?.open();
};

const close = () => {
  store.fetchReasons();
};
</script>

<style scoped></style>
