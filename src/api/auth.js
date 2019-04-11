import Vue from 'vue'
import config from '../init/config'

export default {
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
    if (config.isLocalApp) {
      let user = users.find(x => x.email === email && x.password === password)
      return new Promise((resolve) => {
        resolve(user)
      })
    }
    return Vue.$http.post('api/auth/Login', data).then((x) => {
      return x
    }).catch(error => {
      // console.log('api')
      // console.log(error.response.data)
      // console.log(error.response.status)
      return error
    })
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

const users = [
  { id: 1, email: 'jusupovz@gmail.com', password: 'qweqwe' },
  { id: 2, email: 'email2@mail.ru', login: 'login2', password: 'pass' }
]
