<template>
  <v-layout row>
    <v-flex xs12>
        <app-notify/>
        <v-card>
          <v-card-title>
            <i class="fa fa-key mr-3"></i>
            Смена пароля
          </v-card-title>
          <v-card-text>
            <v-form lazy-validation v-model="form.valid" ref="form">
              <v-flex 12>
                <v-text-field label="Новый пароль" type="password" v-model="form.password" required :rules="passwordRules"></v-text-field>
                <v-text-field label="Еще раз новый пароль" type="password" v-model="form.passwordConfirm" required :rules="passwordRules"></v-text-field>
              </v-flex>
              <v-flex 12>
                <v-layout justify-space-between>
                  <v-btn large :disabled="!validated" color="success" @click="onSubmit" ><fai icon="save" class="mr-2" />  Сохранить</v-btn>
                </v-layout>
              </v-flex>
            </v-form>
          </v-card-text>
        </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapState, mapActions } from 'vuex'
export default {
  data () {
    return {
      form: {
        password: '',
        passwordConfirm: ''
      },
      passwordRules: [
        v => !!v || 'Password required'
      ]
    }
  },
  computed: {
    ...mapState({
      user: state => state.auth.user
    }),
    validated () {
      return this.form.password === this.form.passwordConfirm && this.form.password.length >= 6
    }
  },
  methods: {
    ...mapActions(['resetLk']),
    resetForm () {
      // this.form.password = ''
      // this.form.passwordConfirm = ''
      this.$refs.form.reset()
    },
    onSubmit (evt) {
      this.$store.dispatch('clearAllMessages')
      evt.preventDefault()
      this.resetLk({ 'user': this.user, 'password': this.form.password })
        .then((x) => {
          this.resetForm()
        })
    }
  },
  async created () {
    this.$store.dispatch('clearAllMessages')
    if (this.code === null || this.code === '') alert('Некорректная ссылка для восстановления')
    else {
      this.form.code = this.code
    }
  }
}
</script>

<style>

</style>
