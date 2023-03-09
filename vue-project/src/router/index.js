import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/skill/index',
    name: 'indexSkill',
    component: () => import('../views/skills/IndexSkill.vue')
  },
  {
    path: '/skill/create',
    name: 'createSkill',
    component: () => import('@/views/skills/CreateSkill.vue')
  },
  {
    path: '/skill/edit/:id',
    name: 'editSkill',
    component: () => import('@/views/skills/EditSkill.vue'),
    props:true,
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
