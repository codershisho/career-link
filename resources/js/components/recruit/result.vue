<template>
  <v-card class="pa-4">
    <div class="offer text-textmain">
      <div class="title">選考状況</div>
      <div class="offer-row">
        <div class="item">提示条件：</div>
        <div class="value">給与</div>
      </div>
      <div class="offer-row">
        <div class="item">入社時期：</div>
        <div class="value">YY年MM月DD日</div>
      </div>
    </div>
    <div class="pt-5 offer text-textmain">
      <div class="title">オファー</div>
      <div class="offer-row">
        <div class="item">提示条件：</div>
        <div class="value">給与</div>
      </div>
      <div class="offer-row">
        <div class="item">入社時期：</div>
        <div class="value">YY年MM月DD日</div>
      </div>
    </div>
  </v-card>
</template>

<script setup lang="ts"></script>

<style scoped>
.offer > .title {
  font-size: 1.25rem;
  color: rgb(var(--v-theme-textsub));
  padding-bottom: 8px;
}
.offer > .offer-row {
  display: flex;
  margin-left: 20px;
  padding-top: 8px;
  padding-bottom: 8px;
  border-top: 1px solid #f1f1f1;
}
.offer > .offer-row > .item {
  width: 20%;
}
</style>
