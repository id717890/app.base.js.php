<template>
  <v-layout justify-center align-center py-5>
    <v-flex xs12 md-6 lg4>
      <app-notify/>
      <v-form lazy-validation v-model="form.valid" ref="form">
        <v-flex 12>
          <v-text-field label="Имя" type="text" v-model="form.firstName" required :rules="textField"></v-text-field>
          <v-text-field label="E-mail" v-model="form.email" required :rules="emailRules"></v-text-field>
          <v-text-field label="Пароль" type="password" v-model="form.password" required :rules="passwordRules"></v-text-field>
          <v-text-field label="Пароль ещё раз" type="password" v-model="form.passwordConfirm" required :rules="passwordConfirmRules"></v-text-field>
          <!-- <v-text-field label="Last Name" type="text" v-model="form.lastName" required :rules="textField"></v-text-field> -->
        </v-flex>
        <v-flex 12>
          <v-layout justify-space-between>
            <v-btn :loading="loading" large :disabled="!form.valid" color="primary" @click="onSubmit" ><fai icon="sign-in-alt" class="mr-2" />  Register</v-btn>
            <v-btn large flat to="/forgot"><fai icon="key" class="mr-2" />  Forgot</v-btn>
            <v-btn left flat large to="/"><fai icon="home" size="2x" /></v-btn>
          </v-layout>
        </v-flex>
      </v-form>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  data () {
    return {
      loading: false,
      form: {
        valid: false,
        email: 'jusupovz@gmail.com',
        password: 'qweqwe',
        passwordConfirm: 'qweqwe',
        firstName: 'qweqwe'
        // lastName: 'qwe'
      },
      emailRules: [
        v => !!v || 'E-mail required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ],
      passwordRules: [
        v => !!v || 'Password required'
      ],
      passwordConfirmRules: [
        v => !!v || 'Password required',
        v => v === this.form.password || 'Password not equal'
      ],
      textField: [
        v => !!v || 'Field is required'
      ]
    }
  },
  computed: {
  },
  created () {
    this.$store.dispatch('clearAllMessages')
  },
  methods: {
    ...mapActions(['signUserUp']),
    handleClick () {
      this.showDismissibleAlert = true
    },
    resetForm () {
      // this.form.email = ''
      // this.form.password = ''
      // this.form.passwordConfirm = ''
      // this.form.firstName = ''
      // this.form.lastName = ''
      this.$refs.form.reset()
      this.loading = false
    },
    onSubmit (e) {
      this.loading = true
      this.$store.dispatch('clearAllMessages')
      e.preventDefault()
      if (this.$refs.form.validate()) {
        this.signUserUp({ email: this.form.email, password: this.form.password, passwordConfirm: this.form.passwordConfirm, name: this.form.firstName })
          .then((x) => {
            this.resetForm()
          })
          .catch(x => {
            this.loading = false
          })
      }
    }
  }
}
</script>
