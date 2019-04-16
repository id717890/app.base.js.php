import Vue from 'vue'
import './plugins/vuetify'
import './plugins/font-awesome'
import './init/components'
// import '@fortawesome/fontawesome-free/css/all.css'
import App from './App.vue'
import router from './router'
import { store } from './store'
import './registerServiceWorker'

import Auth from './packages/auth'
Vue.use(Auth)

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
