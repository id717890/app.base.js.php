import Vue from 'vue'
export default {
  saveNews: (data) => {
    return Vue.$http.post('api/news/create', data).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  }
}
