import Vue from 'vue'
export default {
  getNews: () => {
    return Vue.$http.get('api/news').then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  updateNews: (data) => {
    return Vue.$http.post('api/news/update', data).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  deleteNews: (id) => {
    return Vue.$http.post('api/news/delete/' + id).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  saveNews: (data) => {
    return Vue.$http.post('api/news/create', data).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  }
}
