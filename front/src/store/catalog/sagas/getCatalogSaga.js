import { put } from 'redux-saga/effects'
import transport from '../../../modules/transport'
import url from '../../URLS'
import { setCatalog } from '../slice'
// import { put } from 'redux-saga/effects'
// import * as actions from '../slice'

export default function* getCatalogSaga() {
  try {
    const { data, status } = yield transport.get(url.getCatalogs)
    if (status === 200) {
      yield put(setCatalog(data))
    }
  } catch (error) {
    console.error('getCatalogSaga', error)
  }
}
