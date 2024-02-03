<template>
  <div v-for="(department, i) in departments" :key="i">
    <div
      class="menu"
      :class="selectedMenu == department.id ? `menu-selected` : ``"
      @click="selected(department)"
    >
      {{ department.name }}
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";

const departments = [
  { id: 1, name: "サプリ販促" },
  { id: 2, name: "コスメ販促" },
  { id: 3, name: "制作事業部" },
  { id: 4, name: "ヨコテン事業部" },
];

const selectedMenu = ref(0);

const selected = (department: any) => {
  selectedMenu.value = department.id;
};
</script>

<style scoped>
.menu {
  background-color: rgb(221, 227, 255);
  color: rgb(38, 29, 124);
  border-radius: 4px;
  padding: 12px 16px;
  margin: 8px 0;
}
.menu-selected {
  background-color: rgb(38, 29, 124);
  color: rgb(221, 227, 255);
}
</style>
