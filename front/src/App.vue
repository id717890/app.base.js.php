<template>
  <router-view name="main"></router-view>
</template>

<script>
import authMixin from './mixins/auth'
export default {
  mixins: [authMixin],
  name: 'App',
  components: {
    // HelloWorld
  },
  data () {
    return {
      drawer: false,
      drawerRight: false,
      right: false,
      left: false,
      menuTopRight: [
        { id: 1, text: '', url: '/', icon: 'home', size: '2x', order: 1, class: 'ml-2', showIfAuth: true },
        { id: 2, text: 'Курсы', url: '/course', icon: 'crown', size: '1x', order: 1, showIfAuth: true },
        { id: 3, text: 'Статьи', url: '/article', icon: 'pagelines', size: '1x', order: 1, showIfAuth: true },
        { id: 4, text: 'Обо мне', url: '/about', icon: 'info', size: '1x', order: 1, showIfAuth: true }
      ],
      menuTopLeft: [
        { id: 2, text: '', url: '/dashboard', icon: 'crown', size: '2x', order: 2, showIfAuth: true }
      ],
      menuAuth: [
        { id: 1, text: '', url: '/logoff', icon: 'sign-out-alt', size: '1x', order: 2, showIfAuth: true }
      ],
      menuNotAuth: [
        { id: 1, text: 'Вход', url: '/login', icon: 'sign-in-alt', size: '1x', order: 2, showIfAuth: true },
        { id: 2, text: 'Регистрация', url: '/register', icon: 'user-tie', size: '1x', order: 2, showIfAuth: true }
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
