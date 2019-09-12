import Vue from 'vue'
export default {
  saveAdminFeedback: (data) => {
    return Vue.$http.post('api/feedback/admin/save', data).then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  getAdminFeedbacks: () => {
    return Vue.$http.get('api/feedback/admin').then((x) => {
      return x
    }).catch(error => {
      return error
    })
  },
  getUserFeedbacks: () => {
    return Vue.$http.get('api/feedback/user').then((x) => {
      return x
    }).catch(error => {
      return error
    })
  }
}
