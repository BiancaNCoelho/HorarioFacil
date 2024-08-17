import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// rotas de cada página
// cada rota é um objeto com os atributos path, name e component
// path é o caminho da rota
// name é o nome da rota
// component é o componente que será renderizado quando a rota for acessada
// o componente é importado de forma assíncrona com a função import
// componentes estão localizados na pasta views
const routes = [
    //{
    //  path: '/nome-da-rota',
    //  name: 'nome-da-rota',
    //  component: () => import('../views/NomeDaRotaView.vue')
    // },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/edit',
      name: 'edit',
      component: () => import('../views/EditClass.vue')
    }
  ];

const router = new VueRouter({
   routes,
   scrollBehavior() {
     return { x: 0, y: 0 };
   },
});
  

export default router
