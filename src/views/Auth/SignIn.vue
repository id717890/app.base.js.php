<template>
  <v-container>
    <v-layout>
      <v-flex xs12 md-6 offset-md2 lg4 offset-lg4>
        <v-form lazy-validation v-model="form.valid" ref="form">
          <v-flex 12>
            <v-text-field label="E-mail" v-model="form.email" required :rules="emailRules"></v-text-field>
            <v-text-field label="Password" type="password" v-model="form.password" required :rules="passwordRules"></v-text-field>
          </v-flex>
          <v-flex 12>
            <v-btn large :disabled="!form.valid" color="success" @click="signin" ><fai icon="sign-in-alt" class="mr-2" />  Sign In</v-btn>
          </v-flex>
        </v-form>
      </v-flex>
    </v-layout>
</v-container>
  <!-- <b-container>
    <b-row align-h="center">
      <b-col lg=5 md=7 sm=12 xs=12 class="pt-10">
        <b-card class="p-3 mb-3 text-dark">
          <div class="mt-2" v-if="this.getErrors !== null">
            <div v-for="(error, index) in this.getErrors" :key="index">
              <b-alert show variant="danger" v-for="(message, indexMessage) in error" :key="indexMessage">{{message}}</b-alert>
            </div>
          </div>
          <b-form @submit="onSubmit">
            <b-form-group id="exampleInputGroup1" label="Email address:" label-for="exampleInput1">
              <b-form-input id="exampleInput1" type="email" v-model="form.email" required placeholder="Enter email"></b-form-input>
            </b-form-group>
            <b-form-group id="exampleInputGroup2" label="Password:" label-for="exampleInput2">
              <b-form-input id="exampleInput2" type="password" v-model="form.password" required placeholder="Enter password"></b-form-input>
            </b-form-group>
            <div class="d-flex justify-content-between">
              <div>
                <b-button type="submit" variant="primary">Log In</b-button>&nbsp;
              </div>
              <div>
                <b-button to="forgot">Forgot Password</b-button>
              </div>
            </div>
          </b-form>
        </b-card>
      </b-col>
    </b-row>
  </b-container> -->
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  data () {
    return {
      showDismissibleAlert: false,
      form: {
        valid: true,
        email: 'jusupovz@gmail.com',
        password: 'qweqwe'
      },
      emailRules: [
        v => !!v || 'E-mail required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ],
      passwordRules: [
        v => !!v || 'Password required'
      ]
    }
  },
  computed: {
    ...mapGetters(['getErrors'])
  },
  created () {
    // this.$store.dispatch('clearAllMessages')
    // console.log(this.getOtherErrors)
  },
  methods: {
    ...mapActions(['signUserIn']),
    handleClick () {
      this.showDismissibleAlert = true
    },
    signin () {
      if (this.$refs.form.validate()) {
        this.signUserIn(this.form)
          .then(() => this.$router.push('/dashboard'))
          .catch(() => {
            // todo show errors from vuex state
          })
        // this.$refs.form.reset()
      }
    },
    onSubmit (evt) {
      // evt.preventDefault()
      // // alert(JSON.stringify(this.form))
      // this.signUserIn(this.form)
      //   .then(() => this.$router.push('/'))
      //   .catch(() => {
      //     // todo show errors from vuex state
      //   })
    }
  }
}
</script>
