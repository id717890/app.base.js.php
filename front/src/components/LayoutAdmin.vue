<template>
  <v-app id="inspire">
    <v-toolbar
      app
      clipped-right
    >
      <v-toolbar-side-icon @click.stop="drawer = !drawer">
        <fai icon="align-justify"></fai>
      </v-toolbar-side-icon>
      <v-toolbar-title class="white--text">
        <img style="max-height: 40px" :src="require('../../static/img/logo/1.png')" alt="Evgenia Kabanova movement coach">
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-btn flat @click="Logoff" class="mr-2" v-if="isAuth"><fai icon="sign-out-alt" size="2x" class="mr-1"/></v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-navigation-drawer
      fixed
      v-model="drawer"
      dark
      class="blue-grey darken-3"
      app
    >
    <v-toolbar flat class="blue-grey darken-4">
      <v-list>
        <v-list-tile>
          <v-list-tile-title class="title">
            <i class="fa fa-solar-panel ml-4"></i> {{userName}}
          </v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-toolbar>
    <v-list dense class="pt-0">
      <v-list-tile
        v-for="item in items"
        :key="item.title"
        :to="item.to"
      >
        <v-list-tile-action>
          <i :class="item.icon"></i>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>{{ item.title }}</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
      <v-list-tile @click="Logoff">
        <v-list-tile-action>
          <i class="fa fa-sign-out-alt"></i>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>Выход</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
    </v-list>
    </v-navigation-drawer>
    <v-content>
      <v-container fluid >
        <router-view name="routeradmin"></router-view>
      </v-container>
    </v-content>
    <div class="white--text blue-grey darken-3" style="z-index:10">
      <v-layout row wrap justify-center fill-height>
        <v-flex xs12 class="text-xs-center hidden-sm-and-down">
          <v-layout row nowrap justify-center align-center>
            <div class="py-0">&copy;2019 — <strong>All Rights Reserved. EvgeniaKabanova.com</strong></div>
            <v-btn small flat dark fab @click="scrollToTop"><i class="fa fa-chevron-up"></i></v-btn>
          </v-layout>
        </v-flex>
        <v-flex xs12 class="text-xs-center hidden-md-and-up">
          <v-layout row nowrap justify-center align-center>
            <div class="py-0" style="border-top: 2px solid rgba(255,255,255, 0.1)">&copy;2019 — <strong>All Rights Reserved. EvgeniaKabanova.com</strong></div>
            <v-btn small flat dark fab @click="scrollToTop"><i class="fa fa-chevron-up"></i></v-btn>
          </v-layout>
        </v-flex>
      </v-layout>
    </div>
    <!-- <v-footer color="blue-grey darken-4" class="white--text" app>
      <span>EvgeniaKabanova.com</span>
      <v-spacer></v-spacer>
      <span>&copy; 2019</span>
    </v-footer> -->
  </v-app>
</template>

<script>
import authMixin from '../mixins/auth'
import { mapState } from 'vuex'
export default {
  mixins: [authMixin],
  name: 'App',
  components: {
  },
  data () {
    return {
      items: [
        { title: 'Главная', icon: 'fa fa-home', to: '/' },
        { title: 'Новости', icon: 'fab fa-pagelines', to: '/dashboard/news' },
        // { title: 'Программы', icon: 'fa fa-dumbbell', to: '/dashboard/products' },
        { title: 'Участники', icon: 'fa fa-users', to: '/dashboard/members' },
        { title: 'Отзывы', icon: 'fa fa-comments', to: '/dashboard/feedbacks' },
        { title: 'Настройки', icon: 'fa fa-cogs', to: '/dashboard/settings' }
      ],
      drawer: true,
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
  computed: {
    ...mapState({
      userName: state => state.auth.name
    })
  },
  methods: {
    scrollToTop () {
      // let element = this.$refs['menu']
      // var top = element.offsetTop
      window.scrollTo({ top: 0, left: 0, behavior: 'smooth' })
    },
    test () {
      this.$router.push('/dashboard/users')
    }
  }
}
</script>
