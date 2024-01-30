<template>
  <div class="d-flex flex-wrap">
    <v-card v-for="(recruit, i) in store.recruits" class="ma-2 pa-4 flex-basis-30">
      <div class="recruit-top d-flex">
        <div class="pl-0 mr-2">
          <v-avatar size="100">
            <v-img :src="recruit.image" alt="John" sizes="50"> </v-img>
          </v-avatar>
        </div>
        <div class="ml-auto">
          <v-chip v-if="recruit.max_phase_id" label color="accent" variant="flat">
            <v-icon start icon="mdi-stairs-box"></v-icon>
            {{ recruit.max_phase_name }}
          </v-chip>
          <v-chip v-else label>
            <v-icon start icon="mdi-sticker-alert"></v-icon>
            未選考　
          </v-chip>
        </div>
      </div>
      <div class="recruit-center">
        <div class="py-5 pl-3">
          <span class="text-primary font-weight-bold">{{ recruit.name }}</span>
          <span class="text-textmain font-weight-bold"> （{{ recruit.name_kana }}） </span>
        </div>
        <div>
          <v-chip
            v-for="(position, i) in recruit.positions.slice(0, 2)"
            :key="i"
            class="mr-2 mb-5"
            color="info"
          >
            {{ position }}
          </v-chip>
        </div>
      </div>
      <div class="recruit-bottom text-center">
        <o-btn
          color="primary"
          block
          variant="flat"
          prepend-icon="mdi-arrow-right-bold-circle"
          @click="gotoDetail(recruit.id)"
        >
          詳細
        </o-btn>
      </div>
    </v-card>
  </div>
</template>

<script setup lang="ts">
import { useRecruitStore } from "@/stores/recruitStore";
import { useRouter } from "vue-router";

const store = useRecruitStore();
const router = useRouter();

const gotoDetail = (id: number) => {
  router.push({ name: "recruit", params: { id: id } });
};
</script>

<style scoped>
.flex-basis-30 {
  flex-basis: 23%; /* 列の幅を調整 */
}
.recruit-bottom > button {
  width: 50%;
  margin: 0 4px;
}
</style>
