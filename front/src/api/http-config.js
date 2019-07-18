import Vue from 'vue'
import axios from 'axios'
import config from '../init/config'
import store from '../store'
// console.log(Vue.prototype.$auth.getToken());

const Axios = axios.create({
  baseURL: config.apiAddress,
  // baseURL: 'http://localhost/enw/backend/public/',
  headers: {
    // Accept: 'application/json',
    // 'Content-Type': 'application/json',
    // 'X-Requested-With': 'XMLHttpRequest',
  }
})

Axios.interceptors.request.use((config) => {
  config.headers.Authorization = 'Bearer ' + Vue.auth.getToken()
  return config
})

Axios.interceptors.response.use(response => {
  // NProgress.done()
  // store.dispatch('setLoading', false)
  return response
}, error => {
  if (error.response !== null && error.response !== undefined) {
    if (error.response.status === 403 || error.response.status === 401) {
      store.dispatch('logout')
      store.dispatch('redirectToSignIn')
    }
  }
  // NProgress.done()
  // store.dispatch('setLoading', false)
  return error
})

export default Axios
