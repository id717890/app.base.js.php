<template>
  <v-layout row wrap>
    <v-flex xs xs12 sm6 md5 lg4 pa-3 v-for="(product, index) in products" :key="product.id">
      <v-card class="product elevation-12" :color="randColor(index)">
        <v-img
          aspect-ratio="2.75"
          :src="require('../../../../static/img/' + product.photo)"
          height="400"
        ></v-img>

        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">{{product.name}}</h3>
            <div>{{product.description}}</div>
          </div>
        </v-card-title>

        <v-card-actions>
          <v-layout row wrap>
            <v-flex xs12>
              <v-text-field
                v-model="product.price"
                label="Цена"
                class="ma-0 pa-0"
                type="number"
              ></v-text-field>
            </v-flex>
            <v-flex xs12>
              <v-spacer></v-spacer>
              <v-btn @click="save(product)" large dark color="primary" style="margin: auto">
                <i class="fa fa-check fa-2x mr-2"></i>
                Сохранить
              </v-btn>
              <!-- <v-btn :to="'/product/'+product.id" large round dark color="deep-orange" style="margin: auto" v-if="product.price>0">
                <i class="fa fa-shopping-cart fa-2x mr-2"></i>
                Buy {{Number(product.price)}}$
              </v-btn>
              <v-btn :to="'/product/'+product.id" large round dark color="deep-orange" style="margin: auto" v-else>
                <i class="fa fa-shopping-cart fa-2x mr-2"></i>
                Try It Free
              </v-btn> -->
            </v-flex>
          </v-layout>
        </v-card-actions>
      </v-card>
    </v-flex>
    <v-snackbar
      v-model="snackbar"
      :bottom="y === 'bottom'"
      :left="x === 'left'"
      :multi-line="mode === 'multi-line'"
      :right="x === 'right'"
      :timeout="timeout"
      :top="y === 'top'"
      :vertical="mode === 'vertical'"
    >
      {{ text }}
      <v-btn
        color="pink"
        flat
        @click="snackbar = false"
      >
        Close
      </v-btn>
    </v-snackbar>
  </v-layout>
</template>

<script>
import { mapState, mapActions } from 'vuex'
export default {
  data () {
    return {
      snackbar: false,
      y: 'top',
      x: null,
      mode: '',
      timeout: 6000,
      text: 'Успешно сохранено'
    }
  },
  computed: {
    ...mapState({
      products: state => state.product.products
    })
  },
  methods: {
    ...mapActions(['updateProduct']),
    randColor (index) {
      switch (index) {
        case 0: return 'lime accent-4'
        case 1: return 'orange darken-1'
        case 2: return 'blue darken-2'
      }
    },
    save (product) {
      this.updateProduct({ 'id': product.id, 'price': product.price })
        .then(() => {
          this.snackbar = true
        })
        .catch(x => console.log(x))
    }
  }
}
</script>

<style>

</style>
