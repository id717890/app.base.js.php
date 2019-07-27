<template>
  <v-container>
    <v-layout py-5>
      <v-flex xs12 md-6 offset-md2 lg4 offset-lg4>
        <app-notify/>
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
    </v-flex>
  </v-layout>
  </v-container>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  props: ['code'],
  data () {
    return {
      form: {
        code: '',
        password: '',
        passwordConfirm: ''
      },
      passwordRules: [
        v => !!v || 'Password required'
      ]
    }
  },
  computed: {
    // getOtherErrors () {
    //   let newObject = {}
    //   const fields = ['Password', 'PasswordConfirm']
    //   for (let prop in this.getErrors) {
    //     if (!fields.includes(prop)) newObject[prop] = this.getErrors[prop]
    //   }
    //   return newObject
    // },
    validated () {
      return this.form.password === this.form.passwordConfirm && this.form.password.length >= 6
    }
  },
  methods: {
    ...mapActions(['reset']),
    resetForm () {
      this.form.password = ''
      this.form.passwordConfirm = ''
      this.form.code = ''
    },
    onSubmit (evt) {
      evt.preventDefault()
      this.reset(this.form)
        .then((x) => {
          // this.resetForm()
          this.$router.push('/login')
        })
    }
  },
  mounted () {
    this.form.code = this.code
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
