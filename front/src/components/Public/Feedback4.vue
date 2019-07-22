<template>
  <v-carousel height="450" class="feedback4" style="border: 1px solid red" :cycle="false">
    <v-carousel-item>
      <v-layout row justify-center>
        <v-flex xs3 pt-4 text-xs-center>
          <v-card max-width="330" :color="feedbacks[0].color" class="elevation-5 product feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6" :src="feedbacks[0].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <div class="feed-wrapper">
                {{feedbacks[0].text}}
              </div>
            </v-card-text>
            <v-card-actions class="px-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[0].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
        <v-flex xs3 pt-4 text-xs-center>
          <v-card max-width="330" :color="feedbacks[0].color" class="elevation-5 product feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6" :src="feedbacks[0].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <div class="feed-wrapper">
                {{feedbacks[0].text}}
              </div>
            </v-card-text>
            <v-card-actions class="px-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[0].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
        <v-flex xs3 pt-4 text-xs-center>
          <v-card max-width="330" :color="feedbacks[0].color" class="elevation-5 product feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6" :src="feedbacks[0].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <div class="feed-wrapper">
                {{feedbacks[0].text}}
              </div>
            </v-card-text>
            <v-card-actions class="px-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[0].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
        <v-flex xs3 pt-4 text-xs-center>
          <v-card max-width="330" :color="feedbacks[0].color" class="elevation-5 product feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6" :src="feedbacks[0].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <div class="feed-wrapper">
                {{feedbacks[0].text}}
              </div>
            </v-card-text>
            <v-card-actions class="px-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[0].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>
    </v-carousel-item>
    <v-carousel-item>
      <v-layout row>
        <v-flex xs3 pt-4 text-xs-center>
          <v-card max-width="330" :color="feedbacks[0].color" class="elevation-5 product feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6" :src="feedbacks[0].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <div class="feed-wrapper">
                {{feedbacks[0].text}}
              </div>
            </v-card-text>
            <v-card-actions class="px-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[0].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
        <v-flex xs3 pt-4 text-xs-center>
          <v-card max-width="330" :color="feedbacks[0].color" class="elevation-5 product feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6" :src="feedbacks[0].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <div class="feed-wrapper">
                {{feedbacks[0].text}}
              </div>
            </v-card-text>
            <v-card-actions class="px-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[0].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
        <v-flex xs3 pt-4 text-xs-center>
          <v-card max-width="330" :color="feedbacks[0].color" class="elevation-5 product feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6" :src="feedbacks[0].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <div class="feed-wrapper">
                {{feedbacks[0].text}}
              </div>
            </v-card-text>
            <v-card-actions class="px-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[0].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
        <v-flex xs3 pt-4 text-xs-center>
          <v-card max-width="330" :color="feedbacks[0].color" class="elevation-5 product feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6" :src="feedbacks[0].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <div class="feed-wrapper">
                {{feedbacks[0].text}}
              </div>
            </v-card-text>
            <v-card-actions class="px-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[0].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>
    </v-carousel-item>
  </v-carousel>
</template>

<script>
export default {
  data () {
    return {
      feedbacks: [
        {
          id: 1,
          fio: 'Milena McKenzie',
          text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit.Lorem, ipsum dolor sit amet consectetur adipisicing elit.Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
          img: require('../../../static/img/fitness.jpg'),
          color: 'light-green lighten-4'
        },
        {
          id: 2,
          fio: 'Milena McKenzie',
          text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?',
          img: require('../../../static/img/fitness.jpg'),
          color: 'teal lighten-4'
        },
        {
          id: 3,
          fio: 'Milena McKenzie',
          text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?',
          img: require('../../../static/img/fitness.jpg'),
          color: 'light-green lighten-4'
        },
        {
          id: 4,
          fio: 'Milena McKenzie',
          text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
          img: require('../../../static/img/fitness.jpg'),
          color: 'teal lighten-4'
        },
        {
          id: 5,
          fio: 'Milena McKenzie',
          text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit.',
          img: require('../../../static/img/fitness.jpg'),
          color: 'light-green lighten-4'
        }
      ]
    }
  }

}
</script>

<style>

</style>
