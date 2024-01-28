<template>
  <div>
    <v-form v-model="valid">
      <div class="d-flex align-center py-4">
        <div class="text-textmain w-30">理由</div>
        <o-text v-model="store.editReason.name" :rules="[required]"></o-text>
      </div>
      <v-divider></v-divider>
      <div class="d-flex justify-space-evenly mt-5">
        <cancel-btn class="w-15" @click="close" />
        <save-btn class="w-15" :disabled="!valid" @click="save" />
      </div>
    </v-form>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useMasterStore } from "@/stores/masterStore";

const store = useMasterStore();
const emit = defineEmits(["close"]);
const reason = ref("");
const valid = ref(false);
const required = (v: any) => !!v || "必ず入力してください";

const close = () => {
  emit("close");
};

const save = async () => {
  await store.upsertReason();
  close();
};
</script>

<style scoped></style>
