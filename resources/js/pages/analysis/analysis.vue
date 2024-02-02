<template>
  <div class="tw-flex tw-gap-x-5">
    <div class="tw-w-1/2">
      <sourceAnalysis></sourceAnalysis>
    </div>
    <div class="tw-w-1/2">
      <departmentAnalysis></departmentAnalysis>
    </div>
  </div>
  <div class="tw-flex tw-gap-x-5 mt-5">
    <div class="tw-w-1/2">
      <yearsAnalysis></yearsAnalysis>
    </div>
    <div class="tw-w-1/2">
      <offerAnalysis></offerAnalysis>
    </div>
  </div>
</template>

<script setup lang="ts">
import sourceAnalysis from "@/components/analysis/sourceAnalysis.vue";
import departmentAnalysis from "@/components/analysis/departmentAnalysis.vue";
import yearsAnalysis from "@/components/analysis/yearsAnalysis.vue";
import offerAnalysis from "@/components/analysis/offerAnalysis.vue";
</script>
