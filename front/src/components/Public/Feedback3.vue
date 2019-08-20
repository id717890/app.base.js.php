<template>
  <v-carousel  height="630" class="feedback3 elevation-0" style="" :cycle="true" hide-delimiters :interval="10000">
    <v-carousel-item>
      <v-layout row>
        <v-flex xs4 pt-4 pl-5 text-xs-center>
          <v-card max-width="330" :color="feedbacks[0].color" class="elevation-5 feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6 avatar" :src="feedbacks[0].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <v-img :src="feedbacks[0].text"></v-img>
            </v-card-text>
            <v-card-actions class="px-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[0].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
        <v-flex xs4 pt-4 px-2 text-xs-center>
          <v-card max-width="330" :color="feedbacks[1].color" class="elevation-5 feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6 avatar" :src="feedbacks[1].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <v-img :src="feedbacks[1].text"></v-img>
            </v-card-text>
            <v-card-actions class="pl-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[1].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
        <v-flex xs4 pt-4 pr-5 text-xs-center>
          <v-card max-width="330" :color="feedbacks[2].color" class="elevation-5 feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6 avatar" :src="feedbacks[2].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <v-img :src="feedbacks[2].text"></v-img>
            </v-card-text>
            <v-card-actions class="pl-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[2].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>
    </v-carousel-item>
    <v-carousel-item>
      <v-layout row>
        <v-flex xs4 pt-4 pl-5 text-xs-center>
          <v-card max-width="330" :color="feedbacks[3].color" class="elevation-5 feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6 avatar" :src="feedbacks[3].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <v-img :src="feedbacks[3].text"></v-img>
            </v-card-text>
            <v-card-actions class="pl-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[3].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
        <v-flex xs4 pt-4 px-3 text-xs-center>
          <v-card max-width="330" :color="feedbacks[4].color" class="elevation-5 feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6 avatar" :src="feedbacks[4].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <v-img :src="feedbacks[4].text"></v-img>
            </v-card-text>
            <v-card-actions class="px-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[4].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
        <v-flex xs4 pt-4 pr-5 text-xs-center>
          <v-card max-width="330" :color="feedbacks[5].color" class="elevation-5 feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6 avatar" :src="feedbacks[5].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <v-img :src="feedbacks[5].text"></v-img>
            </v-card-text>
            <v-card-actions class="pl-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[5].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>
    </v-carousel-item>
    <v-carousel-item>
      <v-layout row>
        <v-flex xs4 pt-4 pl-5 text-xs-center>
          <v-card max-width="330" :color="feedbacks[6].color" class="elevation-5 feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6 avatar" :src="feedbacks[6].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <v-img :src="feedbacks[6].text"></v-img>
            </v-card-text>
            <v-card-actions class="pl-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[6].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
        <v-flex xs4 pt-4 px-3 text-xs-center>
          <v-card max-width="330" :color="feedbacks[7].color" class="elevation-5 feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6 avatar" :src="feedbacks[7].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <v-img :src="feedbacks[7].text"></v-img>
            </v-card-text>
            <v-card-actions class="pl-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[7].fio}}</p>
            </v-card-actions>
          </v-card>
        </v-flex>
        <v-flex xs4 pt-4 pr-5 text-xs-center>
          <v-card max-width="330" :color="feedbacks[8].color" class="elevation-5 feedback" >
            <v-card-title>
              <v-list-tile>
                <v-list-tile-avatar class="avatar1">
                  <v-img class="elevation-6 avatar" :src="feedbacks[8].img"></v-img>
                </v-list-tile-avatar>
              </v-list-tile>
            </v-card-title>
            <v-card-text>
              <v-img :src="feedbacks[8].text"></v-img>
            </v-card-text>
            <v-card-actions class="pl-5">
              <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{feedbacks[8].fio}}</p>
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
