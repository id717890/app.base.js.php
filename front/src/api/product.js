import Vue from 'vue'
// import config from '../init/config'
export default {
  getMembers: () => {
    return Vue.$http.get('api/products/members').then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  getPrices: () => {
    return Vue.$http.get('api/prices').then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  accept: (data) => {
    return Vue.$http.post('api/product/acceptProduct', data).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  getProducts: () => {
    return Vue.$http.get('api/product').then((x) => {
      return x
    }).catch(error => {
      // console.log('api')
      // console.log(error.response.data)
      // console.log(error.response.status)
      return error
    })
  },
  getProductsForUser: () => {
    return Vue.$http.get('api/products/get').then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  updateProduct: (data) => {
    return Vue.$http.post('api/product/update', data).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  }
}
