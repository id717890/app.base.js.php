import Vue from 'vue'
import config from '../init/config'
import { users } from './data'
export default {
  checkAdmin: () => {
    return Vue.$http.post('api/auth/checkadmin').then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  resetPasswordVerifyToken: (id, code, password, passwordConfirm) => {
    const data = {
      userId: id,
      code: code,
      password: password,
      passwordConfirm: passwordConfirm
    }
    return Vue.$http.post('api/account/PasswordReset', data).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  forgotPassword: (email) => {
    const data = {
      email: email
    }
    return Vue.$http.post('api/account/ForgotPassword', data).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  signIn: (email, password) => {
    const data = {
      email: email,
      password: password
    }
    if (config.isLocalApp === true) {
      return new Promise((resolve, reject) => {
        let user = users.find(x => x.email === data.email && x.password === data.password)
        if (user) resolve({ status: 200, data: user })
        else resolve({ status: 400, data: 'User not found' })
      })
    } else {
      return Vue.$http.post('api/auth/Login', data).then((x) => {
        return x
      }).catch(error => {
        // console.log('api')
        // console.log(error.response.data)
        // console.log(error.response.status)
        return error
      })
    }
  },
  signUp: (email, password, passwordConfirm, firstName, lastName) => {
    const data = {
      email: email,
      password: password,
      passwordConfirm: passwordConfirm,
      firstName: firstName,
      lastName: lastName
    }
    // console.log(data)
    return Vue.$http.post('api/account/register', data).then((x) => {
      return x
    }).catch(error => {
      // console.log('api')
      // console.log(error.response.data)
      // console.log(error.response.status)
      return error
    })
  }
}
