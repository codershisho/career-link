<template>
  <div>
    <v-form v-model="valid">
      <div class="d-flex align-center py-4">
        <div class="text-textmain w-30">名前</div>
        <o-text v-model="store.editUser.name" :rules="[required]"></o-text>
      </div>
      <div class="d-flex align-center py-4">
        <div class="text-textmain w-30">選考可能設定</div>
        <!-- <o-text v-model="store.editUser.is_checker" ></o-text> -->
        <v-switch
          v-model="store.editUser.is_checker"
          inset
          density="compact"
          hide-details="auto"
          :true-value="1"
          :false-value="0"
          color="accent"
        ></v-switch>
      </div>
      <div class="d-flex align-center py-4">
        <div class="text-textmain w-30">画像</div>
        <div>
          <div class="d-flex">
            <div
              class="drop_zone"
              @dragover.prevent
              @drop.prevent="dropImage"
              @dragenter="dragEnter"
              @dragleave="dragLeave"
              :class="{ enter: isEnter }"
            >
              ここにドラッグ＆ドロップ
            </div>
            <div class="ml-5 preview_zone">
              <img :src="url" alt="ここにプレビューが表示されます" />
            </div>
          </div>
        </div>
      </div>
      <v-divider></v-divider>
      <div class="d-flex justify-space-evenly mt-5">
        <cancel-btn class="w-15" @click="close" />
        <save-btn class="w-15" :disabled="!valid" @click="save" />
      </div>
    </v-form>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useMasterStore } from "@/stores/masterStore";

const store = useMasterStore();
const emit = defineEmits(["close"]);
const valid = ref(false);
const required = (v: any) => !!v || "必ず入力してください";
const url = ref("");
const isEnter = ref(false);

const close = () => {
  emit("close");
};

const save = async () => {
  await store.upsertUser();
  close();
};

const previewImage = (image: any) => {
  url.value = URL.createObjectURL(image);
};
const dropImage = (event: any) => {
  let images = event.dataTransfer.files;
  previewImage(images[0]);
  store.editUser.image = images[0];
  isEnter.value = false;
};
const dragEnter = () => {
  isEnter.value = true;
};
const dragLeave = () => {
  isEnter.value = false;
};
</script>

<style scoped>
.drop_zone {
  border: 2px solid lightgrey;
  border-radius: 8px;
  width: 300px;
  height: 150px;
  display: flex;
  justify-content: center;
  align-items: center;
  color: lightgray;
  font-weight: bold;
  /* margin-top: 20px; */
}
.preview_zone {
  border: 2px solid lightgrey;
  border-radius: 8px;
  width: 300px;
  height: 150px;
  margin-right: 20px;
}
.preview_zone > img {
  object-fit: contain;
  width: 100%;
  height: 100%;
}
.enter {
  border: 3px dotted lightblue;
  color: lightblue;
  background-color: lightblue;
}
</style>
