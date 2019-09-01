import config from '../../init/config'

const state = {
  yandex: {
    receiver: '410016208060232',
    // receiver: '410019943426292',
    quickpayForm: 'donate',
    needFio: false,
    needEmail: false,
    needPhone: false,
    needAddress: false,
    successURL: config.webAddress + 'lk/products'
  }
}

// actions
const actions = {
}

// mutations
const mutations = {
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
