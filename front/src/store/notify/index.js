/* eslint-disable */
import * as types from '../mutation-types'

const state = {
  errors: [],
  messages: []
}

const actions = {
  setErrors ({commit}, payload) {
    if (payload.error !== null && payload.error !== 'undefined' && payload.error.message !== null && payload.error.message !== 'undefined') {
      commit(types.SET_ERRORS, payload.error.message)
    } else commit(types.SET_ERRORS, payload)
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
