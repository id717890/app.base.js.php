/* eslint-disable */
import * as types from '../mutation-types'

const state = {
  errors: [],
  messages: []
}

const actions = {
  setErrors ({commit}, payload) {
    if (typeof payload === 'string') {
      commit(types.SET_ERRORS, payload)
    } else {
      if (payload.error !== null && payload.error !== 'undefined' && payload.error.message !== null && payload.error.message !== 'undefined') {
        switch (typeof payload.error.message) {
          case 'string': commit(types.SET_ERRORS, payload.error.message)
          break
          case 'object': {
            Object.keys(payload.error.message).forEach(x => {
              switch (typeof payload.error.message[x]) {
                case 'string': commit(types.SET_ERRORS, payload.error.message[x])
                break
                case 'object': {
                  if (Array.isArray(payload.error.message[x])) {
                    payload.error.message[x].forEach(y => commit(types.SET_ERRORS, y))
                  }
                }
                break
              }
            })
  
          }
          break
        }
      }
    }
  },
  setMessages ({commit}, payload) {
    commit(types.SET_MESSAGES, payload)
  },
  clearAllMessages ({commit}) {
    commit(types.CLEAR_ERRORS)
    commit(types.CLEAR_MESSAGES)
  },
} 

const getters = {
  getErrors: state => state.errors,
  getMessages: state => state.messages
}

const mutations = {
  [types.CLEAR_ERRORS] (state) {
    state.errors = []
  },
  [types.CLEAR_MESSAGES] (state) {
    state.messages = []
  },
  [types.SET_ERRORS] (state, payload) {
    state.errors.push(payload)
  },
  [types.SET_MESSAGES] (state, payload) {
    state.messages.push(payload)
  }
}

export default {
  state,
  getters,
  actions,
  mutations,
}
