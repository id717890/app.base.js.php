import Vue from 'vue'
import Router from 'vue-router'
// import Home from '../views/Home.vue'
import authGuard from './auth-guard'

Vue.use(Router)

const router = new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../components/LayoutGuest.vue'),
      children: [
        { path: 'login', name: 'LogIn', component: () => import('../views/Auth/LogIn.vue') }
      ]
    },
    {
      path: '/dashboard',
      name: 'DashboardHome',
      beforeEnter: authGuard,
      component: () => import('../components/LayoutAdmin.vue'),
      children: [
        { path: 'editor', name: 'Editor', beforeEnter: authGuard, component: () => import('../components/Editor.vue') },
        { path: 'users', name: 'Users', beforeEnter: authGuard, component: () => import('../views/Private/User/List.vue') },
        { path: 'user/create', name: 'CreateUser', beforeEnter: authGuard, component: () => import('../views/Private/User/Create.vue') },
        { path: 'user/edit/:id', name: 'EditUser', beforeEnter: authGuard, component: () => import('../views/Private/User/Edit.vue') },
        { path: 'roles', name: 'Roles', beforeEnter: authGuard, component: () => import('../views/Private/Role.vue') }
      ]
    },
    { path: '/forgot', name: 'ForgotPassword', component: () => import('../views/Auth/ForgotPassword.vue') },
    { path: '/register', name: 'Register', component: () => import('../views/Auth/Register.vue') },
    { path: '/notify', name: 'Notify', component: () => import('../views/Shared/Notify') },

    // { path: '/resetpassword', name: 'ResetPassword', component: () => import('../views/Auth/ResetPassword.vue') },
    { path: '/about', name: 'about', component: () => import('../views/About.vue') },
    { path: '/test1', name: 'test1', component: () => import('../views/Test1.vue') },
    { path: '/test2', name: 'test2', component: () => import('../views/Test2.vue') }
  ]
})

router.beforeEach(
  (to, from, next) => {
    let credetnrials = Vue.auth.getCredentials()
    if (credetnrials !== null && credetnrials !== undefined) {
      if (to.matched.some(x => x.meta.protected)) {
        next('/dashboard')
      } else next()
    } else {
      next()
    }
  }
)
export default router
