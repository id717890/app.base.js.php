import Vue from 'vue'
import './plugins/vuetify'
import './plugins/font-awesome'
import './init/components'
import '@fortawesome/fontawesome-free/css/all.css'
import 'video.js/dist/video-js.css'
import 'aos/dist/aos.css'
import App from './App.vue'
import router from './router'
import store from './store'
import './registerServiceWorker'
import AxiosConfig from './api/http-config'
import VueJsModal from 'vue-js-modal'
import Auth from './packages/auth'
import AOS from 'aos'
AOS.init()
Vue.use(Auth)
Vue.$http = AxiosConfig

Vue.config.productionTip = false
Vue.use(VueJsModal, { dynamic: true })

new Vue({
  router,
  store,
  render: h => h(App),
  async created () {
    this.$store.dispatch('autoSignIn')
    this.$store.dispatch('getProductPrices')
  }
}).$mount('#app')
