<template>
  <analysisCard title="内定率">
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
      "2021年上半期",
      "2021年下半期",
      "2022年上半期",
      "2022年下半期",
      "2023年上半期",
      "2023年下半期",
      "2024年上半期",
      "2024年下半期",
    ],
  },
  colors: ["#00ACC1"],
};

const series = [
  {
    name: "series-1",
    data: [30, 40, 45, 50, 49, 60, 70, 81],
  },
];
</script>
