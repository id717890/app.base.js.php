import Vue from 'vue'
import axios from 'axios'
import config from '../init/config'

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

export default Axios
