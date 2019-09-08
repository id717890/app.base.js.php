export default {
  methods: {
    delayRand (min, max) {
      let result = Math.floor(Math.random() * max) + min
      return result
    },
    effectZoomRand () {
      const effects = [
        { id: 1, name: 'zoom-in' },
        { id: 2, name: 'zoom-in-down' },
        { id: 3, name: 'zoom-in-up' },
        { id: 4, name: 'zoom-in-left' },
        { id: 5, name: 'zoom-in-right' },
        { id: 6, name: 'zoom-out' },
        { id: 7, name: 'zoom-out-down' },
        { id: 8, name: 'zoom-out-up' },
        { id: 9, name: 'zoom-out-left' },
        { id: 10, name: 'zoom-out-right' }
      ]
      let result = Math.floor(Math.random() * effects.length) + 1
      let effect = effects.find(x => x.id === result)
      return effect.name
    }
  }
}
