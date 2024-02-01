<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" class="navigation navi-gradient">
      <v-list>
        <div>
          <img src="" />
        </div>
        <template v-for="(menu, i) in menus" :key="i">
          <v-list-group v-if="menu.children">
            <template v-slot:activator="{ props }">
              <v-list-item
                class="text-white"
                v-bind="props"
                :title="menu.name"
                :prepend-icon="menu.icon"
              >
              </v-list-item>
            </template>
            <v-list-item
              v-for="(child, j) in menu.children"
              :key="j"
              :prepend-icon="child.icon"
              :title="child.name"
              :to="child.url"
              link
              bg-color="primary"
              class="menu-item text-white"
            ></v-list-item>
          </v-list-group>
          <v-list-item
            v-else
            :prepend-icon="menu.icon"
            :title="menu.name"
            :to="menu.url"
            link
            bg-color="primary"
            class="menu-item text-white"
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
    icon: "mdi-home-outline",
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
    name: "カレンダー",
    icon: "mdi-calendar-month-outline",
    url: "/calendar",
    children: null,
  },
  {
    id: 4,
    name: "管理",
    icon: "mdi-cog-outline",
    url: "",
    children: [
      {
        id: 5,
        name: "ユーザー管理",
        icon: "mdi-account-group-outline",
        url: "/admin/users",
      },
      {
        id: 6,
        name: "理由管理",
        icon: "mdi-account-cancel-outline",
        url: "/admin/reasons",
      },
    ],
  },
];
</script>

<style>
.navi-gradient {
  background: rgb(2, 0, 36) !important;
  background: linear-gradient(
    180deg,
    rgba(2, 0, 36, 1) 0%,
    rgba(9, 9, 121, 1) 29%,
    rgba(0, 212, 255, 1) 100%
  ) !important;
}
.menu-item .v-list-item__overlay {
  background-color: rgb(255, 255, 255) !important;
}
.navigation .v-list-group__items > a.v-list-item {
  padding-inline-start: 40px !important;
}
</style>
