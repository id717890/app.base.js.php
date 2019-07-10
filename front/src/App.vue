<template>
  <router-view></router-view>
</template>

<script>
import authMixin from './mixins/auth'
export default {
  mixins: [authMixin],
  name: 'App',
  components: {
  },
  data () {
    return {
      drawer: false,
      drawerRight: false,
      right: false,
      left: false,
      menuTopRight: [
        { id: 1, text: 'About', url: '/about', icon: 'coffee', size: '1x', order: 1, showIfAuth: true }
      ],
      menuTopLeft: [
        { id: 1, text: '', url: '/', icon: 'home', size: '2x', order: 1, class: 'ml-2', showIfAuth: true },
        { id: 2, text: '', url: '/dashboard', icon: 'crown', size: '2x', order: 2, showIfAuth: true }
      ],
      menuAuth: [
        { id: 1, text: '', url: '/logoff', icon: 'sign-out-alt', size: '2x', order: 2, showIfAuth: true }
      ],
      menuNotAuth: [
        { id: 1, text: 'Log In', url: '/login', icon: 'user-tie', size: '1x', order: 2, showIfAuth: true },
        { id: 2, text: 'Register', url: '/register', icon: 'user-tie', size: '1x', order: 2, showIfAuth: true }
      ]
    }
  },
  props: {
    source: String
  },
  methods: {
    test () {
      this.$router.push('/dashboard/users')
    }
  }
}
</script>

<style lang="scss">
@import './assets/scss/_app';

</style>
