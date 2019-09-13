import context from '../../api/feedback'
import * as types from '../mutation-types'

const state = {
  feedbacksOfUser: null,
  feedbacksOfAdmin: null
}

// actions
const actions = {
  async saveUserFeedback ({ commit, dispatch }, payload) {
    // console.log(payload)
    dispatch('clearAllMessages')
    return new Promise((resolve, reject) => {
      context.saveUserFeedback(payload).then((x) => {
        if (x.status === 200) {
          dispatch('setMessages', 'Ваш отзыв успешно отправлен!')
          resolve()
        } else {
          reject(x.response.data)
          dispatch('setErrors', x.response.data)
        }
      }).catch(x => {
        reject(x.response.data)
        dispatch('setErrors', x.response.data)
      })
    })
  },
  async saveAdminFeedback ({ commit, dispatch }, payload) {
    // console.log(payload)
    dispatch('clearAllMessages')
    return new Promise((resolve, reject) => {
      context.saveAdminFeedback(payload).then((x) => {
        if (x.status === 200) {
          commit(types.SAVE_ADMIN_FEEDBACK, payload)
          resolve()
        } else {
          reject(x.response.data)
          dispatch('setErrors', x.response.data)
        }
      }).catch(x => {
        reject(x.response.data)
        dispatch('setErrors', x.response.data)
      })
    })
  },
  async getAdminFeedbacks ({ commit, dispatch }) {
    dispatch('clearAllMessages')
    context.getAdminFeedbacks().then((x) => {
      if (x.status === 200) {
        commit(types.RECIEVE_ADMIN_FEEDBACKS, x.data)
      } else {
        dispatch('setErrors', x.response.data)
      }
    }).catch(x => {
      dispatch('setErrors', x.response.data)
    })
  },
  async getUserFeedbacks ({ commit, dispatch }) {
    context.getUserFeedbacks().then((x) => {
      if (x.status === 200) {
        commit(types.RECIEVE_USER_FEEDBACKS, x.data)
      } else {
        dispatch('setErrors', x.response.data)
      }
    }).catch(x => {
      dispatch('setErrors', x.response.data)
    })
  }
}

// mutations
const mutations = {
  [types.RECIEVE_ADMIN_FEEDBACKS] (state, payload) {
    state.feedbacksOfAdmin = payload
  },
  [types.RECIEVE_USER_FEEDBACKS] (state, payload) {
    state.feedbacksOfUser = payload
  },
  [types.SAVE_ADMIN_FEEDBACK] (state, payload) {
    let find = state.feedbacksOfAdmin.find(x => x.id === payload.id)
    if (find !== null && find !== undefined && find !== 'undefined') {
      find.is_show = payload.is_show === false ? 0 : 1
      find.text_user = payload.text_user
      find.text_admin = payload.text_admin
    }
  }
}

// getters
const getters = {
}

export default {
  state,
  getters,
  actions,
  mutations
}
