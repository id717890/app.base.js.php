import context from '../../api/product'
// import Vue from 'vue'
import * as types from '../mutation-types'

const state = {
  products: [],
  productsOfUser: null,
  prices: null,
  members: null,
  paid_content: null
}

// actions
const actions = {
  async clearAllAfterLogout ({ commit }) {
    commit(types.CLEAR_PRODUCTS_AFTER_LOGOUT)
  },
  // async getTraining ({ commit, dispatch }) {
  //   context.getTraining().then((x) => {
  //     if (x.status === 200) {
  //       commit(types.RECIEVE_PRODUCT_FLOW, x.data)
  //     } else {
  //       dispatch('setErrors', x.response.data)
  //     }
  //   }).catch(x => {
  //     dispatch('setErrors', x.response.data)
  //   })
  // },
  async getMembers ({ commit, dispatch }) {
    context.getMembers().then((x) => {
      if (x.status === 200) {
        commit(types.RECIEVE_PRODUCT_MEMBERS, x.data)
      } else {
        dispatch('setErrors', x.response.data)
      }
    }).catch(x => {
      dispatch('setErrors', x.response.data)
    })
  },
  async getProductPrices ({ commit, dispatch }) {
    context.getPrices().then((x) => {
      if (x.status === 200) {
        commit(types.RECIEVE_PRODUCT_PRICES, x.data)
      } else {
        dispatch('setErrors', x.response.data)
      }
    }).catch(x => {
      dispatch('setErrors', x.response.data)
    })
  },
  async acceptProduct ({ commit, dispatch }, payload) {
    return new Promise((resolve, reject) => {
      context.accept(payload).then((x) => {
        if (x.status === 200) {
          dispatch('getAllProductsForUser')
          resolve()
        } else {
          dispatch('setErrors', x.response.data)
          reject(x.response.data)
        }
      }).catch(x => {
        dispatch('setErrors', x.response.data)
        reject(x.response.data)
      })
    })
  },
  async acceptProductWithPrice ({ commit, dispatch }, payload) {
    return new Promise((resolve, reject) => {
      context.accept(payload).then((x) => {
        if (x.status === 200) {
          dispatch('getAllProductsForUser')
          resolve()
        } else {
          dispatch('setErrors', x.response.data)
          reject(x.response.data)
        }
      }).catch(x => {
        dispatch('setErrors', x.response.data)
        reject(x.response.data)
      })
    })
  },
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
  [types.CLEAR_PRODUCTS_AFTER_LOGOUT] (state) {
    state.paid_content = null
  },
  // [types.RECIEVE_PRODUCT_FLOW] (state, payload) {
  //   state.paid_content = payload
  // },
  [types.RECIEVE_PRODUCT_MEMBERS] (state, payload) {
    state.members = payload
  },
  [types.RECIEVE_PRODUCT_PRICES] (state, payload) {
    state.prices = payload
  },
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
    if (state.products) return state.products.find(x => Number(x.id) === Number(id))
    return null
  },
  getProductOfUserById: state => id => {
    if (state.productsOfUser) return state.productsOfUser.find(x => Number(x.product.id) === Number(id))
    return null
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
