<template>
  <v-layout column class="bg1">
    <v-flex xs12>
      <v-layout row wrap fill-height class="bg1">
        <v-flex xs12 md5 align-self-center pl-5 class="h1-left-block pa-5">
          <section class="hidden-sm-and-down">
            <h1 class="h1-s1">Время </h1>
            <h1 class="h1-s1 ml-5">заняться</h1>
            <h1 class="h1-s1 ml-5 pl-5">собой.</h1>
          </section>
          <section class="hidden-md-and-up">
            <h1 class="h1-s1">Время <br> заняться <br> собой. </h1>
          </section>
          <p style="background: transparent">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia esse consequuntur, sapiente perferendis, sunt dolore cupiditate minus vitae possimus nisi asperiores illo, neque enim dolores corporis pariatur? Quisquam, esse quidem.
          </p>
        </v-flex>
        <v-flex xs12 md7 style="height: 100vh; overflow: hidden">
          <v-carousel
            height="100%"
            hide-delimiters
            hide-controls
            prev-icon="fa fa-arrow-left"
            next-icon="fa fa-arrow-right"
      >
        <v-carousel-item class="h100"
          v-for="(item,i) in items"
          :key="i"
          :src="item.src"
        ></v-carousel-item>
      </v-carousel>
          <!-- <img src="../../static/img/SoqSO8UTTrSk5G9R3G7o_Revamped Background.png"  style="height: 100%"  alt="" > -->
        </v-flex>
      </v-layout>
    </v-flex>
    <v-flex class="grey lighten-1">
      <v-layout class="bg1" row wrap>
        <v-flex xs12>
          <h2 class="h2-s1 text-xs-center pt-2 mt-5 mb-3">Why it's important <br> to exercise</h2>
        </v-flex>
        <v-flex xs12 md8 offset-md2 lg6 offset-lg3 mb-5 style="color: #d19c1d">
          <v-layout row wrap >
            <v-flex xs12 md6 lg4 style="display:flex;" pr-3 mb-3 align-center>
              <i class="fa fa-star fa-3x"></i>
              <span>Причина №1</span>
            </v-flex>
            <v-flex xs12 md6 lg4 style="display:flex;" pr-3 mb-3 align-center>
              <i class="fa fa-cloud fa-3x"></i>
              <span>Причина №2</span>
            </v-flex>
            <v-flex xs12 md6 lg4 style="display:flex;" pr-3 mb-3 align-center>
              <i class="fa fa-feather fa-3x"></i>
              <span>Причина №3</span>
            </v-flex>
              <v-flex xs12 md6 lg4 style="display:flex;" pr-3 mb-3 align-center>
              <i class="fa fa-heart fa-3x"></i>
              <span>Причина №4</span>
            </v-flex>
            <v-flex xs12 md6 lg4 style="display:flex;" pr-3 mb-3 align-center>
              <i class="fa fa-leaf fa-3x"></i>
              <span>Причина №5</span>
            </v-flex>
            <v-flex xs12 md6 lg4 style="display:flex;" pr-3 mb-3 align-center>
              <i class="fa fa-american-sign-language-interpreting fa-3x"></i>
              <span>Причина №6</span>
            </v-flex>
          </v-layout>
        </v-flex>
      </v-layout>
    </v-flex>
    <v-flex xs12>
      <div class="prlx prlxb3">
        <v-layout row wrap justify-center align-center class="vh100">
          <v-flex xs xs12 sm5 md4 lg3 pa-3 v-for="(product, index) in products" :key="product.id">
            <v-card class="product elevation-12" :color="randColor(index)">
              <v-img
                aspect-ratio="2.75"
                :src="require('../../static/img/' + product.photo)"
                height="400"
              ></v-img>

              <v-card-title primary-title>
                <div>
                  <h3 class="headline mb-0">{{product.name}}</h3>
                  <div>{{product.description}}</div>
                </div>
              </v-card-title>

              <v-card-actions>
                <v-btn :to="'/product/'+product.id" large round dark color="deep-orange" style="margin: auto" v-if="product.price>0">
                  <i class="fa fa-shopping-cart fa-2x mr-2"></i>
                  Buy {{Number(product.price)}}$
                </v-btn>
                <v-btn :to="'/product/'+product.id" large round dark color="deep-orange" style="margin: auto" v-else>
                  <i class="fa fa-shopping-cart fa-2x mr-2"></i>
                  Try It Free
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </div>
    </v-flex>
    <v-flex xs12 class="text-xs-center bg1 my-4">
      <h2 class="h2-s1">Opinions about us</h2>
    </v-flex>
    <v-flex xs12 class="bg1 pa-1">
      <v-layout row wrap justify-center>
        <v-card max-width="400" color="pink lighten-3 elevation-10" class="mr-3 mb-5">
          <v-card-title>
            <i class="fab fa-2x fa-twitter"></i>
            <span>Отзыв №1</span>
          </v-card-title>
          <v-card-text>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, placeat quis autem vero alias molestiae hic necessitatibus dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
          </v-card-text>
          <v-card-actions>
            <v-list-tile>
              <v-list-tile-avatar>
                <v-img class="elevation-6" :src="img"></v-img>
              </v-list-tile-avatar>
            </v-list-tile>
            <v-list-tile-content>Test</v-list-tile-content>
          </v-card-actions>
        </v-card>
        <v-card max-width="400" color="cyan darken-1 elevation-10" class="mr-3 mb-5">
          <v-card-title>
            <i class="fab fa-2x fa-twitter"></i>
            <span>Отзыв №1</span>
          </v-card-title>
          <v-card-text>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, placeat quis autem vero alias molestiae hic necessitatibus dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
          </v-card-text>
          <v-card-actions>
            <v-list-tile>
              <v-list-tile-avatar>
                <v-img class="elevation-6" :src="img"></v-img>
              </v-list-tile-avatar>
            </v-list-tile>
            <v-list-tile-content>Test</v-list-tile-content>
          </v-card-actions>
        </v-card>
        <v-card max-width="400" color="green darken-1 elevation-10" class="mr-3 mb-5">
          <v-card-title>
            <i class="fab fa-2x fa-twitter"></i>
            <span>Отзыв №1</span>
          </v-card-title>
          <v-card-text>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, placeat quis autem vero alias molestiae hic necessitatibus dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, placeat quis autem vero alias molestiae hic necessitatibus dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
          </v-card-text>
          <v-card-actions>
            <v-list-tile>
              <v-list-tile-avatar>
                <v-img class="elevation-6" :src="img"></v-img>
              </v-list-tile-avatar>
            </v-list-tile>
            <v-list-tile-content>Test</v-list-tile-content>
          </v-card-actions>
        </v-card>
        <v-card max-width="400" color="blue darken-1 elevation-10" class="mr-3 mb-5">
          <v-card-title>
            <i class="fab fa-2x fa-twitter"></i>
            <span>Отзыв №1</span>
          </v-card-title>
          <v-card-text>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, placeat quis autem vero alias molestiae hic necessitatibus dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, placeat quis autem vero alias molestiae hic necessitatibus dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
          </v-card-text>
          <v-card-actions>
            <v-list-tile>
              <v-list-tile-avatar>
                <v-img class="elevation-6" :src="img"></v-img>
              </v-list-tile-avatar>
            </v-list-tile>
            <v-list-tile-content>Test</v-list-tile-content>
          </v-card-actions>
        </v-card>
      </v-layout>
    </v-flex>
    <!-- <v-flex xs12 class="bg1" style="height: 500px">
      <v-carousel
        delimiter-icon="fa fa-stop"
        prev-icon="fa fa-arrow-left"
        next-icon="fa fa-arrow-right"
      >
        <v-carousel-item
          v-for="(item,i) in items"
          :key="i"
          :src="item.src"
        ></v-carousel-item>
      </v-carousel>
    </v-flex> -->
    <!-- <v-flex xs12 class="red lighten-5 pa-3">
      <h1 class="text-xs-center">Отзывы</h1>
    </v-flex> -->
    <v-flex xs12>
      <div class="end-block">
        <v-layout row wrap style="z-index: 2">
          <v-flex xs12 sm12 md10 offset-md1>
            <v-layout row wrap style="z-index: 2">
              <v-flex xs12 sm12 md4 style="z-index: 3" class="text-xs-right pr-5">
                <h2 class="h2-s1">
                  Free happy <br> hours for <br> new people
                </h2>
                <br>
                <p>
                  Curabitur sed iaculis dolor, non congue ligula. Maecenas imperdiet ante eget hendrerit posuere. Nunc urna libero, congue porta nibh a, semper feugiat sem.
                </p>
              </v-flex>
              <v-flex xs12 sm12 md8 style="z-index: 3" class="pa-3">
                <v-img style="border-radius: 15px" :src="require('../../static/img/Fran.jpg')" max-height="580" max-width="740" class="elevation-20"></v-img>
              </v-flex>
            </v-layout>
          </v-flex>
        </v-layout>
      </div>
    </v-flex>
    <v-flex class="text-xs-center">
      <div class="wrapper-end-img">
        <img style="" :src="require('../../static/img/decor.png')" alt="">
      </div>
    </v-flex>
  </v-layout>
  <!-- <HelloWorld /> -->
</template>

<script>
// import HelloWorld from '../components/HelloWorld'
import { mapState } from 'vuex'
export default {
  components: {
    // HelloWorld
  },
  computed: {
    ...mapState({
      products: state => state.product.products
    })
  },
  data () {
    return {
      'img': require('../../static/img/fitness.jpg'),
      items: [
        {
          src: require('../../static/img/bird.jpg')
        },
        {
          src: require('../../static/img/planet.jpg')
        },
        {
          src: require('../../static/img/sky.jpg')
        },
        {
          src: require('../../static/img/squirrel.jpg')
        }
      ]
    }
  },
  methods: {
    randColor (index) {
      switch (index) {
        case 0: return 'lime accent-4'
        case 1: return 'orange darken-1'
        case 2: return 'blue darken-2'
      }
    }
  }
}
</script>
