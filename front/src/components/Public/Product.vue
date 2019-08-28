<template>
  <v-layout column fill-height v-if="product !== null">
    <v-flex xs12 class="bg4 px-2">
      <v-layout row wrap v-if="product !== null && product !== undefined && product !== 'undefined'">
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 pa-5>
          <h2 class="text-xs-center" v-html="product.name"></h2>
        </v-flex>
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3>
          <v-img :src="require('../../../static/img/' + product.photo)" class="elevation-16" style="border: 18px solid white;"></v-img>
        </v-flex>
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 v-if="product !== null" class="pa-5 text-xs-center">
          <!-- <p>{{product.description}}</p> -->
          <!-- <hr class="mb-3"/> -->
          <section v-if="isAuth">
              <v-btn class="mr-3" large dark color="blue darken-3" style="margin: auto" @click.stop="introDialog = true" v-if="id == 1">
                <i class="fa fa-video fa-2x mr-2"></i>
                Intro
              </v-btn>
              <v-btn :to="'/lk/products'" large dark color="red darken-3" style="margin: auto" v-if="product.price>0">
                <i class="fab fa-cc-visa fa-2x mr-2"></i>
                Купить {{Number(product.price)}} руб.
              </v-btn>
              <v-btn to="/lk/products" large dark color="red darken-3" style="margin: auto" v-else>
                <i class="fa fa-dumbbell fa-2x mr-2"></i>
                Попробовать бесплатно
              </v-btn>
          </section>
          <section v-else>
            <v-btn class="mr-3" large dark color="blue darken-3" style="margin: auto" @click.stop="introDialog = true" v-if="id == 1">
              <i class="fa fa-video fa-2x mr-2"></i>
              Intro
            </v-btn>
            <h3 class="red--text">* Для покупки или тестирования программы нужно авторизоваться</h3>
          </section>
        </v-flex>
        <v-flex xs12>
          <component :is="productComponent" :product="productOfUser"></component>
        </v-flex>
      </v-layout>
    </v-flex>
    <v-dialog v-model="introDialog" max-width="580" min-height="auto">
      <v-card>
        <!-- <v-card-title class="headline">Use Google's location service?</v-card-title> -->
        <v-card-text>
          <video-player  class="video-player-box video-intro"
            ref="videoPlayer"
            :options="introOptions"
            :playsinline="true"
            customEventName="customstatechangedeventname"
            @play="onPlayerPlay($event)"
            @pause="onPlayerPause($event)"
            @ended="onPlayerEnded($event)"
            @waiting="onPlayerWaiting($event)"
            @loadeddata="onPlayerLoadeddata($event)"
            @canplay="onPlayerCanplay($event)"
            @canplaythrough="onPlayerCanplaythrough($event)"
            @statechanged="playerStateChanged($event)"
            @ready="playerReadied">
          </video-player>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="green darken-1"
            flat="flat"
            @click="dialog = false"
          >
            Цена №1
          </v-btn>

          <v-btn
            color="green darken-1"
            flat="flat"
            @click="dialog = false"
          >
            Цена №2
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-layout>
</template>

<script>
import { mapGetters } from 'vuex'
import authMixin from '../../mixins/auth'
import Challenge from '../Products/Challenge'
import ChallengeRegister from '../Products/ChallengeRegister'
import FlowRegister from '../Products/FlowRegister'
import Flow from '../Products/Flow'
import 'video.js/dist/video-js.css'
import { videoPlayer } from 'vue-video-player'

export default {
  mixins: [authMixin],
  props: ['id'],
  components: {
    'product1': Flow,
    'product1Register': FlowRegister,
    'product2': Challenge,
    'product2Register': ChallengeRegister,
    'videoPlayer': videoPlayer
  },
  data () {
    return {
      introDialog: false,
      introOptions: {
        // videojs options
        muted: false,
        height: '308',
        language: 'en',
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [{
          type: 'video/mp4',
          src: 'https://cloclo3.datacloudmail.ru/weblink/view/4dWP/zwNx5wDej?etag=4F01E21DA5816076E5E6B777EB879CE03B91024A&key=629e10c956f5d60f30ccd37aa71ebb6bdf5c77e3'
          // src: 'https://drive.google.com/uc?export=download&confirm=j5PF&id=1xzhouvWc8Uememn_gvdvKTfhkcNWu2ms'
        }],
        poster: '/static/images/author.jpg'
      }
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
      console.log('player play!', player)
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
  },
  computed: {
    ...mapGetters(['getProductById', 'getProductOfUserById']),
    product () {
      return this.getProductById(this.id)
    },
    productOfUser () {
      return this.getProductOfUserById(this.id)
    },
    productIsAccepted () {
      if (!this.isAuth) {
        return false
      } else {
        let product = this.getProductOfUserById(this.id)
        if (product) return product.accept
      }
      return false
    },
    productComponent () {
      if (this.productIsAccepted) {
        return 'product' + this.id
      } else {
        return 'product' + this.id + 'Register'
      }
    },
    player () {
      return this.$refs.videoPlayer.player
    }
  },
  async created () {
    // this.productComponent = this.id === 1 ? () => import('../Products/Flow') : () => import('../Products/Challenge')
    // this.product = this.getProductById(this.id)
    // this.productOfUser = this.getProductOfUserById(this.id)
  },
  watch: {
    'introDialog' (value) {
      if (value === false) {
        this.$refs.videoPlayer.player.pause()
      } else {
        this.$refs.videoPlayer.player.play()
      }
    },
    '$route' (to, from) {
      // this.productComponent = 'product'+this.id
      // this.product = this.getProductById(to.params.id)
      // if (this.id === 1) console.log(1)
      // this.productOfUser = this.getProductOfUserById(to.params.id)
    }
  }
}
</script>

<style>

</style>
