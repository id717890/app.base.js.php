import { createSlice } from '@reduxjs/toolkit'

const Auth = createSlice({
  name: 'catalog',
  initialState: {
    catalog: null,
  },
  reducers: {
    getCatalog() {},
    setCatalog(state, action) {
      state.catalog = action.payload
    },
  },
})

export const { setCatalog, getCatalog } = Auth.actions

export default Auth.reducer
