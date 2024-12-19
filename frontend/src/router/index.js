import AllTrainee from '@/views/AllTrainee.vue';
import CreateTrainee from '@/views/CreateTrainee.vue';
import HomeView from '@/views/HomeView.vue';
import { createRouter, createWebHistory } from 'vue-router'
// import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/createTrainee",
      name: "CreateTrainee",
      component:CreateTrainee,
    },
    {
      path: "/AllTrainee",
      name: "AllTrainee",
      component: AllTrainee,
    },
  ],
});

export default router
