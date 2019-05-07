import Vue from 'vue'
import config from '../init/config'
import { users } from './data'
export default {
  getAllUsers: () => {
    if (config.isLocalApp === true) {
      return new Promise((resolve, reject) => {
        resolve({ status: 200, data: users })
      })
    } else {
      return Vue.$http.get('api/user').then((x) => {
        return x
      }).catch(error => {
        // console.log('api')
        // console.log(error.response.data)
        // console.log(error.response.status)
        return error
      })
    }
  }
}
