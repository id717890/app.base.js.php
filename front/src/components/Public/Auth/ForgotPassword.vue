<template>
  <v-container>
    <v-layout>
      <v-flex xs12 md-6 offset-md2 lg4 offset-lg4>
        <app-notify/>
        <v-form lazy-validation v-model="form.valid" ref="form">
          <v-flex 12>
            <v-text-field label="E-mail" v-model="form.email" required :rules="emailRules"></v-text-field>
          </v-flex>
          <v-flex 12>
            <v-layout row wrap justify-space-between>
              <v-btn large :loading="loading" :disabled="!form.valid" color="primary" @click="onSubmit" ><fai icon="paper-plane" class="mr-2" />  Восстановить</v-btn>
              <v-btn left flat fab to="/"><fai icon="home" size="2x" /></v-btn>
            </v-layout>
          </v-flex>
        </v-form>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  data () {
    return {
      loading: false,
      form: {
        valid: true,
        email: null
      },
      emailRules: [
        v => !!v || 'E-mail required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ]
    }
  },
  computed: {
    ...mapGetters(['getErrors'])
  },
  mounted () {
    this.$store.dispatch('clearAllMessages')
  },
  methods: {
    ...mapActions(['forgotPassword']),
    onSubmit (e) {
      this.loading = true
      this.$store.dispatch('clearAllMessages')
      e.preventDefault()
      if (this.$refs.form.validate()) {
        this.forgotPassword({ email: this.form.email })
          .then(() => {
            this.$refs.form.reset()
          })
          .catch(x => {
            this.loading = false
          })
      } else this.loading = false
    }
  }
}
</script>
