<template>
  <div class="ma-2 d-flex align-center">
    <div class="me-auto">
      <v-btn-toggle v-model="toggle" color="primary" mandatory>
        <v-btn icon="mdi-card-account-details" value="card"></v-btn>
        <v-btn icon="mdi-list-box" value="list"></v-btn>
      </v-btn-toggle>
    </div>
    <o-btn color="accent" variant="flat">インポート</o-btn>
  </div>
  <div v-if="toggle == 'card'">
    <displayCard></displayCard>
  </div>
  <div v-else>
    <displayList></displayList>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useRecruitStore } from "@/stores/recruitStore";
import displayCard from "@/components/recruits/displayCard.vue";
import displayList from "@/components/recruits/displayList.vue";

const store = useRecruitStore();
const toggle = ref("card");

onMounted(async () => {
  await store.search();
});
</script>
