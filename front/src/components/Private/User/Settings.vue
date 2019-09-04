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
                <v-text-field label="Еще раз новый пароль" type="password" v-model="form.passwordConfirm" required :rules="passwordConfirmRules"></v-text-field>
              </v-flex>
              <v-flex 12>
                <v-layout justify-space-between>
                  <v-btn large :disabled="!form.valid" color="success" @click="onSubmit" ><fai icon="save" class="mr-2" :loading="loading" />  Сохранить</v-btn>
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
      loading: false,
      form: {
        valid: false,
        password: '',
        passwordConfirm: ''
      },
      passwordRules: [
        v => !!v || 'Password required'
      ],
      passwordConfirmRules: [
        v => !!v || 'Password required',
        v => v === this.form.password || 'Password not equal'
      ]
    }
  },
  computed: {
    ...mapState({
      user: state => state.auth.user
    })
  },
  methods: {
    ...mapActions(['resetLk']),
    resetForm () {
      // this.form.password = ''
      // this.form.passwordConfirm = ''
      this.$refs.form.reset()
    },
    onSubmit (evt) {
      evt.preventDefault()
      this.loading = true
      this.$store.dispatch('clearAllMessages')
      if (this.$refs.form.validate()) {
        this.resetLk({ 'user': this.user, 'password': this.form.password })
          .then((x) => {
            this.resetForm()
          })
      } else this.loading = false
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
