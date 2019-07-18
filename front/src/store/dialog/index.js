import * as types from '../mutation-types'

const state = {
  defaultDialog: false,
  congratulationDialog: false,
  messages: [],
  confirmDialogResult: false
}

// getters
const getters = {
}

// actions
const actions = {
  acceptConfirmDialog ({ commit }) {
    commit(types.SET_RESULT_CONFIRM_DIALOG, true)
  },
  resetConfirmDialogResult ({ commit }) {
    commit(types.SET_RESULT_CONFIRM_DIALOG, false)
  },
  // callConfirmDialog ({commit}, payload) {
  //   return new Promise((resolve, reject) => {
  //     commit(types.SET_QUESTION_FOR_CONFIRM_DIALOG, payload)
  //     commit(types.SHOW_CONFIRM_DIALOG, true)

  //     context.signUp(payload.email, payload.password, payload.passwordConfirm, payload.firstName, payload.lastName).then((x) => {
  //       if (x.status === 200) {
  //         dispatch('setMessages', ['Accont create. Please, confirm your email address.'])
  //         resolve()
  //       } else {
  //         dispatch('setErrors', x.response.data)
  //         reject(x.response.data)
  //       }
  //     }).catch(x => {
  //       reject(x.response.data)
  //     })
  //   })
  // },
  setMessageDialog ({ commit }, payload) {
    commit(types.SET_MESSAGE_DIALOG, payload)
  },
  clearMessageDialog ({ commit }) {
    commit(types.CLEAR_MESSAGE_DIALOG)
  },
  showCongratulationDialog ({ commit }, payload) {
    commit(types.SHOW_CONGRATULATION_DIALOG, payload)
  }
}

// mutations
const mutations = {
  [types.SET_RESULT_CONFIRM_DIALOG] (state, payload) {
    state.confirmDialogResult = payload
  },
  [types.SHOW_CONGRATULATION_DIALOG] (state, payload) {
    state.congratulationDialog = payload
  },
  [types.SET_MESSAGE_DIALOG] (state, payload) {
    state.messages.push(payload)
  },
  [types.CLEAR_MESSAGE_DIALOG] (state) {
    state.messages = []
    state.congratulationDialog = false
    state.defaultDialog = false
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
