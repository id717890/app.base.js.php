<template>
  <v-layout justify-center align-center>
    <v-flex xs12 md-6 lg4>
      <app-notify/>
      <v-form lazy-validation v-model="form.valid" ref="form">
        <v-flex 12>
          <v-text-field label="E-mail" v-model="form.email" required :rules="emailRules"></v-text-field>
          <v-text-field label="Password" type="password" v-model="form.password" required :rules="passwordRules"></v-text-field>
          <v-text-field label="Password Confirm" type="password" v-model="form.passwordConfirm" required :rules="passwordConfirmRules"></v-text-field>
          <v-text-field label="First Name" type="text" v-model="form.firstName" required :rules="textField"></v-text-field>
          <v-text-field label="Last Name" type="text" v-model="form.lastName" required :rules="textField"></v-text-field>
        </v-flex>
        <v-flex 12>
          <v-layout justify-space-between>
            <v-btn large flat :to="{ name: 'Users'}"><fai icon="times" class="mr-2" />Cancel</v-btn>
            <v-btn :loading="loading" large :disabled="!form.valid" color="success" @click="onSubmit" ><fai icon="check" class="mr-2" />Ok</v-btn>
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
        email: '',
        password: '',
        passwordConfirm: '',
        firstName: '',
        lastName: ''
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
        this.signUserUp(this.form)
          .then((x) => {
            this.resetForm()
          })
          .catch(x => {
            console.log(x)
            this.loading = false
          })
      } else {
        this.loading = false
      }
    }
  }
}
</script>
