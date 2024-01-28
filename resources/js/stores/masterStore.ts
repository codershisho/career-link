import { ref } from "vue";
import { defineStore } from "pinia";
import { default as uService } from "@/services/user";
import { default as rService } from "@/services/reason";
import { User, Master } from "@/types/mastersType";

export const useMasterStore = defineStore("master", () => {
  const users = ref<User[] | null>();
  const reasons = ref<Master[] | null>();

  const fetchUsers = async () => {
    const res = await uService.index();
    users.value = res.data;
  };

  const fetchReasons = async () => {
    const res = await rService.index();
    reasons.value = res.data;
  };

  return {
    users,
    reasons,
    fetchUsers,
    fetchReasons,
  };
});
