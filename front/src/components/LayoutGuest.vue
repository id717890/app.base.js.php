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
      color="red"
      dark
      fixed
      app
      clipped-right
    >
      <!-- <v-toolbar-side-icon @click.stop="drawer = !drawer">
        <fai icon="align-justify"></fai>
      </v-toolbar-side-icon> -->
      <v-toolbar-items>
        <v-btn flat to="/" class="ml-2"><fai icon="home" size="2x" class="mr-1"/></v-btn>
        <v-btn flat to="/dashboard" v-if="isAuth"><fai icon="crown" size="2x" class="mr-1"/></v-btn>
      </v-toolbar-items>
      <v-menu :nudge-width="100" v-if="isAuth">
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
      </v-menu>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-btn flat :to="menu.url" v-for="menu in menuTopRight" :key="menu.id" :class="menu.class">
          <fai :icon="menu.icon" :size="menu.size" class="mr-1"/>{{menu.text}}
        </v-btn>
      </v-toolbar-items>
      <v-toolbar-items>
        <template v-if="!isAuth">
          <v-btn flat :to="menu.url" v-for="menu in menuNotAuth" :key="menu.id">
            <fai :icon="menu.icon" :size="menu.size" class="mr-1"/>{{menu.text}}
          </v-btn>
        </template>
        <template v-if="isAuth">
        </template>
        <v-btn flat @click="Logoff" class="mr-2" v-if="isAuth"><fai icon="sign-out-alt" size="2x" class="mr-1"/></v-btn>
      </v-toolbar-items>
      <!-- <v-toolbar-side-icon @click.stop="drawerRight = !drawerRight">
        <fai icon="align-justify"></fai>
      </v-toolbar-side-icon> -->
    </v-toolbar>
    <!-- <v-navigation-drawer
      fixed
      v-model="drawer"
      app
    >
      <v-list dense>
        <v-list-tile @click.stop="left = !left">
          <v-list-tile-action>
            <v-icon>exit_to_app</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Open Temporary Drawer</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer> -->
    <!-- <v-navigation-drawer
      temporary
      v-model="left"
      fixed
    ></v-navigation-drawer> -->
    <v-content>
      <v-container fluid fill-height>
        <router-view></router-view>
      </v-container>
    </v-content>
    <!-- <v-navigation-drawer
      right
      temporary
      v-model="right"
      fixed
    ></v-navigation-drawer> -->
    <v-footer color="blue-grey" class="white--text" app>
      <span>Vuetify</span>
      <v-spacer></v-spacer>
      <span>&copy; 2017</span>
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
