<template>
  <v-app id="inspire">
    <v-toolbar
      class="light-blue darken-3" ref="menu"
      dark
      clipped-right
    >
      <v-toolbar-side-icon @click.stop="drawer = !drawer" class="hidden-md-and-up ">
        <fai icon="align-justify"></fai>
      </v-toolbar-side-icon>
      <v-toolbar-title class="white--text">
        <img style="max-height: 40px" :src="require('../../static/img/logo/2.png')" alt="Evgenia Kabanova movement coach">
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn flat to="/home"><i class="mr-1 fa fa-home fa-2x"></i></v-btn>
        <v-btn flat to="/about"><i class="mr-1 fa fa-info"></i>Обо мне</v-btn>
        <v-btn flat to="/contacts"><i class="mr-1 fa fa-location-arrow"></i>Контакты</v-btn>
        <v-btn flat to="/articles"><i class="mr-1 fab fa-pagelines"></i>Новости</v-btn>
      </v-toolbar-items>
      <section class="hidden-sm-and-down">
        <v-menu :nudge-width="100">
          <template v-slot:activator="{ on }">
            <v-toolbar-title v-on="on" class="mx-3">
              <span>Программы</span>
              <fai icon="angle-down" class="ml-2" />
            </v-toolbar-title>
          </template>
          <v-list>
            <v-list-tile @click="$router.push('/product/'+product.id)" v-for="product in products" :key="product.id">
              <v-list-tile-title>
                <i :class="product.icon" class="mr-2"></i>{{product.name}}
              </v-list-tile-title>
            </v-list-tile>
          </v-list>
        </v-menu>
      </section>
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn flat to="/dashboard" v-if="isAuth"><i class="mr-1 fa fa-info"></i>ЛК</v-btn>
      </v-toolbar-items>
      <v-toolbar-items class="hidden-sm-and-down">
        <template v-if="!isAuth">
          <v-btn flat :to="menu.url" v-for="menu in menuNotAuth" :key="menu.id">
            <fai :icon="menu.icon" :size="menu.size" class="mr-1"/>{{menu.text}}
          </v-btn>
        </template>
        <v-btn flat @click="Logoff" class="mr-2" v-if="isAuth"><fai icon="sign-out-alt" size="2x" class="mr-1"/></v-btn>
      </v-toolbar-items>
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
            <v-list-tile-title>Главная</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile to="/about">
          <v-list-tile-action>
            <i class="mr-1 fa fa-info"></i>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Обо мне</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile to="/contacts">
          <v-list-tile-action>
            <i class="mr-1 fa fa-location-arrow"></i>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Контакты</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile to="/articles">
          <v-list-tile-action>
            <i class="mr-1 fab fa-pagelines"></i>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Новости</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-group :prepend-icon="'fa fa-cube'" no-action>
          <template v-slot:activator>
            <v-list-tile>
              <v-list-tile-content>
                <v-list-tile-title>Программы</v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </template>

          <v-list-tile :to="'/product/'+product.id" v-for="product in products" :key="product.id">
            <v-list-tile-content>
              <v-list-tile-title>{{product.name}}</v-list-tile-title>
            </v-list-tile-content>
            <v-list-tile-action>
              <i :class="product.icon"></i>
            </v-list-tile-action>
          </v-list-tile>
        </v-list-group>
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
    <v-content>
      <v-container fluid class="pa-0" fill-height>
        <router-view name="routerguest"></router-view>
      </v-container>
    </v-content>
    <div class="white--text footer2">
      <v-layout row wrap justify-center fill-height>
        <v-flex xs12>
          <v-layout row wrap justify-center>
            <v-flex xs12 class="text-xs-center pa-1 hidden-sm-and-down" style="vertical-align:middle !important">
              <v-layout row wrap align-center justify-center>
                <a href="https://vk.com/evgenia_kabanova" target="_blank" class="vk social">
                  <i class="fab fa-vk fa-3x mx-2"></i>
                </a>
                <a href="https://www.instagram.com/evgenia_kabanova/?hl=ru" target="_blank" class="instagram social">
                  <i class="fab fa-instagram fa-3x mx-2"></i>
                </a>
                <i><img style="max-height: 40px" :src="require('../../static/img/logo/2.png')" alt=""></i>
                <a href="https://www.facebook.com/evgeniya.kabanova.3" target="_blank" class="fb social">
                  <i class="fab fa-facebook fa-3x mx-2"></i>
                </a>
                <a href="https://www.youtube.com/channel/UCKcpqrRCQ_BaZWNTom6E39g?view_as=subscriber" target="_blank" class="youtube social">
                  <i class="fab fa-youtube fa-3x mx-2"></i>
                </a>
              </v-layout>
            </v-flex>
            <v-flex xs12 class="text-xs-center pa-1 hidden-md-and-up" style="vertical-align:middle !important">
              <v-layout row wrap align-center justify-center>
                <a href="https://vk.com/evgenia_kabanova" target="_blank" class="vk social">
                  <i class="fab fa-vk fa-2x mx-2"></i>
                </a>
                <a href="https://www.instagram.com/evgenia_kabanova/?hl=ru" target="_blank" class="instagram social">
                  <i class="fab fa-instagram fa-2x mx-2"></i>
                </a>
                <i><img style="max-height: 40px" :src="require('../../static/img/logo/2.png')" alt=""></i>
                <a href="https://www.facebook.com/evgeniya.kabanova.3" target="_blank" class="fb social">
                  <i class="fab fa-facebook fa-2x mx-2"></i>
                </a>
                <a href="https://www.youtube.com/channel/UCKcpqrRCQ_BaZWNTom6E39g?view_as=subscriber" target="_blank" class="youtube social">
                  <i class="fab fa-youtube fa-2x mx-2"></i>
                </a>
              </v-layout>
            </v-flex>
          </v-layout>
        </v-flex>
        <v-flex xs12 class="text-xs-center hidden-sm-and-down">
          <v-layout row nowrap justify-center align-center>
            <div class=" pt-3 pb-3" style="border-top: 2px solid rgba(255,255,255, 0.1)">&copy;2019 — <strong>All Rights Reserved. EvgeniaKabanova.com</strong></div>
            <v-btn small flat dark fab @click="scrollToTop"><i class="fa fa-chevron-up"></i></v-btn>
          </v-layout>
        </v-flex>
        <v-flex xs12 class="text-xs-center hidden-md-and-up">
          <v-layout row nowrap justify-center align-center>
            <div class=" pt-0 pb-0" style="border-top: 2px solid rgba(255,255,255, 0.1)">&copy;2019 — <strong>All Rights Reserved. EvgeniaKabanova.com</strong></div>
            <v-btn small flat dark fab @click="scrollToTop"><i class="fa fa-chevron-up"></i></v-btn>
          </v-layout>
        </v-flex>
      </v-layout>
    </div>
    <!-- <v-footer class="white--text footer1 mt-5" app height="auto" min-height="auto">
    </v-footer> -->
  </v-app>
</template>

<script>
import authMixin from '../mixins/auth'
import { mapState } from 'vuex'
export default {
  mixins: [authMixin],
  name: 'App',
  computed: {
    ...mapState({
      products: state => state.product.products
    })
  },
  data () {
    return {
      drawer: false,
      drawerRight: false,
      right: false,
      left: false,
      menuTopRight: [
        { id: 1, text: '', url: '/', icon: 'home', size: '2x', order: 1, class: 'ml-2', showIfAuth: true },
        { id: 2, text: 'Программы', url: '/course', icon: 'crown', size: '1x', order: 1, showIfAuth: true },
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
