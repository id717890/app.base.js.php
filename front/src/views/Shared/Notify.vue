<template>
  <v-layout justify-center align-center>
    <v-flex xs12 md6 lg4>
      <v-card>
        <v-card-title primary-title>
            <v-alert style="width: 100%" value="true" :type="type">{{headerText}}</v-alert>
        </v-card-title>
        <v-card-text>
            <div> {{ message }} </div>
        </v-card-text>
        <v-card-actions>
          <v-btn large flat color="primary" to="/">Home</v-btn>
          <v-btn large flat color="orange" to="/login">Log In</v-btn>
        </v-card-actions>
      </v-card>
    </v-flex>
  </v-layout>

<!-- <b-container>
  <b-row class="pt-8" align-v="center" align-h="center">
    <b-col class="pt-10" lg=4 md>
      <b-card border-variant="secondary"
            :header="headerText"
            :header-bg-variant="type"
            header-text-variant="white"
            align="center"
            text-variant="dark">
      <p class="card-text">{{message}}</p>
      <div style="text-align:right">
        <b-button variant="primary" to="/">
          Home
        </b-button>
        <b-button variant="outline-primary" to="/signin">
          Log In
        </b-button>
      </div>
    </b-card>
    </b-col>
  </b-row>
</b-container> -->
</template>

<script>
export default {
  data () {
    return {
      headerText: '',
      message: '',
      type: 'primary'
    }
  },
  async created () {
    this.headerText = this.$route.query.h
    this.message = this.$route.query.m
    this.type = this.$route.query.t
  }
}
</script>
