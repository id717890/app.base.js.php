<template>
  <v-container>
    <v-layout py-5>
      <v-flex xs12 md-6 offset-md2 lg4 offset-lg4>
        <app-notify/>
        <v-form lazy-validation v-model="form.valid" ref="form">
          <v-flex 12>
            <v-text-field label="E-mail" v-model="form.email" required :rules="emailRules"></v-text-field>
            <v-text-field label="Пароль" type="password" v-model="form.password" required :rules="passwordRules"></v-text-field>
          </v-flex>
          <v-flex 12>
            <v-layout row wrap>
              <v-flex xs12>
                <v-btn  :disabled="!form.valid" :loading="loading" color="success" @click="signin" ><fai icon="sign-in-alt" class="mr-2" />  Вход</v-btn>
                <v-btn  flat to="/forgot"><fai icon="key" class="mr-2" />  Восстановить</v-btn>
                <v-btn left flat fab to="/"><fai icon="home" size="2x" /></v-btn>
                <v-btn left flat fab @click="login1">kaka</v-btn>
                <v-btn left flat fab @click="login2">jus</v-btn>
                <v-btn left flat fab @click="login3">jusa</v-btn>
                <v-btn left flat fab @click="loginAdmin">adm</v-btn>
                <v-btn left flat fab @click="loginUser">usr</v-btn>
              </v-flex>
            </v-layout>
          </v-flex>
        </v-form>
      </v-flex>
    </v-layout>
</v-container>
</template>

<script>
import { mapActions } from 'vuex'
import authMixins from '../../../mixins/auth'

export default {
  mixins: [authMixins],
  data () {
    return {
      loading: false,
      form: {
        valid: true,
        email: null,
        password: null
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
  },
  mounted () {
    this.$store.dispatch('clearAllMessages')
    // console.log(this.getOtherErrors)
  },
  methods: {
    ...mapActions(['signUserIn']),
    login1 () {
      this.form.email = 'kakashka87@list.ru'
      this.form.password = 'qweqwe'
    },
    login2 () {
      this.form.email = 'jus_za@mail.ru'
      this.form.password = 'qweqwe'
    },
    login3 () {
      this.form.email = 'jusupovaz@mail.ru'
      this.form.password = 'qweqwe'
    },
    loginAdmin () {
      this.form.email = 'admin@gmail.com'
      this.form.password = 'qweqwe'
    },
    loginUser () {
      this.form.email = 'user@gmail.com'
      this.form.password = 'qweqwe'
    },
    signin (e) {
      this.loading = true
      this.$store.dispatch('clearAllMessages')
      e.preventDefault()
      if (this.$refs.form.validate()) {
        this.signUserIn(this.form)
          .then(() => {
            if (this.isAdmin === true) {
              this.$router.push('/dashboard')
            } else {
              this.$router.push('/lk')
            }
          })
          .catch(x => {
            this.loading = false
          })
      } else this.loading = false
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
