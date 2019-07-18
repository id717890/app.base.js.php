<template>
  <v-layout column fill-height v-if="product !== null">
    <v-flex xs12>
      <div class="bg2 pt-5" style="display: block; height: 200px; max-height: 200px;">
        <h2 class="h2-s2 text-xs-center">{{product.name}}</h2>
      </div>
    </v-flex>
    <v-flex xs12>
      <v-layout row wrap justify-aroud>
        <v-flex class="text-xs-center text-md-right">
          <img :src="require('../../../static/img/' + product.photo)" class="elevation-14" alt="" style="max-width: 400px; top: -80px; position: relative; border: 30px solid white;">
        </v-flex>
        <v-flex v-if="product !== null" class="pa-5">
          <p>{{product.description}}</p>
          <hr class="mb-3"/>
          <section v-if="isAuth">
            <v-btn :to="'/product/'+product.id" large dark color="red darken-3" style="margin: auto" v-if="product.price>0">
              <i class="fa fa-shopping-cart fa-2x mr-2"></i>
              Buy {{Number(product.price)}}$
            </v-btn>
            <v-btn :to="'/product/'+product.id" large dark color="red darken-3" style="margin: auto" v-else>
              <i class="fa fa-shopping-cart fa-2x mr-2"></i>
              Try It Free
            </v-btn>
          </section>
          <section v-else>
            <h3 class="red--text">* Для покупки или тестирования тренировки нужно авторизоваться</h3>
          </section>
        </v-flex>
      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapGetters } from 'vuex'
import authMixin from '../../mixins/auth'
export default {
  mixins: [authMixin],
  data () {
    return {
      id: this.$route.params.id,
      product: null
    }
  },
  computed: {
    ...mapGetters(['getProductById'])
    // product () {
    //   return this.getProductById(this.id)
    // }
  },
  created () {
    this.product = this.getProductById(this.id)
  },
  watch: {
    '$route' (to, from) {
      this.product = this.getProductById(to.params.id)
    }
  }
}
</script>

<style>

</style>
