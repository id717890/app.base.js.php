<template>
  <v-layout column fill-height v-if="product !== null">
    <v-flex xs12 class="bg4">
      <v-layout row wrap v-if="product !== null && product !== undefined && product !== 'undefined'">
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 pa-5>
          <h2 class="h2-s2 text-xs-center">{{product.name}}</h2>
        </v-flex>
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3>
          <v-img :src="require('../../../static/img/' + product.photo)" class="elevation-16" style="border: 30px solid white;"></v-img>
        </v-flex>
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 v-if="product !== null" class="pa-5 text-xs-center">
          <!-- <p>{{product.description}}</p> -->
          <!-- <hr class="mb-3"/> -->
          <section v-if="isAuth">
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
            <h3 class="red--text">* Для покупки или тестирования программы нужно авторизоваться</h3>
          </section>
        </v-flex>
        <v-flex xs12>
          <component :is="productComponent"></component>
        </v-flex>
      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapGetters } from 'vuex'
import authMixin from '../../mixins/auth'
import Challenge from '../Products/Challenge'
import ChallengeRegister from '../Products/ChallengeRegister'
import FlowRegister from '../Products/FlowRegister'
import Flow from '../Products/Flow'
export default {
  mixins: [authMixin],
  props: ['id'],
  components: {
    'product1': Flow,
    'product1Register': FlowRegister,
    'product2': Challenge,
    'product2Register': ChallengeRegister
  },
  data () {
    return {
    }
  },
  computed: {
    ...mapGetters(['getProductById', 'getProductOfUserById']),
    product () {
      return this.getProductById(this.id)
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
    }
  },
  async created () {
    // this.productComponent = this.id === 1 ? () => import('../Products/Flow') : () => import('../Products/Challenge')
    // this.product = this.getProductById(this.id)
    // this.productOfUser = this.getProductOfUserById(this.id)
  },
  watch: {
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
