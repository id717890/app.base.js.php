// import Vue from 'vue'
import config from '../init/config'
import { users } from './data'
export default {
  getAllUsers: () => {
    if (config.isLocalApp === true) {
      return new Promise((resolve, reject) => {
        resolve({ status: 200, data: users })
      })
    } else {
    }
  }
}
