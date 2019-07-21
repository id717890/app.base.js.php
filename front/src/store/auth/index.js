import * as types from '../mutation-types'
import context from '../../api/auth'
import Vue from 'vue'
import router from '../../router'

const state = {
  user: null,
  token: null
}

// getters
const getters = {
  getUser (state) {
    return state.user
  },
  getError (state) {
    return state.error
  },
  getLoading (state) {
    return state.loading
  },
  isAuth: state => state.user != null && state.token != null
}

// actions
const actions = {
  async resetPasswordVerifyToken ({ dispatch }, payload) {
    return new Promise((resolve, reject) => {
      context.resetPasswordVerifyToken(payload.userId, payload.code, payload.password, payload.passwordConfirm).then((x) => {
        if (x.status === 200) {
          dispatch('setMessages', ['Пароль успешно изменен. Теперь Вы можете авторизоваться!'])
          resolve()
        } else {
          dispatch('setErrors', x.response.data)
          reject(x.response.data)
        }
      }).catch(x => {
        reject(x.response.data)
      })
    })
  },
  async forgotPassword ({ dispatch }, payload) {
    return new Promise((resolve, reject) => {
      context.forgotPassword(payload.email).then((x) => {
        if (x.status === 200) {
          dispatch('setMessages', 'На указанный E-mail выслана инструкция для восстановления пароля')
          resolve()
        } else {
          Object.keys(x.response.data).forEach(key => dispatch('setErrors', x.response.data[key]))
          reject(x.response.data)
        }
      }).catch(x => {
        reject(x.response.data)
      })
    })
  },
  async signUserIn ({ commit, dispatch }, payload) {
    return new Promise((resolve, reject) => {
      context.signIn(payload.email, payload.password).then((x) => {
        console.log(x)
        if (x.status === 200) {
          let token = x.data.access_token
          let expiration = x.data.expires_in
          let user = x.data.id
          commit(types.SET_USER, user)
          commit(types.SET_TOKEN, token)
          Vue.auth.setToken(token, expiration * 1000 + Date.now())
          Vue.auth.setUser(user)
          resolve()
        } else {
          dispatch('setErrors', x.response.data)
          reject(x.response)
        }
      }).catch(x => {
        dispatch('setErrors', x.response)
        reject(x.response)
      })
      // }
    })
  },
  async signUserUp ({ dispatch }, payload) {
    return new Promise((resolve, reject) => {
      context.signUp(payload).then((x) => {
        if (x.status === 200) {
          dispatch('setMessages', 'Account created. Please, confirm your email address.')
          resolve()
        } else {
          dispatch('setErrors', x.response.data)
          reject(x.response.data)
        }
      })
    })
  },
  async logout ({ commit }) {
    Vue.auth.logout()
    commit(types.SET_USER, null)
    commit(types.SET_TOKEN, null)
  },
  async autoSignIn ({ commit, dispatch }) {
    let credential = Vue.auth.getCredentials()
    if (credential == null) {
      dispatch('logout')
    } else {
      commit(types.SET_TOKEN, credential.token)
      commit(types.SET_USER, credential.id)
    }
  },
  async redirectToSignIn () {
    router.push('/login')
  }
}

// mutations
const mutations = {
  [types.SET_USER] (state, payload) {
    state.user = payload
  },
  [types.SET_LOADING] (state, payload) {
    state.loading = payload
  },
  [types.SET_TOKEN] (state, payload) {
    state.token = payload
  },
  [types.SIGN_UP] (state, payload) {
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
