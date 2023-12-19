import { ref } from "vue";

const isUser = ref(localStorage.getItem("isUser"));
const user =isUser.value;
export { user };
