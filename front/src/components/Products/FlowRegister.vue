<template>
    <!-- <h1>Здесь будет регистрация на FLOW</h1> -->
    <!-- <iframe src="https://drive.google.com/file/d/1E5JGf4CIe5rj7B1GPohG2-gkR2Gm888G/preview" width="640" height="480"></iframe> -->
    <v-flex class="d-block">
      <video-player  class="video-player-box"
                 ref="videoPlayer"
                 :options="playerOptions"
                 :playsinline="true"
                 customEventName="customstatechangedeventname"
                 @play="onPlayerPlay($event)"
                 @pause="onPlayerPause($event)"
                 @ended="onPlayerEnded($event)"
                 @waiting="onPlayerWaiting($event)"
                 @playing="onPlayerPlaying($event)"
                 @loadeddata="onPlayerLoadeddata($event)"
                 @timeupdate="onPlayerTimeupdate($event)"
                 @canplay="onPlayerCanplay($event)"
                 @canplaythrough="onPlayerCanplaythrough($event)"
                 @statechanged="playerStateChanged($event)"
                 @ready="playerReadied">
  </video-player>
    </v-flex>
</template>

<script>
import 'video.js/dist/video-js.css'
import { videoPlayer } from 'vue-video-player'

export default {
  components: {
    videoPlayer
  },
  data () {
    return {
      playerOptions: {
        // videojs options
        muted: true,
        height: '360',
        language: 'en',
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [{
          type: 'video/mp4',
          src: 'https://drive.google.com/uc?export=download&confirm=2wnC&id=1vgtY2oMps3JrTYlpb5AdhGAH00ReFHLN'
          // src: 'https://drive.google.com/uc?export=download&confirm=j5PF&id=1xzhouvWc8Uememn_gvdvKTfhkcNWu2ms'
        }],
        poster: '/static/images/author.jpg'
      }
    }
  },
  mounted () {
    console.log('this is current player instance object', this.player)
  },
  computed: {
    player () {
      return this.$refs.videoPlayer.player
    }
  },
  methods: {
    onPlayerLoadeddata () {
    },
    onPlayerCanplay () {
    },
    onPlayerCanplaythrough () {
    },
    handler (e) {
      console.log('context')
      e.preventDefault()
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
      console.log('the player is readied', player)
      // you can use it to do something...
      // player.[methods]
    }
  }
}
</script>

<style>

</style>
