<template>
  <v-dialog v-model="value" width="1000">
    <v-card class="py-4 px-8">
      <div>
        <div class="d-flex align-center">
          <div class="text-textmain f-xl mr-auto">{{ props.title }}</div>
          <v-icon color="tabbg" icon="mdi-close" @click="value = false" />
        </div>
        <v-divider class="my-2"></v-divider>
        <component :is="props.form" @close="close" />
      </div>
    </v-card>
  </v-dialog>
</template>

<script setup lang="ts">
import { ref } from "vue";

const props = defineProps(["title", "form"]);
const emit = defineEmits(["open", "close"]);

const value = ref(false);

const open = () => {
  value.value = true;
};

const close = () => {
  value.value = false;
};
defineExpose({
  open,
  close,
});
</script>

<style scoped></style>
