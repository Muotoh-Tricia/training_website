import AllTrainee from '@/views/AllTrainee.vue';
import CreateTrainee from '@/views/CreateTrainee.vue';
import Edit from '@/views/Edit.vue';
import HomeView from '@/views/HomeView.vue';
import ViewDetails from '@/views/ViewDetails.vue';
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
      component: CreateTrainee,
    },
    {
      path: "/AllTrainee",
      name: "AllTrainee",
      component: AllTrainee,
    },

    {
      path: "/ViewDetails/:id",
      name: "ViewDetails",
      component: ViewDetails,
    },
    {
      path: "/Edit/:id/edit",
      name: "Edit",
      component: Edit,
    },
  ],
});

export default router
