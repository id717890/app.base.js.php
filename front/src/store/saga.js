import { all } from 'redux-saga/effects'
import catalogSaga from './catalog/sagas'
// import configRootSaga from "./config/sagas";
// import userRootSaga from "./user/sagas";
// import postsRootSaga from "./posts/sagas";
// import tradingRootSaga from "./trading/sagas";
// import searchRootSaga from "./search/sagas";

export default function* rootSaga() {
  console.log('root saga')
  yield all([
    catalogSaga(),
    // binanceRootSaga(),
    // configRootSaga(),
    // userRootSaga(),
    // postsRootSaga(),
    // searchRootSaga(),
  ])
}
