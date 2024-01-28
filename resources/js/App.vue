<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer">
      <v-list>
        <div>
          <img src="" />
        </div>
        <template v-for="(menu, i) in menus" :key="i">
          <v-list-group v-if="menu.children">
            <template v-slot:activator="{ props }">
              <v-list-item v-bind="props" :title="menu.name" :prepend-icon="menu.icon"> </v-list-item>
            </template>
            <v-list-item
              v-for="(child, j) in menu.children"
              :key="j"
              :prepend-icon="child.icon"
              :title="child.name"
              :to="child.url"
              link
              bg-color="primary"
              class="menu-item"
            ></v-list-item>
          </v-list-group>
          <v-list-item
            v-else
            :prepend-icon="menu.icon"
            :title="menu.name"
            :to="menu.url"
            link
            bg-color="primary"
            class="menu-item"
          ></v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>
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
  {
    id: 1,
    name: "ダッシュボード",
    icon: "mdi-home",
    url: "/dashboard",
    children: null,
  },
  {
    id: 2,
    name: "応募者一覧",
    icon: "mdi-account-circle-outline",
    url: "/recruits",
    children: null,
  },
  {
    id: 3,
    name: "管理",
    icon: "mdi-account-circle-outline",
    url: "",
    children: [
      {
        id: 4,
        name: "ユーザー管理",
        icon: "mdi-account-circle-outline",
        url: "/admin/users",
      },
      {
        id: 5,
        name: "理由管理",
        icon: "mdi-account-circle-outline",
        url: "/admin/reasons",
      },
    ],
  },
];
</script>

<style>
.menu-item .v-list-item__overlay {
  background-color: royalblue !important;
}
</style>
