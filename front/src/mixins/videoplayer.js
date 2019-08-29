import { mapGetters, mapActions } from 'vuex'
export default {
  computed: {
    ...mapGetters(['isAuth', 'isAdmin', 'getUser'])
  },
  methods: {
    ...mapActions(['logout']),
    Logoff () {
      this.logout()
      this.$router.push('/')
    }
  }
}
