import store from '../store'
import Vue from 'vue'

export default (from, to, next) => {
  let credetnrials = Vue.auth.getCredentials()
  // console.log('=====Auth guard=====')
  // console.log(credetnrials)
  // console.log(store.getters.isAuth)
  if (credetnrials === null || credetnrials === undefined) {
    store.dispatch('logout')
    next('/login')
  } else {
    next()
  }
}
