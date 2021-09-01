import { combineReducers } from 'redux'
import auth from './auth/slice'
import catalog from './catalog/slice'

export default combineReducers({
  auth,
  catalog,
})
