import { mapGetters, mapActions } from 'vuex'
export default {
  computed: {
    ...mapGetters(['isAuth'])
  },
  methods: {
    ...mapActions(['logout']),
    Logoff () {
      this.logout()
      this.$router.push('/')
    }
  }
}
