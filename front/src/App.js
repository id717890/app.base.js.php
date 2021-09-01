import { useDispatch } from 'react-redux'
import './assets/scss/_app.scss'
import logo from './logo.svg'
import { getCatalog } from './store/catalog/slice'

function App() {
  const dispatch = useDispatch()

  dispatch(getCatalog())
  return (
    <div className="App">
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
        <p>
          Edit <code>src/App.js</code> and save to reload.
        </p>
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
      </header>
    </div>
  )
}

export default App
