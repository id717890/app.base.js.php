export default function (Vue) {
  Vue.auth = {
    getToken () {
      let token = localStorage.getItem('token')
      if (!token) {
        return null
      }
      return token
    },
    setToken (token) {
      localStorage.setItem('token', token)
    },
    logout () {
      localStorage.removeItem('token')
    },
    isAuth () {
      if (this.getToken()) return true
      return false
    },
    hasRole (role) {
      if (this.isAuth() === true && this.decodeToken().role) {
        const roleFind = this.decodeToken().role.find(x => x === role)
        if (!roleFind || roleFind === null) return false
        else return true
      }
      return false
    },
    decodeToken () {
      var base64Url = this.getToken().split('.')[1]
      var base64 = base64Url.replace('-', '+').replace('_', '/')
      return JSON.parse(window.atob(base64))
    }
  }
  Object.defineProperties(Vue.prototype, {
    $auth: {
      get () {
        return Vue.auth
      }
    }
  })
}
