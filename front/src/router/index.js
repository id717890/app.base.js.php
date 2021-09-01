import { HOME, TEST, TEST_PRIVATE } from "./routes"
import Home from "../views/Home"
import Test from "../views/Test"
import TestPrivate from "../views/TestPrivate"

export const publicRoutes = [
  { id: HOME, path: "/", exact: true, component: Home },
  { id: TEST, path: "/test", exact: true, component: Test },
]

export const privateRoutes = [{ id: TEST_PRIVATE, path: "/private", exact: true, component: TestPrivate }]
