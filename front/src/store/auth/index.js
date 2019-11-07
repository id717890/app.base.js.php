import * as types from '../mutation-types'
import context from '../../api/auth'
import Vue from 'vue'
import router from '../../router'

const state = {
  user: null,
  token: null,
  role: null,
  name: null
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
  isAuth: state => state.user != null && state.token != null,
  isAdmin: state => state.role !== null && state.role === 'admin'
}

// actions
const actions = {
  async reset ({ dispatch }, payload) {
    dispatch('clearAllMessages')
    return new Promise((resolve, reject) => {
      context.reset(payload).then((x) => {
        if (x.status === 200 && x.data.success === true) {
          dispatch('setMessages', 'Новый пароль успешно сохранен')
          resolve()
        } else {
          dispatch('setErrors', x.data)
          reject(x)
        }
      })
    })
  },
  async resetLk ({ dispatch }, payload) {
    return new Promise((resolve, reject) => {
      context.resetLk(payload).then((x) => {
        if (x.status === 200 && x.data.success === true) {
          dispatch('setMessages', 'Новый пароль успешно сохранен')
          resolve()
        } else {
          dispatch('setErrors', x.data)
          reject(x)
        }
      })
    })
  },
  async confirmation ({ dispatch }, payload) {
    return new Promise((resolve, reject) => {
      context.confirmation(payload).then((x) => {
        if (x.status === 200 && x.data.success === true) {
          dispatch('setMessages', 'Учетная запись успешно подтверждена, теперь вы можете авторизоваться.')
          resolve()
        } else {
          reject(x)
        }
      }).catch(x => {
        dispatch('setErrors', 'Ошибка при верификации')
        reject(x)
      })
    })
  },
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
      context.resetSendEmail(payload).then((x) => {
        if (x.status === 200 && x.data.success === true) {
          dispatch('setMessages', 'На указанный E-mail выслана инструкция для восстановления пароля')
          resolve()
        } else {
          dispatch('setErrors', x.response.data)
          reject(x)
        }
      })
    })
  },
  async signUserIn ({ commit, dispatch }, payload) {
    return new Promise((resolve, reject) => {
      context.signIn(payload.email, payload.password).then((x) => {
        if (x.status === 200) {
          let token = x.data.access_token
          let expiration = x.data.expires_in
          let user = x.data.id
          let role = x.data.role
          let name = x.data.name
          commit(types.SET_USER, user)
          commit(types.SET_TOKEN, token)
          commit(types.SET_ROLE, role)
          commit(types.SET_NAME, name)
          Vue.auth.setToken(token, expiration * 1000 + Date.now())
          Vue.auth.setUser(user)
          Vue.auth.setRole(role)
          Vue.auth.setName(name)
          resolve()
        } else {
          dispatch('setErrors', x.response.data)
          reject(x.response)
        }
      }).catch(x => {
        dispatch('setErrors', x.response)
        reject(x.response)
      })
    })
  },
  async signUserUp ({ dispatch }, payload) {
    return new Promise((resolve, reject) => {
      context.signUp(payload).then((x) => {
        if (x.status === 200) {
          dispatch('setMessages', 'Аккаунт создан. Пожалуйста, подтвердите его пройдя по ссылке которая отправлена на почту.')
          dispatch('setMessages', 'Если Вы используете почту Gmail, письмо может попасть в раздел "Спам"')
          resolve()
        } else {
          dispatch('setErrors', x.response.data)
          reject(x.response.data)
        }
      })
    })
  },
  async logout ({ commit, dispatch }) {
    Vue.auth.logout()
    commit(types.SET_USER, null)
    commit(types.SET_TOKEN, null)
    commit(types.SET_ROLE, null)
    commit(types.SET_NAME, null)
    dispatch('clearAllAfterLogout')
  },
  async autoSignIn ({ commit, dispatch }) {
    let credential = Vue.auth.getCredentials()
    if (credential == null) {
      dispatch('logout')
    } else {
      commit(types.SET_TOKEN, credential.token)
      commit(types.SET_USER, credential.id)
      commit(types.SET_ROLE, credential.role)
      commit(types.SET_NAME, credential.name)
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
  [types.SET_ROLE] (state, payload) {
    state.role = payload
  },
  [types.SET_NAME] (state, payload) {
    state.name = payload
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
