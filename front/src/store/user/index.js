import context from '@/api/user'
// import Vue from 'vue'
import * as types from '../mutation-types'

const state = {
  allUsers: []
}

// actions
const actions = {
  async getAllUsers ({ commit, dispatch }, payload) {
    context.getAllUsers().then((x) => {
      if (x.status === 200) {
        commit(types.GET_ALL_USERS, x.data)
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
  [types.GET_ALL_USERS] (state, payload) {
    state.allUsers = payload
  }
}

// getters
const getters = {
  getUserById: state => id => {
    return state.allUsers.find(x => x.id === id)
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
