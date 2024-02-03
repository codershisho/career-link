<template>
  <div class="tips">
    <div>
      <div class="label">求める人物像</div>
      <div class="editor">
        <QuillEditor theme="snow" :toolbar="toolbar" :options="options" />
      </div>
    </div>
    <div>
      <div class="label">質問集</div>
      <div class="editor">
        <QuillEditor theme="snow" :toolbar="toolbar" :options="options" />
      </div>
    </div>
    <div>
      <div class="label">採用チームへの連絡事項</div>
      <div class="editor">
        <QuillEditor theme="snow" :toolbar="toolbar" :options="options" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
const toolbar = [
  ["bold", "italic", "underline", "strike"],
  [{ header: [1, 2, 3, 4, 5, 6, false] }],
  [{ list: "ordered" }, { list: "bullet" }],
  [{ color: [] }, { background: [] }],
];

const options = {
  // undo setting
  history: {
    delay: 500,
    maxStack: 500,
    userOnly: true,
  },
};
</script>

<style scoped>
.tips > div {
  /* padding: 12px 16px; */
  margin: 0px 16px;
}
.tips div.label {
  color: rgb(var(--v-theme-textmain)) !important;
  border-bottom: 1px solid rgb(212, 212, 212);
  font-size: large;
  padding: 12px 0;
  margin: 12px 0;
}
.tips div.editor {
  background-color: rgb(var(--v-theme-constract)) !important;
}
</style>

<style>
/* editor css overwrite */
.ql-editor {
  font-size: 1.1rem !important;
}
</style>
