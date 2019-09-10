<template>
  <v-layout row>
    <v-flex xs12>
      <section v-if="products === null">
        <v-progress-circular
          :size="100"
          :width="10"
          color="blue"
          indeterminate
        ></v-progress-circular>
      </section>
      <v-tabs show-arrows v-else
        centered
        color="light-blue"
        dark
        icons-and-text
        >
        <v-tabs-slider color="yellow"></v-tabs-slider>
        <v-tab style="max-width: none"  v-for="product in products" :key="product.product.id" :href="'#prod'+product.product.id">
          {{product.product.name}}
          <i :class="product.product.icon"></i>
        </v-tab>
        <v-tab-item
          v-for="product in products"
          :key="product.product.id"
          :value="'prod' + product.product.id"
        >
          <v-card>
            <v-card-text>
              <v-layout column fill-height v-if="product.product !== null">
                <v-flex xs12>
                  <v-layout row wrap v-if="product.product !== null && product.product !== undefined && product.product !== 'undefined'">
                    <v-flex xs12 sm12 md10 offset-md1 lg8 offset-lg2 text-xs-center pt-4 pb-5>
                      <h2 class="text-xs-center" v-html="product.product.name"></h2>
                    </v-flex>
                    <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3>
                      <v-img :src="require('../../../../static/img/' + product.product.photo)" class="elevation-16" style="border: 30px solid white;"></v-img>
                    </v-flex>
                    <v-flex xs12 py-5>
                      <component  :is="productComponent(product.product.id)" :product="product"></component>
<!-- <v-btn large dark color="red darken-3" style="margin: auto" @click.stop="dialog = true">
                          <i class="fab fa-cc-visa fa-2x mr-2"></i>
                          Купить программу!! {{Number(product.product.price)}} руб.
                        </v-btn>
                        <v-dialog
      v-model="dialog"
      max-width="600"
    >
      <v-card>
        <v-card-title class="headline">Use Google's location service?</v-card-title>
        <v-card-text>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/1qVdKhGXc2A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="green darken-1"
            flat="flat"
            @click="dialog = false"
          >
            Disagree
          </v-btn>

          <v-btn
            color="green darken-1"
            flat="flat"
            @click="dialog = false"
          >
            Agree
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog> -->
                    </v-flex>
                  </v-layout>
                </v-flex>
              </v-layout>
            </v-card-text>

            <!-- <v-card-text>
                <v-layout row wrap>
                  <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3>
                    <v-img :src="require('../../../../static/img/' + product.product.photo)"></v-img>
                  </v-flex>
                  <v-flex xs12 sm10 offset-sm1 md6 offset-md3>
                    {{product.product.description}}
                  </v-flex>
                </v-layout>
            </v-card-text> -->
            <!-- <v-card-text v-if="product.days !== null">
              <v-layout row wrap>
                  <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3>
                    <v-expansion-panel expand>
                      <v-expansion-panel-content
                        v-for="(day,i) in product.days"
                        :key="i"
                      >
                        <template v-slot:header>
                          <div>{{day.title}}</div>
                        </template>
                        <v-card class="light-blue lighten-4">
                          <v-card-text>{{day.description}}</v-card-text>
                        </v-card>
                      </v-expansion-panel-content>
                    </v-expansion-panel>
                  </v-flex>
              </v-layout>
            </v-card-text> -->
            <!-- <v-card-text v-else>
              <v-layout>
                <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 text-xs-center>
                  <form target="_blank" method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
                  </form>
                </v-flex>
              </v-layout>
            </v-card-text> -->
          </v-card>
        </v-tab-item>
      </v-tabs>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapState, mapActions, mapGetters } from 'vuex'
import authMixin from '../../../mixins/auth'
import Challenge from '../../Products/Challenge'
import ChallengeRegister from '../../Products/ChallengeRegister'
import FlowRegister from '../../Products/FlowRegister'
import Flow from '../../Products/Flow'
export default {
  mixins: [authMixin],
  components: {
    'product1': Flow,
    'product1Register': FlowRegister,
    'product2': Challenge,
    'product2Register': ChallengeRegister
  },
  mounted () {
    // if (this.gift !== undefined && this.gift !== null) {
    //   this.payData.formcomment = 'Donat на получения ключа(ей) подарка №' + this.gift.idRow
    //   this.payData.label = '[' + this.getUser + '][' + this.gift.idRow + ']'
    //   this.payData.targets = 'Donate для получения ключа(ей) подарка ' + this.gift.giftName
    // }
  },
  data () {
    return {
      dialog: false,
      payData: {
        formcomment: '',
        label: '',
        targets: '',
        paymentType: 'AC'
      }
    }
  },
  computed: {
    ...mapGetters(['getProductById', 'getProductOfUserById']),
    ...mapState({
      products: state => state.product.productsOfUser,
      yandex: state => state.payment.yandex,
      user: state => state.auth.user
    })
  },
  async created () {
    this.getAllProductsForUser()
  },
  methods: {
    ...mapActions(['getAllProductsForUser']),
    productIsAccepted (id) {
      if (!this.isAuth) {
        return false
      } else {
        let product = this.getProductOfUserById(id)
        if (product) return product.accept
      }
      return false
    },
    productComponent (id) {
      if (this.productIsAccepted(id)) {
        return 'product' + id
      } else {
        return 'product' + id + 'Register'
      }
    }
  }
}
</script>

<style>

</style>
