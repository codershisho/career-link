<template>
  <v-card flat class="pa-4">
    <div class="d-flex justify-end">
      <o-btn
        v-for="[type, name] in buttons"
        class="mr-6"
        color="primary"
        variant="outlined"
        rounded="lg"
        prepend-icon="mdi-arrow-up-bold-circle-outline"
        @click="upload(Number(type))"
      >
        {{ name }}
      </o-btn>
    </div>
    <div class="mt-3">
      <v-expansion-panels color="#424242">
        <v-expansion-panel
          title="履歴書"
          text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, ratione debitis quis est labore voluptatibus! Eaque cupiditate minima"
        >
        </v-expansion-panel>
        <v-expansion-panel
          title="職務経歴書"
          text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, ratione debitis quis est labore voluptatibus! Eaque cupiditate minima"
        >
        </v-expansion-panel>
      </v-expansion-panels>
    </div>
  </v-card>
</template>

<script setup lang="ts">
import { ref } from "vue";

const buttons = [
  [1, "イメージ"],
  [2, "履歴書"],
  [3, "職務経歴書"],
];

async function upload(type: number) {}
</script>

<style scoped></style>
