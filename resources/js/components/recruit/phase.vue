<template>
  <v-card class="pa-4">
    <div class="d-flex align-center">
      <div class="w-10">
        <v-sheet width="100" height="100" color="grey">イメージ</v-sheet>
      </div>
      <div class="w-100">
        <div>name</div>
        <div>name_kana</div>
        <div class="d-flex align-center mt-3">
          <div class="mr-auto">希望部署</div>
          <o-btn color="accent" variant="flat" @click="gotoDetail(recruit.id)">
            XXX 日程調整
          </o-btn>
        </div>
      </div>
    </div>
    <v-divider class="my-5"></v-divider>
    <div class="phases">
      <div class="box rounded-lg">
        <div class="bg-info title rounded-t-lg">書類選考</div>
        <div class="bg-back date rounded-b-lg">日程：XXXXX</div>
      </div>
    </div>
  </v-card>
</template>

<script setup lang="ts"></script>

<style scoped>
.phases > .box > div {
  width: 200px;
  height: 70px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.phases > .box > .title {
  color: white !important;
}
.phases > .box > .date {
  color: rgb(var(--v-theme-textmain)) !important;
}
</style>
