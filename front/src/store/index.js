import Vue from 'vue'
import Vuex from 'vuex'
// import * as types from './mutation-types'
import auth from './auth'
import notify from './notify'
import user from './user'
import product from './product'
import news from './news'
import dialog from './dialog'
import payment from './payment'

Vue.use(Vuex)

export default new Vuex.Store({
  plugins: [
    store => {
      store.subscribeAction((action, state) => {
        // store.commit(types.CLEAR_ERRORS)
        // store.commit(types.SET_LOADING, true)
      })
    }
  ],
  modules: {
    auth,
    notify,
    user,
    product,
    news,
    dialog,
    payment
  }
})
