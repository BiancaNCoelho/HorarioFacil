import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue')
    }
  ];

const router = new VueRouter({
   routes,
   scrollBehavior() {
     return { x: 0, y: 0 };
   },
});
  

export default router
