import Vue from 'vue'
import Router from 'vue-router'
import authGuard from './auth-guard'

Vue.use(Router)

const router = new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'Home',
      redirect: { name: 'Home2' },
      components: {
        main: () => import('../components/LayoutGuest.vue')
        // routerguest: () => import('../components/Public/Home.vue') }
      },
      children: [
        { path: 'home', name: 'Home2', components: { routerguest: () => import('../components/Public/Home.vue') } },
        { path: 'about', name: 'about', components: { routerguest: () => import('../components/Public/About.vue') } },
        { path: 'articles', name: 'Articles', components: { routerguest: () => import('../components/Public/Article/Index.vue') } },
        { path: 'article/:id', name: 'Article', props: { routerguest: true }, components: { routerguest: () => import('../components/Public/Article/Item.vue') } },
        { path: 'product/:id', props: { routerguest: true }, name: 'Product', components: { routerguest: () => import('../components/Public/Product.vue') } },
        { path: 'contacts', name: 'Contacts', components: { routerguest: () => import('../components/Public/Contacts.vue') } },
        { path: 'login', name: 'LogIn', components: { routerguest: () => import('../components/Public/Auth/LogIn.vue') } },
        { path: 'register', name: 'Register', components: { routerguest: () => import('../components/Public/Auth/Register.vue') } },
        { path: 'confirm/:code', name: 'Confirm', props: { routerguest: true }, components: { routerguest: () => import('../components/Public/Auth/Confirm.vue') } },
        { path: 'forgot', name: 'ForgotPassword', components: { routerguest: () => import('../components/Public/Auth/ForgotPassword.vue') } },
        { path: 'reset/:code', name: 'ResetPassword', props: { routerguest: true }, components: { routerguest: () => import('../components/Public/Auth/ResetPassword.vue') } }
      ]
    },
    {
      path: '/dashboard',
      name: 'DashboardHome',
      redirect: { name: 'Members' },
      beforeEnter: authGuard,
      components: { main: () => import('../components/LayoutAdmin.vue') },
      children: [
        { path: 'news', name: 'NewsAdmin', beforeEnter: authGuard, components: { routeradmin: () => import('../components/Private/Admin/News/Index.vue') } },
        { path: 'news/create', name: 'NewsCreate', beforeEnter: authGuard, components: { routeradmin: () => import('../components/Private/Admin/News/Create.vue') } },
        { path: 'news/edit/:id', name: 'NewsEdit', beforeEnter: authGuard, components: { routeradmin: () => import('../components/Private/Admin/News/Edit.vue') } },
        // { path: 'products', name: 'ProductsAdmin', beforeEnter: authGuard, components: { routeradmin: () => import('../components/Private/Admin/Products.vue') } },
        { path: 'members', name: 'Members', beforeEnter: authGuard, components: { routeradmin: () => import('../components/Private/Admin/Member/Index.vue') } },
        { path: 'settings', name: 'SettingsAdmin', beforeEnter: authGuard, components: { routeradmin: () => import('../components/Private/User/Settings.vue') } }
        // { path: 'users', name: 'Users', beforeEnter: authGuard, component: () => import('../views/Private/User/List.vue') },
        // { path: 'user/create', name: 'CreateUser', beforeEnter: authGuard, component: () => import('../views/Private/User/Create.vue') },
        // { path: 'user/edit/:id', name: 'EditUser', beforeEnter: authGuard, component: () => import('../views/Private/User/Edit.vue') },
        // { path: 'roles', name: 'Roles', beforeEnter: authGuard, component: () => import('../views/Private/Role.vue') }
      ]
    },
    {
      path: '/lk',
      name: 'LkHome',
      redirect: { name: 'ProductsUser' },
      beforeEnter: authGuard,
      components: { main: () => import('../components/LayoutUser.vue') },
      children: [
        { path: 'products', name: 'ProductsUser', beforeEnter: authGuard, components: { routeruser: () => import('../components/Private/User/Products.vue') } },
        { path: 'settings', name: 'SettingsUser', beforeEnter: authGuard, components: { routeruser: () => import('../components/Private/User/Settings.vue') } }
      ]
    }
    // { path: '/notify', name: 'Notify', component: () => import('../views/Shared/Notify') },

    // // { path: '/resetpassword', name: 'ResetPassword', component: () => import('../views/Auth/ResetPassword.vue') },
    // { path: '/test1', name: 'test1', component: () => import('../views/Test1.vue') },
    // { path: '/test2', name: 'test2', component: () => import('../views/Test2.vue') }
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
