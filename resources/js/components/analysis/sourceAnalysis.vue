<template>
  <analysisCard title="応募元毎の応募者数">
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
    categories: [
      "ホームページ",
      "ハローワーク",
      "indeed",
      "engage",
      "SNS",
      "友人・知人",
      "家族",
      "その他",
    ],
  },
  colors: ["#3949AB"],
};

const series = [
  {
    name: "series-1",
    data: [30, 40, 45, 50, 49, 60, 70, 81],
  },
];
</script>
