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
            <v-layout justify-space-between>
              <v-btn large :disabled="!form.valid" color="primary" @click="onSubmit" ><fai icon="paper-plane" class="mr-2" />  E-mail me</v-btn>
              <v-btn left flat large to="/"><fai icon="home" size="2x" /></v-btn>
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
      showDismissibleAlert: false,
      form: {
        valid: true,
        email: ''
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
    ...mapActions(['signUserIn']),
    handleClick () {
      this.showDismissibleAlert = true
    },
    onSubmit (evt) {
    }
  }
}
</script>
