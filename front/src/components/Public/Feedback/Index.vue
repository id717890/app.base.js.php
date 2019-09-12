<template>
  <v-layout align-start justify-center row wrap>
    <v-flex xs12>
      <v-img class="about-top-photo" :src="require('../../../../static/img/feedback.jpg')" max-height="400" :lazy-src="require('../../../../static/img/feedback.jpg')" aspect-ratio="1.2" :position="'bottom center'">
        <v-layout fill-height column align-center justify-space-around>
          <h2 class="h2-s2"><i class="fas fa-quote-left mr-3"></i><i class="fa fa-comments"></i> Отзывы <i class="fas fa-quote-right ml-2"></i></h2>
          <v-btn :disabled="feedbacks === null" large color="light-blue darken-3" dark style="height: auto !important" class="pa-4" @click="toggleCommentForm(true)"><i class="fa fa-2x fa-plus mr-3"></i> Оставить отзыв <i class="fa fa-2x fa-comment ml-3"></i></v-btn>
        </v-layout>
      </v-img>
    </v-flex>
    <v-flex xs12 sm10 md8 lg6 pa-3 v-if="feedbacks !== null">
      <v-layout row wrap>
        <v-flex xs12>
          <div class="icon-one"></div>
          <div class="icon-two"></div>
          <div class="icon-three"></div>
          <div class="icon-four"></div>
          <div class="icon-five"></div>
          <div class="icon-eight"></div>
        </v-flex>
        <v-flex xs12>
          <app-notify/>
        </v-flex>
        <v-flex xs12 class="mb-4" v-if="showCommentForm">
          <v-form lazy-validation v-model="form.valid" ref="form">
            <v-flex 12>
              <v-text-field label="Имя" type="text" v-model="form.name" required :rules="textField"></v-text-field>
              <v-text-field label="E-mail" v-model="form.email" required :rules="emailRules"></v-text-field>
              <!-- <v-text-field label="Тескт" type="text" v-model="form.text" required :rules="textField"></v-text-field> -->
              <v-textarea required :rows="2" outline label="Отзыв пользователя:" v-model="form.text" :rules="feedbackUserRules"></v-textarea>
            </v-flex>
            <v-flex 12>
              <v-layout row nowrap>
                <v-flex xs12 class="text-xs-center">
                  <v-btn large :loading="loading" :disabled="!form.valid" color="primary" @click="addComment" ><i class="fa fa-comment-alt fa-2x mr-3"></i>  ОК</v-btn>
                  <v-btn large :loading="loading" color="grey" dark @click="toggleCommentForm(false)"> <i class="fa fa-times fa-2x mr-3"></i> Отмена</v-btn>
                </v-flex>
              </v-layout>
            </v-flex>
          </v-form>
        </v-flex>
        <v-flex xs12 v-for="(feedback, index) in feedbacks" :key="feedback.id" class="mb-3">
          <v-card color="light-blue lighten-4" :class="index % 2 === 0 ? 'mr-5 mb-3' : 'ml-5 mb-3'">
            <v-card-title><i class="fa fa-comment mr-3"></i>{{feedback.name}} <v-spacer></v-spacer><i class="caption grey--text lighten-5">{{date(feedback.created_at, 'DD.MM.YY hh:mm')}}</i></v-card-title>
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
    <v-flex v-else class="pa-5 text-xs-center">
      <v-progress-circular :size="150" :width="20" color="blue" indeterminate></v-progress-circular>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapActions, mapState } from 'vuex'
import moment from '../../../packages/moment'
export default {
  data () {
    return {
      loading: false,
      showCommentForm: false,
      form: {
        valid: false,
        email: null,
        text: null,
        name: null
      },
      emailRules: [
        v => !!v || 'E-mail required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ],
      textField: [
        v => !!v || 'Field is required'
      ],
      feedbackUserRules: [
        v => !!v || 'Field is required',
        v => (v || '').length <= this.maxLenghtFeedback || `A maximum of ${this.maxLenghtFeedback} characters is allowed`
      ],
      maxLenghtFeedback: 255
    }
  },
  computed: {
    ...mapState({
      feedbacks: state => state.feedback.feedbacksOfUser
    })
  },
  methods: {
    ...mapActions(['getUserFeedbacks', 'saveUserFeedback']),
    toggleCommentForm (value) {
      if (value === false) {
        this.form.email = ''
        this.form.name = ''
        this.form.text = ''
      }
      this.showCommentForm = value
    },
    date (e, format) {
      return moment.getDateFormat(e, format)
    },
    resetForm () {
      this.$refs.form.reset()
      this.loading = false
      this.showCommentForm = false
    },
    addComment (e) {
      this.loading = true
      this.$store.dispatch('clearAllMessages')
      e.preventDefault()
      if (this.$refs.form.validate()) {
        this.saveUserFeedback({ email: this.form.email, name: this.form.name, text_user: this.form.text })
          .then((x) => {
            this.resetForm()
          })
          .catch(x => {
            this.loading = false
          })
      } else this.loading = false
    }
  },
  async created () {
    this.getUserFeedbacks()
  }
}
</script>

<style>

</style>
