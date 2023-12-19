import { createApp } from "vue";
import App from "./App.vue";
import Login from "./views/LoginView.vue";
import adminPrivilage from "./AdminPrivilage.vue";
import FacultyPage from "./FacultyPage.vue";
import StudentPage from "./StudentPage.vue";
import router from "./router";
import { user } from "./store/user";

function handleUserRoutes(userType) {
  const app = createApp(userType === "admin" ? App : userType === "adminPrivilage" ? adminPrivilage :userType === "students" ? StudentPage :userType === "faculty" ? FacultyPage : Login);
  app.use(router); 

  
  if (userType === "admin") {
    router.push("/"); 
  } else if (userType === "adminPrivilage") {
    router.push("/"); 
  } else if (userType === "students") {
    router.push("/Studentview"); 
  }else if (userType === "faculty") {
    router.push("/Facultyview"); 
  } else {
    router.push("/login"); 
  }

  app.mount("#app");
}

handleUserRoutes(user);
