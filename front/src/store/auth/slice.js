import { createSlice } from '@reduxjs/toolkit'

const Auth = createSlice({
  name: 'user',
  initialState: {
    user: null,
  },
  reducers: {
    setUser() {},
  },
})

export const { setUser } = Auth.actions

export default Auth.reducer
