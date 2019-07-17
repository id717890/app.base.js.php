import Vue from 'vue'
export default {
  saveNews: () => {
    return Vue.$http.post('api/news/create').then((x) => {
      return x
    }).catch(error => {
      return error
    })
  }
}
