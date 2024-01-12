<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer">
      <v-list class="tw-flex tw-flex-col tw-items-center tw-gap-6">
        <div class="tw-w-40 tw-pb-10">
          <img src="" />
        </div>
        <v-list-item
          v-for="[icon, text, url] in menus"
          :key="icon"
          :prepend-icon="icon"
          :title="text"
          :to="url"
          link
          bg-color="primary"
          class="menu-item"
        ></v-list-item>
      </v-list>
    </v-navigation-drawer>

    <!-- <v-app-bar>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-app-bar-title>Application</v-app-bar-title>
    </v-app-bar> -->

    <v-main>
      <v-container class="bg-back h-100">
        <router-view />
      </v-container>
    </v-main>
  </v-app>
</template>

<script setup lang="ts">
import { ref } from "vue";

const drawer = ref(null);

const menus = [
  ["mdi-home", "ダッシュボード", "/dashboard"],
  ["mdi-account-circle-outline", "応募者一覧", "/recruits"],
];
</script>

<style>
.menu-item .v-list-item__overlay {
  background-color: royalblue !important;
}
</style>
