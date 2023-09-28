import { createRouter, createWebHashHistory } from "vue-router";
import Style from "@/views/StyleView.vue";
import Home from "@/views/HomeView.vue";
import Login from "@/views/LoginView.vue";
const routes = [
  {
    meta: {
      title: "Select style",
    },
    path: "/",
    name: "Login",
    component: Login,
  },
  {
    // Document title tag
    // We combine it with defaultDocumentTitle set in `src/main.js` on router.afterEach hook
    meta: {
      title: "Dashboard",
    },
    path: "/dashboard",
    name: "dashboard",
    component: Home,
  },
  {
    meta: {
      title: "Courses",
    },
    path: "/courses",
    name: "courses",
    component: () => import("@/views/CoursesView.vue"),
  },
  {
    meta: {
      title: "Tables",
    },
    path: "/tables",
    name: "tables",
    component: () => import("@/views/TablesView.vue"),
  },
  {
    meta: {
      title: "Forms",
    },
    path: "/forms",
    name: "forms",
    component: () => import("@/views/FormsView.vue"),
  },
  {
    meta: {
      title: "Profile",
    },
    path: "/profile",
    name: "profile",
    component: () => import("@/views/ProfileView.vue"),
  },
  {
    meta: {
      title: "Responsive layout",
    },
    path: "/responsive",
    name: "responsive",
    component: () => import("@/views/ResponsiveView.vue"),
  },
  {
    meta: {
      title: "Login",
    },
    path: "/login",
    name: "login",
    component: () => import("@/views/LoginView.vue"),
  },
  {
    meta: {
      title: "CreateCourse",
    },
    path: "/create-course",
    name: "create-course",
    component: () => import("@/views/CreateCourseView.vue"),
  },
  {
    meta: {
      title: "CourseDetails",
    },
    path: "/course-detail/:id", // Ruta con un parámetro ':id'
    name: "CourseDetailView",
    component: () => import("@/views/CourseDetailView.vue"),
  },
  {
    meta: {
      title: "Registeruser ",
    },
    path: "/registeruser",
    name: "registeruser",
    component: () => import("@/views/FormRegisterView.vue"),
  },
  {
    meta: {
      title: "SeeGrades",
    },
    path: "/grades",
    name: "grades",
    component: () => import("@/views/TablesGrade.vue"),
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    return savedPosition || { top: 0 };
  },
});

export default router;
