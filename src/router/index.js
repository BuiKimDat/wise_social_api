import { createRouter, createWebHistory } from 'vue-router'
import AuthComponent from '@/views/AuthComponent.vue';
import IndexComponent from '@/views/IndexComponent.vue';
import MyProfileComponent from '@/views/MyProfileComponent.vue';
import UserProfileComponent from '@/views/UserProfileComponent.vue';
import MessageComponent from '@/views/MessageComponent.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/auth',
      name: 'auth',
      component: AuthComponent
    },
    {
      path: '/index',
      name: 'index',
      component: IndexComponent
    },
    {
      path: '/my-profile',
      name: 'my-profile',
      component: MyProfileComponent
    },
    {
      path: '/user-profile',
      name: 'user-profile',
      component: UserProfileComponent
    },
    {
      path: '/message',
      name: 'message',
      component: MessageComponent
    },
  ]
});

export default router
