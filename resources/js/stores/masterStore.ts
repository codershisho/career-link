import { ref } from "vue";
import { defineStore } from "pinia";
import { default as uService } from "@/services/user";
import { default as rService } from "@/services/reason";
import { User, Master } from "@/types/mastersType";

export const useMasterStore = defineStore("master", () => {
  const users = ref<User[] | null>();
  const reasons = ref<Master[] | null>();
  const editReason = ref<Master>({
    id: 0,
    name: "",
  });

  const fetchUsers = async () => {
    const res = await uService.index();
    users.value = res.data;
  };

  const fetchReasons = async () => {
    const res = await rService.index();
    reasons.value = res.data;
  };

  const upsertReason = async () => {
    await rService.upsert(editReason.value);
  };

  return {
    users,
    reasons,
    editReason,
    fetchUsers,
    fetchReasons,
    upsertReason,
  };
});
