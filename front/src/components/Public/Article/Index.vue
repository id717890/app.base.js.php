<template>
  <v-layout row wrap color="red"  style="background: #f2f2f2">
    <v-flex xs12>
      <div class="bg3 text-xs-center">
        <h2 class="h2-s2"><i class="fab fa-pagelines"></i> Информация</h2>
      </div>
    </v-flex>
    <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 class="mb-5 pb-3">
      <v-layout row  wrap >
        <v-flex xs12 v-for="item in news" :key="item.id">
          <v-card class="ma-3 product elevation-24">
            <v-layout row wrap>
              <v-flex xs12 sm5>
                <v-img :src="item.image" height="100%" aspect-ratio="2.75"></v-img>
              </v-flex>
              <v-flex xs12 sm7>
                <v-card-title primary-title class="ma-0">
                  <div>
                    <h3 class="headline mb-0">{{item.title}}</h3>
                  </div>
                </v-card-title>
                <v-card-actions>
                  <span class="silver lighten-4">{{date(item.created_at)}}</span>
                  <v-spacer></v-spacer>
              <v-btn flat color="orange" :to="'/article/'+item.id">Подробнее</v-btn>
            </v-card-actions>
              </v-flex>
            </v-layout>
          </v-card>

        </v-flex>
      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapState } from 'vuex'
// eslint-disable-next-line
import moment from '../../../packages/moment'

export default {
  computed: {
    ...mapState({
      news: state => state.news.news
    })
  },
  methods: {
    date (e) {
      return moment.getDateFormat(e, 'DD.MM.YY hh:mm')
    }
  }
}
</script>

<style>

</style>
