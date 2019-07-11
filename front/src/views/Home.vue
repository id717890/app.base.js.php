<template>
  <v-layout column>
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
      <v-layout row wrap justify-center align-start class="red lighten-5 pa-3">
        <v-card max-width="400" color="pink lighten-3" class="mr-3 mb-2">
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
        <v-card max-width="400" color="purple lighten-3"  class="mr-3 mb-2">
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
        <v-card max-width="400" color="indigo lighten-1" class="mr-3 mb-2">
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
        <v-card max-width="400" color="blue darken-1" class="mr-3 mb-2">
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
        <v-card max-width="400" color="green darken-1" class="mr-3 mb-2">
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
        <v-card max-width="400" color="cyan darken-1" class="mr-3 mb-2">
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
