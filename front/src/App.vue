<template>
  <router-view name="main"></router-view>
</template>

<script>
import authMixin from './mixins/auth'
import { mapActions } from 'vuex'

export default {
  mixins: [authMixin],
  name: 'App',
  components: {
    // HelloWorld
  },
  methods: {
    ...mapActions(['getAllProducts'])
  },
  async created () {
    this.getAllProducts()
  }
}
</script>

<style lang="scss">
@import './assets/scss/_app';

</style>
