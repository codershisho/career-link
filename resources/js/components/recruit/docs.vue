<template>
  <v-card flat class="pa-4">
    <div class="mt-3">
      <v-expansion-panels>
        <v-expansion-panel :elevation="0">
          <v-expansion-panel-title>
            <div class="text-textmain">履歴書</div>
          </v-expansion-panel-title>
          <v-expansion-panel-text>
            <div class="d-flex align-center w-100">
              <div class="ml-auto mr-3">
                <input type="file" accept="application/pdf" @change="fileSelected" />
                <o-btn
                  color="primary"
                  variant="outlined"
                  rounded="1"
                  prepend-icon="mdi:mdi:mdi-arrow-up-bold-circle-outline"
                  @click="fileUpload(1)"
                >
                  アップロード
                </o-btn>
              </div>
            </div>
            <div v-if="pdfs" style="height: 1200px">
              <object :data="pdfs[0]" type="application/pdf" width="100%" height="100%"></object>
            </div>
          </v-expansion-panel-text>
        </v-expansion-panel>
        <v-expansion-panel :elevation="0">
          <v-expansion-panel-title>
            <div class="text-textmain">職務経歴書</div>
          </v-expansion-panel-title>
          <v-expansion-panel-text>
            <div class="d-flex align-center w-100">
              <div class="ml-auto mr-3">
                <input type="file" accept="application/pdf" @change="fileSelected" />
                <o-btn
                  color="primary"
                  variant="outlined"
                  rounded="1"
                  prepend-icon="mdi:mdi-arrow-up-bold-circle-outline"
                  @click="fileUpload(2)"
                >
                  アップロード
                </o-btn>
              </div>
            </div>
            <div v-if="pdfs" style="height: 1200px">
              <object :data="pdfs[1]" type="application/pdf" width="100%" height="100%"></object>
            </div>
          </v-expansion-panel-text>
        </v-expansion-panel>
      </v-expansion-panels>
    </div>
  </v-card>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import service from "@/services/doc";
import { useRecruitStore } from "@/stores/recruitStore";

const fileInfo = ref("");
const store = useRecruitStore();
const pdfs = ref([]);

const search = async () => {
  const res = await service.search(store.recruitId);
  const data = res.data;
  pdfs.value = data.map((doc: any) => {
    return "http://localhost" + doc.file_path;
  });
};

const fileSelected = async (event: any) => {
  fileInfo.value = event.target.files[0];
};

const fileUpload = async (type: number) => {
  const formData = new FormData();
  formData.append("file", fileInfo.value);
  formData.append("type", String(type));

  await service.upload(store.recruitId, formData);
  fileInfo.value = "";
};

onMounted(async () => {
  await search();
});
</script>

<style scoped></style>
