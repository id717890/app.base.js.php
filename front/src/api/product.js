import Vue from 'vue'
// import config from '../init/config'
export default {
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
  updateProduct: (data) => {
    return Vue.$http.post('api/product/update', data).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  }
}
