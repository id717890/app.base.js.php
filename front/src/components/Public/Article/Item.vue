<template>
  <v-layout row wrap justify-center align-center v-if="newsa !== null && newsa !== undefined && newsa !== 'undefined'">
    <v-flex xs12 sm12 md8 lg6 xl5 pa-0>
      <v-img class="img-news-item" :src="newsa.image" max-height="70vh">
        <h3 class="news-title"><i class="fas fa-quote-left"></i> {{newsa.title}} <i class="fas fa-quote-right"></i></h3>
      </v-img>
    </v-flex>
    <v-flex xs12></v-flex>
    <v-flex xs12 sm10 md7 lg6 py-5 px-3 mb-5>
      <div v-html="newsa.text" class="news"></div>
      <v-btn to="/articles" class="mt-5" color="orange" flat large outline style="float:right">Назад</v-btn>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  props: ['id'],
  data () {
    return {
      // id: this.$route.params.id
      // news: null
    }
  },
  computed: {
    ...mapGetters(['getNewsById']),
    newsa () {
      return this.getNewsById(this.id)
    }
  },
  async created () {
    // this.news = this.getNewsById(this.id)
  }
}
</script>

<style>

</style>
