<template>
  <v-app id="inspire">
    <v-toolbar
      fixed
      app
      flat
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
            <i class="fa fa-sun ml-4"></i> Кабинет
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
          <i :class="'fa '+item.icon"></i>
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
        <router-view name="routeruser"></router-view>
      </v-container>
    </v-content>
    <v-footer color="blue-grey darken-4" class="white--text" app>
      <span>EvgeniaKabanova.com</span>
      <v-spacer></v-spacer>
      <span>&copy; 2019</span>
    </v-footer>
  </v-app>
</template>

<script>
import authMixin from '../mixins/auth'
export default {
  mixins: [authMixin],
  name: 'App',
  data () {
    return {
      items: [
        { title: 'Главная', icon: 'fa-home', to: '/' },
        { title: 'Программы', icon: 'fa-dumbbell', to: '/lk/products' },
        { title: 'Настройки', icon: 'fa-cogs', to: '/lk/settings' }
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
  methods: {
    test () {
      this.$router.push('/dashboard/users')
    }
  }
}
</script>
