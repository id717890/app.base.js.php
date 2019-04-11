import Vue from 'vue'
import Vuex from 'vuex'
import * as types from './mutation-types'
import auth from './auth'

Vue.use(Vuex)

export const store = new Vuex.Store({
  plugins: [
    store => {
      store.subscribeAction((action, state) => {
        store.commit(types.CLEAR_ERRORS)
        // store.commit(types.SET_LOADING, true)
      })
    }
  ],
  modules: {
    auth
  }
})
