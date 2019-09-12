<template>
  <v-layout align-start justify-center row wrap v-if="feedbacks !== null">
    <v-flex xs12 sm10 md6 lg4 pa-3>
      <v-layout row wrap>
        <v-flex xs12 v-for="(feedback, index) in feedbacks" :key="feedback.id" class="mb-3">
          <v-card color="light-blue lighten-5" :class="index % 2 === 0 ? 'mr-5 mb-3' : 'ml-5 mb-3'">
            <v-card-title><i class="fa fa-comment mr-3"></i>{{feedback.name}}
            </v-card-title>
            <v-card-text class="feed-wrapper2">
              {{ feedback.text_user }}
            </v-card-text>
          </v-card>
          <v-card color="blue-grey lighten-5" :class="index % 2 === 0 ? 'mr-5 mb-3' : 'ml-5 mb-3'" v-if="feedback.text_admin !== null && feedback.text_admin !== ''">
            <v-card-title><i class="fa fa-retweet mr-3"></i> Евгения Кабанова</v-card-title>
            <v-card-text class="feed-wrapper2">
              {{ feedback.text_admin }}
            </v-card-text>
          </v-card>
        </v-flex>
      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapActions, mapState } from 'vuex'
export default {
  computed: {
    ...mapState({
      feedbacks: state => state.feedback.feedbacksOfUser
    })
  },
  methods: {
    ...mapActions(['getUserFeedbacks'])
  },
  async created () {
    this.getUserFeedbacks()
  }
}
</script>

<style>

</style>
