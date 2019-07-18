import context from '../../api/news'
// import Vue from 'vue'
import * as types from '../mutation-types'

const state = {
  news: []
}

// actions
const actions = {
  async getAllNews ({ commit, dispatch }, payload) {
    context.getNews(payload).then((x) => {
      if (x.status === 200) {
        commit(types.RECIEVE_NEWS, x.data)
      } else {
        dispatch('setErrors', x.response.data)
      }
    }).catch(x => {
      dispatch('setErrors', x.response.data)
    })
  },
  async saveNews ({ commit, dispatch }, payload) {
    return new Promise((resolve, reject) => {
      context.saveNews(payload).then((x) => {
        if (x.status === 200) {
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
  async updateNews ({ commit, dispatch }, payload) {
    return new Promise((resolve, reject) => {
      context.updateNews(payload).then((x) => {
        if (x.status === 200) {
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
  async deleteNews ({ commit, dispatch }, payload) {
    context.deleteNews(payload.id).then((x) => {
      if (x.status === 200) {
        commit(types.DELETE_NEWS, payload)
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
  [types.RECIEVE_NEWS] (state, payload) {
    state.news = payload
  },
  [types.DELETE_NEWS] (state, payload) {
    let findNews = state.news.indexOf(payload)
    if (findNews !== -1) {
      state.news.splice(findNews, 1)
    }
  }
}

// getters
const getters = {
  getNewsById: state => id => {
    return state.news.find(x => Number(x.id) === Number(id))
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
