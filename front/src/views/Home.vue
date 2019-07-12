<template>
  <v-layout column>
    <v-flex xs12>
      <v-layout row wrap fill-height>
        <v-flex xs12 md5 align-self-center pl-5 class="h1-left-block pa-5">
          <h1 class="h1-s1">Время </h1>
          <h1 class="h1-s1 ml-5">заняться</h1>
          <h1 class="h1-s1 ml-5 pl-5">собой.</h1>
          <p style="background: transparent">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia esse consequuntur, sapiente perferendis, sunt dolore cupiditate minus vitae possimus nisi asperiores illo, neque enim dolores corporis pariatur? Quisquam, esse quidem.
          </p>
        </v-flex>
        <v-flex xs12 md7 style="height: 100vh; overflow: hidden">
          <img src="../../static/img/SoqSO8UTTrSk5G9R3G7o_Revamped Background.png"  style="height: 100%"  alt="" >
        </v-flex>
      </v-layout>
    </v-flex>
    <v-flex class="grey lighten-1 elevation-24">
      <h2 class="display-2 pa-5 text-xs-center">Успевай! Скидка 40% действует до конца августа</h2>
    </v-flex>
    <v-flex xs12>
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
    </v-flex>
    <v-flex xs12 class="red lighten-5 pa-3">
      <h1 class="text-xs-center">Отзывы</h1>
    </v-flex>
    <v-flex xs12>
      <v-layout row wrap justify-center align-start class="blue-grey lighten-5 pa-3">
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
        <v-card max-width="400" color="purple lighten-3 elevation-10"  class="mr-3 mb-5">
          <v-card-title>
            <i class="fab fa-2x fa-twitter"></i>
            <span>Отзыв №1</span>
          </v-card-title>
          <v-card-text>
            necessitatibus dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
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
        <v-card max-width="400" color="indigo lighten-1 elevation-10" class="mr-3 mb-5">
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
      </v-layout>
    </v-flex>
    <v-flex xs12>
      <div class="prlx prlxb3">
        <v-layout row wrap justify-center align-center class="vh100">
          <v-flex xs xs12 sm5 md4 lg3 pa-3>
            <v-card>
              <v-img
                src="https://cdn.vuetifyjs.com/images/cards/desert.jpg"
                aspect-ratio="2.75"
              ></v-img>

              <v-card-title primary-title>
                <div>
                  <h3 class="headline mb-0">Kangaroo Valley Safari</h3>
                  <div> {{ card_text }} </div>
                </div>
              </v-card-title>

              <v-card-actions>
                <v-btn flat color="orange">Share</v-btn>
                <v-btn flat color="orange">Explore</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
          <v-flex xs xs12 sm5 md4 lg3 pa-3>
            <v-card>
              <v-img
                src="https://cdn.vuetifyjs.com/images/cards/desert.jpg"
                aspect-ratio="2.75"
              ></v-img>

              <v-card-title primary-title>
                <div>
                  <h3 class="headline mb-0">Kangaroo Valley Safari</h3>
                  <div> {{ card_text }} </div>
                </div>
              </v-card-title>

              <v-card-actions>
                <v-btn flat color="orange">Share</v-btn>
                <v-btn flat color="orange">Explore</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
          <v-flex xs xs12 sm5 md4 lg3 pa-3>
            <v-card>
              <v-img
                src="https://cdn.vuetifyjs.com/images/cards/desert.jpg"
                aspect-ratio="2.75"
              ></v-img>

              <v-card-title primary-title>
                <div>
                  <h3 class="headline mb-0">Kangaroo Valley Safari</h3>
                  <div> {{ card_text }} </div>
                </div>
              </v-card-title>

              <v-card-actions>
                <v-btn flat color="orange">Share</v-btn>
                <v-btn flat color="orange">Explore</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </div>

    </v-flex>
  </v-layout>
  <!-- <HelloWorld /> -->
</template>

<script>
// import HelloWorld from '../components/HelloWorld'

export default {
  components: {
    // HelloWorld
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
  }
}
</script>
