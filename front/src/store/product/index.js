import context from '../../api/product'
// import Vue from 'vue'
import * as types from '../mutation-types'

const state = {
  products: [],
  productsOfUser: null
}

// actions
const actions = {
  async getAllProductsForUser ({ commit, dispatch }) {
    context.getProductsForUser().then((x) => {
      if (x.status === 200) {
        commit(types.RECIEVE_USER_PRODUCTS, x.data)
      } else {
        dispatch('setErrors', x.response.data)
      }
    }).catch(x => {
      dispatch('setErrors', x.response.data)
    })
  },
  async getAllProducts ({ commit, dispatch }) {
    context.getProducts().then((x) => {
      if (x.status === 200) {
        commit(types.RECIEVE_PRODUCT, x.data)
      } else {
        dispatch('setErrors', x.response.data)
      }
    }).catch(x => {
      dispatch('setErrors', x.response.data)
    })
  },
  async updateProduct ({ commit, dispatch }, payload) {
    return new Promise((resolve, reject) => {
      context.updateProduct(payload).then((x) => {
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
  }
}

// mutations
const mutations = {
  [types.RECIEVE_PRODUCT] (state, payload) {
    state.products = payload
  },
  [types.RECIEVE_USER_PRODUCTS] (state, payload) {
    state.productsOfUser = payload
  }
}

// getters
const getters = {
  getProductById: state => id => {
    return state.products.find(x => Number(x.id) === Number(id))
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
