<template>
  <!-- <section @contextmenu.prevent="handler"> -->
  <section>
    <router-view name="main"></router-view>
    <modals-container/>
  </section>
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
    ...mapActions(['getAllProducts', 'getAllNews']),
    handler () {
    }
  },
  async created () {
    this.getAllProducts()
    this.getAllNews()
  }
}
</script>

<style lang="scss">
@import './assets/scss/_app';
</style>
