import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import(/* webpackChunkName: "about" */ './views/About.vue')
    },
    {
      path: '/signin',
      name: 'signin',
      component: () => import(/* webpackChunkName: "about" */ './views/Auth/SignIn.vue')
    },
    {
      path: '/test1',
      name: 'test1',
      component: () => import(/* webpackChunkName: "about" */ './views/Test1.vue')
    },
    {
      path: '/test2',
      name: 'test2',
      component: () => import(/* webpackChunkName: "about" */ './views/Test2.vue')
    }
  ]
})
