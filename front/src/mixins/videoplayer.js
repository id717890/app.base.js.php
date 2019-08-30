import { videoPlayer } from 'vue-video-player'
export default {
  components: {
    videoPlayer
  },
  computed: {
    // player () {
    //   return this.$refs.videoPlayer.player
    // }
  },
  methods: {
    onPlayerLoadeddata () {
    },
    onPlayerCanplay () {
    },
    onPlayerCanplaythrough () {
    },
    // listen event
    onPlayerPlay (player) {
      // console.log('player play!', player)
    },
    onPlayerPause (player) {
      // console.log('player pause!', player)
    },
    // ...player event

    // or listen state event
    playerStateChanged (playerCurrentState) {
      // console.log('player current update state', playerCurrentState)
    },
    // player is ready
    playerReadied (player) {
      // console.log('the player is readied', player)
      // you can use it to do something...
      // player.[methods]
    }
  },
  mounted () {
    // console.log('this is current player instance object', this.player)
  }
}
