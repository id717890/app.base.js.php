import Vue from 'vue'
import config from '../init/config'
import { users } from './data'
export default {
  reset: (data) => {
    return Vue.$http.post('api/reset2', data).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  resetLk: (data) => {
    return Vue.$http.post('api/resetLk', data).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  resetSendEmail: (data) => {
    return Vue.$http.post('api/reset1', data).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  confirmation: (code) => {
    return Vue.$http.get('api/verifyUser/' + code).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
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
        return error
      })
    }
  },
  signUp: (data) => {
    return Vue.$http.post('api/register', data).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  }
}
