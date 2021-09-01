import axios from 'axios'

const baseURL = 'http://localhost/reactapi/back/public/api'

const instance = axios.create({
  baseURL,
})

instance.interceptors.request.use(
  async (request) => {
    return request
  },
  (error) => Promise.reject(error)
)

export default instance
