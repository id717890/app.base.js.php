<template>
  <v-carousel height="630" class="feedback1 elevation-0" style="" :cycle="true" hide-delimiters :interval="10000">
    <v-carousel-item v-for="feedback in feedbacks" :key="feedback.id">
      <v-layout row justify-center>
        <v-flex xs12 pt-4 px-5 text-xs-center>
          <v-card max-width="330" :color="feedback.color" class="elevation-5 feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6 avatar" :src="feedback.img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <v-img :src="feedback.text"></v-img>
            </v-card-text>
            <v-card-actions class="px-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedback.fio}}</p>
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
          fio: '@kharitonovaa',
          img: require('../../../static/img/feedbacks/f1.jpg'),
          text: require('../../../static/img/feedbacks/f1-text.jpg'),
          color: 'white'
        },
        {
          id: 2,
          fio: '@blondinkavgorah',
          img: require('../../../static/img/feedbacks/f2.jpg'),
          text: require('../../../static/img/feedbacks/f2-text.jpg'),
          color: 'white'
        },
        {
          id: 3,
          fio: '@_my_lyolik',
          img: require('../../../static/img/feedbacks/f3.jpg'),
          text: require('../../../static/img/feedbacks/f3-text.jpg'),
          color: 'white'
        },
        {
          id: 4,
          fio: '@perevalova_a',
          img: require('../../../static/img/feedbacks/f4.jpg'),
          text: require('../../../static/img/feedbacks/f4-text.jpg'),
          color: 'white'
        },
        {
          id: 5,
          fio: '@l.a.d.i.s',
          img: require('../../../static/img/feedbacks/f5.jpg'),
          text: require('../../../static/img/feedbacks/f5-text.jpg'),
          color: 'white'
        },
        {
          id: 6,
          fio: '@kolesoo_',
          img: require('../../../static/img/feedbacks/f6.jpg'),
          text: require('../../../static/img/feedbacks/f6-text.jpg'),
          color: 'white'
        },
        {
          id: 7,
          fio: '@maria_cheboksarova',
          img: require('../../../static/img/feedbacks/f7.jpg'),
          text: require('../../../static/img/feedbacks/f7-text.jpg'),
          color: 'white'
        },
        {
          id: 8,
          fio: '@timonya',
          img: require('../../../static/img/feedbacks/f8.jpg'),
          text: require('../../../static/img/feedbacks/f8-text.jpg'),
          color: 'white'
        },
        {
          id: 9,
          fio: '@vasha_brats',
          img: require('../../../static/img/feedbacks/f9.jpg'),
          text: require('../../../static/img/feedbacks/f9-text.jpg'),
          color: 'white'
        }
      ]
    }
  }

}
</script>

<style>

</style>
