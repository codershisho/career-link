<template>
  <analysisCard title="部署毎の応募者数">
    <template #graph>
      <apexchart
        width="100%"
        height="340px"
        type="bar"
        :options="chartOptions"
        :series="series"
      ></apexchart>
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
    categories: ["サプリ販促", "コスメ販促", "制作事業部", "ヨコテン事業部"],
  },
  colors: ["#1E88E5"],
};

const series = [
  {
    name: "series-1",
    data: [30, 40, 50, 60],
  },
];
</script>
