<template>
  <div v-if="store.users">
    <div class="d-flex">
      <o-btn
        class="ml-auto mb-4"
        color="accent"
        variant="flat"
        prepend-icon="mdi-plus-circle"
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
          <th class="text-left">checker</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(user, i) in store.users" :key="i" @click="editOpen(user)">
          <td>{{ user.id }}</td>
          <td>
            <v-avatar class="pa-1 ma-1 mr-3" :size="60" color="tabbg-lighten-2">
              <v-img :src="user.image ? user.image : ``" alt="John"> </v-img>
            </v-avatar>
            {{ user.name }}
          </td>
          <td>
            <v-chip label variant="flat" :color="user.is_checker ? 'accent' : `back`">
              <span v-html="user.is_checker ? '選考可能' : `選考不可`"></span>
            </v-chip>
          </td>
        </tr>
      </tbody>
    </v-table>
  </div>
  <o-dialog ref="dialog" title="ユーザー編集" form="userForm" @close="close"> </o-dialog>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useMasterStore } from "@/stores/masterStore";
import { User } from "@/types/mastersType";
import adialog from "@/components/ui/dialog.vue";

const store = useMasterStore();
const dialog = ref<InstanceType<typeof adialog> | null>(null);

onMounted(async () => {
  await store.fetchUsers();
});

const newOpen = () => {
  store.editUser = {
    id: 0,
    name: "",
    is_checker: 0,
  };
  dialog.value?.open();
};

const editOpen = (user: User) => {
  store.editUser = user;
  dialog.value?.open();
};

const close = () => {
  store.fetchUsers();
};
</script>

<style scoped></style>
