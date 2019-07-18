import context from '@/api/news'
// import Vue from 'vue'
import * as types from '../mutation-types'

const state = {
  products: []
}

// actions
const actions = {
  async saveNews ({ commit, dispatch }, payload) {
    context.saveNews(payload).then((x) => {
      if (x.status === 200) {
        commit(types.SAVE_NEWS, x.data)
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
  [types.RECIEVE_PRODUCT] (state, payload) {
    state.products = payload
  }
}

// getters
const getters = {
  // getProductById: state => id => {
  //   return state.products.find(x => Number(x.id) === Number(id))
  // }
}

export default {
  state,
  getters,
  actions,
  mutations
}
