<template>
  <analysisCard title="不採用理由">
    <template #graph>
      <div class="d-flex">
        <div class="w-50">
          <apexchart
            width="100%"
            height="340px"
            type="bar"
            :options="chartOptions"
            :series="series"
          ></apexchart>
        </div>
        <v-divider class="mx-5" vertical></v-divider>
        <div class="w-50">
          <div class="text-textmain">検索条件</div>
        </div>
      </div>
    </template>
  </analysisCard>
</template>

<script setup lang="ts">
import analysisCard from "./analysisCard.vue";
const chartOptions = {
  chart: {
    id: "vuechart-example",
  },
  xaxis: {
    categories: ["書類選考", "一次選考", "二次選考", "最終選考", "内定選考"],
  },
};

const series = [
  {
    name: "応募者",
    data: [30, 40, 50, 60, 70],
  },
  {
    name: "通過者数",
    data: [20, 30, 40, 50, 60],
  },
];
</script>
