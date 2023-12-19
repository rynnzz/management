import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/Faculty',
      name: 'Faculty',

      component: () => import('../views/FacultyView.vue')
    },
    {
      path: '/Student',
      name: 'Student',

      component: () => import('../views/StudentsView.vue')
    },
    {
      path: '/Login',
      name: 'Login',

      component: () => import('../components/LoginComponent.vue')
    }
  ]
})

export default router
