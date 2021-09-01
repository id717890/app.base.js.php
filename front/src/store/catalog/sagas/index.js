import { all, takeEvery } from 'redux-saga/effects'
import { getCatalog } from '../slice'
import getCatalogSage from './getCatalogSaga'
export default function* userRootSaga() {
  yield all([takeEvery(getCatalog, getCatalogSage)])
}
