<template>
  <v-layout row>
    <v-flex xs12>
      <v-tabs
        show-arrows
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
        <!--<v-tab href="#tab-2">
          Favorites
          <v-icon>favorite</v-icon>
        </v-tab>

        <v-tab href="#tab-3">
          Nearby
          <v-icon>account_box</v-icon>
        </v-tab> -->

        <!-- <v-tab-item
          :value="'prod1'"
        >
          <v-card >
            <v-card-text>{{ text }}</v-card-text>
          </v-card>
        </v-tab-item> -->

        <v-tab-item
          v-for="product in products"
          :key="product.product.id"
          :value="'prod' + product.product.id"
        >
          <v-card flat>
            <v-card-text>
                <v-layout row wrap>
                  <v-flex xs12 sm10 offset-sm1 md6 offset-md3>
                    <v-img :src="require('../../../../static/img/' + product.product.photo)"></v-img>
                  </v-flex>
                  <v-flex xs12 sm10 offset-sm1 md6 offset-md3>
                    {{product.product.description}}
                  </v-flex>
                </v-layout>
            </v-card-text>
            <v-card-text>
              <v-layout row wrap>
                  <v-flex xs12 sm10 offset-sm1 md6 offset-md3>
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
            </v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapState, mapActions } from 'vuex'
export default {
  data () {
    return {
      text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
    }
  },
  computed: {
    ...mapState({
      products: state => state.product.productsOfUser
    })
  },
  async created () {
    this.getAllProductsForUser()
  },
  methods: {
    ...mapActions(['getAllProductsForUser'])
  }
}
</script>

<style>

</style>
