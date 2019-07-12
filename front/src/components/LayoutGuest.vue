<template>
  <v-app id="inspire">
    <!-- <v-navigation-drawer
      fixed
      v-model="drawerRight"
      right
      clipped
      app
    >
      <v-list dense>
        <v-list-tile @click.stop="right = !right">
          <v-list-tile-action>
            <fai icon="save"></fai>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Open Temporary Drawer</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer> -->
    <v-toolbar
      app
      class="red lighten-1"
      fixed
      clipped-right
    >
      <v-toolbar-side-icon @click.stop="drawer = !drawer" class="hidden-md-and-up ">
        <fai icon="align-justify"></fai>
      </v-toolbar-side-icon>
      <!-- <v-toolbar-items>
        <v-btn flat to="/" class="ml-2"><fai icon="home" size="2x" class="mr-1"/></v-btn>
        <v-btn flat to="/dashboard" v-if="isAuth"><fai icon="crown" size="2x" class="mr-1"/></v-btn>
      </v-toolbar-items> -->
      <!-- <v-menu :nudge-width="100" v-if="isAuth">
        <template v-slot:activator="{ on }">
          <v-toolbar-title v-on="on">
            <span>Спарвочники</span>
            <fai icon="angle-down" class="ml-2" />
          </v-toolbar-title>
        </template>
        <v-list>
          <v-list-tile @click="$router.push('/dashboard/roles')">
            <v-list-tile-title><fai icon="user-tag" class="mr-2" /> Роли</v-list-tile-title>
          </v-list-tile>
          <v-list-tile @click="$router.push('/dashboard/users')">
            <v-list-tile-title><fai icon="users-cog" class="mr-2" /> Пользователи</v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-menu> -->
      <v-spacer></v-spacer>
      <v-toolbar-items class="hidden-sm-and-down">
        <!-- <v-btn flat :to="menu.url" v-for="menu in menuTopRight" :key="menu.id" :class="menu.class">
          <fai :icon="menu.icon" :size="menu.size" class="mr-1"/>{{menu.text}}
        </v-btn> -->
        <v-btn flat to="/home"><i class="mr-1 fa fa-home"></i>Home</v-btn>
        <v-btn flat to="/cource"><i class="mr-1 fa fa-crown"></i>Курсы</v-btn>
        <v-btn flat to="/article"><i class="mr-1 fab fa-pagelines"></i>Статьи</v-btn>
        <v-btn flat to="/about"><i class="mr-1 fa fa-info"></i>Обо мне</v-btn>
      </v-toolbar-items>
      <v-toolbar-items class="hidden-sm-and-down">
        <template v-if="!isAuth">
          <v-btn flat :to="menu.url" v-for="menu in menuNotAuth" :key="menu.id">
            <fai :icon="menu.icon" :size="menu.size" class="mr-1"/>{{menu.text}}
          </v-btn>
        </template>
        <v-btn flat @click="Logoff" class="mr-2" v-if="isAuth"><fai icon="sign-out-alt" size="2x" class="mr-1"/></v-btn>
      </v-toolbar-items>
      <!-- <v-toolbar-side-icon @click.stop="drawerRight = !drawerRight">
        <fai icon="align-justify"></fai>
      </v-toolbar-side-icon> -->
    </v-toolbar>
    <v-navigation-drawer
      fixed
      v-model="drawer"
      app
      temporary
    >
      <v-list dense>
        <v-list-tile to="/home">
          <v-list-tile-action>
            <i class="mr-1 fa fa-home"></i>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Home</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile to="/cource">
          <v-list-tile-action>
            <i class="mr-1 fa fa-crown"></i>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Курсы</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile to="/article">
          <v-list-tile-action>
            <i class="mr-1 fab fa-pagelines"></i>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Статьи</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile to="/about">
          <v-list-tile-action>
            <i class="mr-1 fa fa-info"></i>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Об авторе</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>

        <div v-if="!isAuth" >
          <v-list-tile :to="menu.url" v-for="menu in menuNotAuth" :key="menu.id">
            <v-list-tile-action>
              <fai :icon="menu.icon" :size="menu.size" class="mr-1"/>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>{{menu.text}}</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </div>

        <v-list-tile @click="Logoff" v-if="isAuth">
          <v-list-tile-action>
            <i class="mr-1 fa fa-sign-out-alt"></i>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Выход</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <!-- <v-navigation-drawer
      temporary
      v-model="left"
      fixed
    ></v-navigation-drawer> -->
    <v-content>
      <v-container fluid class="pa-0">
        <router-view></router-view>
      </v-container>
    </v-content>
    <!-- <v-navigation-drawer
      right
      temporary
      v-model="right"
      fixed
    ></v-navigation-drawer> -->
    <v-footer height="auto"  class="white--text" app dark absolute>
      <v-layout row wrap justify-center fill-height>
        <v-flex xs8>
      <v-layout row justify-center>
        <v-flex xs12 class="text-xs-center pa-1" >
          <i class="fab fa-instagram fa-3x mx-2"></i>
          <i class="fab fa-facebook fa-3x mx-2"></i>
          <i class="fab fa-vk fa-3x mx-2"></i>
          <i class="fab fa-google-plus fa-3x mx-2"></i>
        </v-flex>
      </v-layout>
        </v-flex>
        <v-flex xs8 class="text-xs-center">
          <div class=" pt-3 pb-3" style="border-top: 2px solid rgba(255,255,255, 0.1)">&copy;2019 — <strong>All Rights Reserved.</strong></div>
        </v-flex>
      </v-layout>
      <!-- <span>Vuetify</span>
      <v-spacer></v-spacer>
      <span>&copy; 2017</span> -->
    </v-footer>
  </v-app>
</template>

<script>
import authMixin from '../mixins/auth'
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
