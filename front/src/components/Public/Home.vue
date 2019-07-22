<template>
  <v-layout column class="bg1">
    <v-flex xs12>
      <v-layout row wrap fill-height class="bg1">
        <v-flex xs12 md5 align-self-center px-4 class="h1-left-block pa-1">
          <!-- <section class="hidden-sm-and-down">
            <h1 class="h1-s1">Время </h1>
            <h1 class="h1-s1 ml-5">заняться</h1>
            <h1 class="h1-s1 ml-5 pl-5">собой.</h1>
          </section>
          <section class="hidden-md-and-up">
            <h1 class="h1-s1">Время <br> заняться <br> собой. </h1>
          </section> -->
          <section>
            <img class="logo-home" :src="require('../../../static/img/logo/1.png')" alt="Evgenia Kabanova movement coach">
          </section>
          <p class="logo-text">
            Друзья, добро пожаловать на сайт <strong class="strong2">Евгении Кабановой</strong>, мастера спорта международного класса, чемпионки мира по спортивной акробатике.
          </p>
          <p class="logo-text">
            Здесь вы найдете полезную информацию о тренировках, сможете пройти бесплатный челлендж, а также купить новую уникальную фитнес-программу <strong class="strong2">«ДВИЖЕНИЕ»</strong> с элементами FLOW! Эта программа не только изменит ваш подход к тренировкам, но и изменит вашу жизнь!
          </p>
          <p class="strong2 text-xs-center" style="color:#DD2C00; font-size: 1.4rem">Старт программы 1 октября 2019!</p>
        </v-flex>
        <v-flex xs12 md7 style="height: 100vh; overflow: hidden">
          <v-carousel
            height="100%"
            hide-delimiters
            hide-controls
            prev-icon="fa fa-arrow-left"
            next-icon="fa fa-arrow-right"
      >
        <v-carousel-item class="h100"
          v-for="(item,i) in items"
          :key="i"
        >
          <v-img height="100%" :src="item.src" :lazy-src="item.lazy"></v-img>
        </v-carousel-item>
      </v-carousel>
          <!-- <img src="../../static/img/SoqSO8UTTrSk5G9R3G7o_Revamped Background.png"  style="height: 100%"  alt="" > -->
        </v-flex>
      </v-layout>
    </v-flex>
    <v-flex class="grey lighten-1">
      <v-layout class="bg1" row wrap>
        <v-flex xs12>
          <h2 class="h2-s1 text-xs-center pt-2 mt-5 mb-3"><i class="far fa-handshake"></i> Партнеры </h2>
        </v-flex>
        <v-flex xs12 md8 offset-md2 mb-5 style="color: #d19c1d">
          <v-layout row wrap justify-center>
            <v-flex xs12 md6 lg4 v-for="partner in partners" :key="partner.id" class="text-xs-center pa-3">
              <div class="partner-wrapper">
                <div class="partner border grow-and-rotate">
                  <a href="https://www.utmn.ru/ifk/" target="_blank">
                    <v-img  width="100%" class="" height="100%" :src="partner.img"></v-img>
                  </a>
                </div>
                <p>{{partner.txt}}</p>
              </div>
            </v-flex>
            <!-- <v-flex xs12 md6 lg4 style="display:flex;" pr-3 mb-3 align-center>
              <i class="fa fa-star fa-3x mr-3"></i>
              <span>Lorem ipsum dolor sit amet</span>
            </v-flex>
            <v-flex xs12 md6 lg4 style="display:flex;" pr-3 mb-3 align-center>
              <i class="fa fa-cloud fa-3x mr-3"></i>
              <span>Sed ut leo sed eros tristique</span>
            </v-flex>
            <v-flex xs12 md6 lg4 style="display:flex;" pr-3 mb-3 align-center>
              <i class="fa fa-feather fa-3x mr-3"></i>
              <span>Suspendisse euismod tortor</span>
            </v-flex>
              <v-flex xs12 md6 lg4 style="display:flex;" pr-3 mb-3 align-center>
              <i class="fa fa-heart fa-3x mr-3"></i>
              <span>Ut sed tellus pharetra</span>
            </v-flex>
            <v-flex xs12 md6 lg4 style="display:flex;" pr-3 mb-3 align-center>
              <i class="fa fa-leaf fa-3x mr-3"></i>
              <span>Nullam eu quam in massa</span>
            </v-flex>
            <v-flex xs12 md6 lg4 style="display:flex;" pr-3 mb-3 align-center>
              <i class="fa fa-american-sign-language-interpreting fa-3x mr-3"></i>
              <span>Quanta es omnia des</span>
            </v-flex> -->
          </v-layout>
        </v-flex>
      </v-layout>
    </v-flex>
    <v-flex xs12>
      <div class="prlx prlxb3">
        <v-layout row wrap justify-center align-center class="vh100">
          <v-flex xs xs12 sm6 md5 lg4 pa-3 v-for="(product, index) in products" :key="product.id">
            <v-card class="product elevation-12" :color="randColor(index)">
              <v-img
                aspect-ratio="2.75"
                :src="require('../../../static/img/' + product.photo)"
                height="400"
              ></v-img>

              <v-card-title primary-title>
                <div>
                  <h3 class="headline mb-0">{{product.name}}</h3>
                  <div>{{product.description}}</div>
                </div>
              </v-card-title>

              <v-card-actions>
                <v-btn :to="'/product/'+product.id" large round dark color="deep-orange" style="margin: auto" v-if="product.price>0">
                  <i class="fa fa-shopping-cart fa-2x mr-2"></i>
                  Buy {{Number(product.price)}}$
                </v-btn>
                <v-btn :to="'/product/'+product.id" large round dark color="deep-orange" style="margin: auto" v-else>
                  <i class="fa fa-shopping-cart fa-2x mr-2"></i>
                  Try It Free
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </div>
    </v-flex>
    <!-- <v-flex xs12 class="text-xs-center bg1 my-4">
      <h2 class="h2-s1">Opinions about us</h2>
    </v-flex>
    <v-flex xs12 class="bg1 pa-1">
      <v-layout row wrap justify-center>
        <v-card max-width="400" color="pink lighten-3 elevation-10" class="mr-3 mb-5">
          <v-card-title>
            <i class="fab fa-2x fa-twitter"></i>
            <span>Отзыв №1</span>
          </v-card-title>
          <v-card-text>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, placeat quis autem vero alias molestiae hic necessitatibus dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
          </v-card-text>
          <v-card-actions>
            <v-list-tile>
              <v-list-tile-avatar>
                <v-img class="elevation-6" :src="img"></v-img>
              </v-list-tile-avatar>
            </v-list-tile>
            <v-list-tile-content>Test</v-list-tile-content>
          </v-card-actions>
        </v-card>
        <v-card max-width="400" color="cyan darken-1 elevation-10" class="mr-3 mb-5">
          <v-card-title>
            <i class="fab fa-2x fa-twitter"></i>
            <span>Отзыв №1</span>
          </v-card-title>
          <v-card-text>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, placeat quis autem vero alias molestiae hic necessitatibus dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
          </v-card-text>
          <v-card-actions>
            <v-list-tile>
              <v-list-tile-avatar>
                <v-img class="elevation-6" :src="img"></v-img>
              </v-list-tile-avatar>
            </v-list-tile>
            <v-list-tile-content>Test</v-list-tile-content>
          </v-card-actions>
        </v-card>
        <v-card max-width="400" color="green darken-1 elevation-10" class="mr-3 mb-5">
          <v-card-title>
            <i class="fab fa-2x fa-twitter"></i>
            <span>Отзыв №1</span>
          </v-card-title>
          <v-card-text>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, placeat quis autem vero alias molestiae hic necessitatibus dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, placeat quis autem vero alias molestiae hic necessitatibus dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
          </v-card-text>
          <v-card-actions>
            <v-list-tile>
              <v-list-tile-avatar>
                <v-img class="elevation-6" :src="img"></v-img>
              </v-list-tile-avatar>
            </v-list-tile>
            <v-list-tile-content>Test</v-list-tile-content>
          </v-card-actions>
        </v-card>
        <v-card max-width="400" color="blue darken-1 elevation-10" class="mr-3 mb-5">
          <v-card-title>
            <i class="fab fa-2x fa-twitter"></i>
            <span>Отзыв №1</span>
          </v-card-title>
          <v-card-text>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, placeat quis autem vero alias molestiae hic necessitatibus dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, placeat quis autem vero alias molestiae hic necessitatibus dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?
          </v-card-text>
          <v-card-actions>
            <v-list-tile>
              <v-list-tile-avatar>
                <v-img class="elevation-6" :src="img"></v-img>
              </v-list-tile-avatar>
            </v-list-tile>
            <v-list-tile-content>Test</v-list-tile-content>
          </v-card-actions>
        </v-card>
      </v-layout>
    </v-flex> -->
    <v-flex xs12 class="text-xs-center bg1 my-4">
      <h2 class="h2-s1">Отзывы о нас <i class="fa fa-comment"></i> </h2>
    </v-flex>
    <v-flex xs12 class="bg1 pa-1">
      <v-layout row wrap justify-center>
        <feedbacks4/>
        <feedbacks3/>
        <!-- <feedbacks4 class="hidden-md-and-down"/> -->
        <!-- <v-card max-width="330" :color="item.color" class="mr-3 mb-5 elevation-5 product feedback" v-for="item in feedbacks" :key="item.id">
          <v-card-title>
            <v-list-tile>
              <v-list-tile-avatar class="avatar1">
                <v-img class="elevation-6" :src="item.img"></v-img>
              </v-list-tile-avatar>
            </v-list-tile>
          </v-card-title>
          <v-card-text>
            <div class="feed-wrapper">
              {{item.text}}
            </div>
          </v-card-text>
          <v-card-actions class="px-5">
            <p style="color: #d19c1d; font-size: 0.7rem"><i class="fa fa-user"></i> {{item.fio}}</p>
          </v-card-actions>
        </v-card> -->
      </v-layout>
    </v-flex>
    <!-- <v-flex xs12 class="bg1" style="height: 500px">
      <v-carousel
        delimiter-icon="fa fa-stop"
        prev-icon="fa fa-arrow-left"
        next-icon="fa fa-arrow-right"
      >
        <v-carousel-item
          v-for="(item,i) in items"
          :key="i"
          :src="item.src"
        ></v-carousel-item>
      </v-carousel>
    </v-flex> -->
    <!-- <v-flex xs12 class="red lighten-5 pa-3">
      <h1 class="text-xs-center">Отзывы</h1>
    </v-flex> -->
    <v-flex xs12>
      <div class="end-block">
        <v-layout row wrap style="z-index: 2">
          <v-flex xs12 sm12 md10 offset-md1 py-5>
            <v-layout row wrap style="z-index: 2" align-center>
              <v-flex xs12 sm12 md4 style="z-index: 3" class="text-justify px-4">
                <!-- <h2 class="h2-s1">
                  Free happy <br> hours for <br> new people
                </h2> -->
                <br>
                <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Друзья, всем привет!</p>
                <p>Рада видеть вас на моем сайте! Здесь я буду делиться с вами своим опытом в сфере спорта и фитнеса, чтобы помочь вам стать лучшей версией себя!</p>
                <p>Надеюсь, что буду вам полезна, и буду очень рада вашим достижениям и успехам!</p>
                <p>Я всегда открыта к диалогу, поэтому, если у вас возникнут вопросы, или вы захотите поделиться со мной своими эмоциями, пишите мне, мои контактные данные указаны в разделе «контакты»!</p>
              </v-flex>
              <v-flex xs12 sm12 md8 style="z-index: 3" class="pa-3">
                <v-img style="border-radius: 15px" :src="require('../../../static/img/key_004_10.jpg')" max-height="580" max-width="740" class="elevation-20"></v-img>
              </v-flex>
            </v-layout>
          </v-flex>
        </v-layout>
      </div>
    </v-flex>
    <v-flex class="text-xs-center">
      <div class="wrapper-end-img">
        <img style="" :src="require('../../../static/img/decor.png')" alt="">
      </div>
    </v-flex>
  </v-layout>
  <!-- <HelloWorld /> -->
</template>

<script>
import Feedbacks4 from './Feedback4'
import Feedbacks3 from './Feedback3'
import { mapState } from 'vuex'
export default {
  components: {
    Feedbacks4,
    Feedbacks3
  },
  computed: {
    ...mapState({
      products: state => state.product.products
    })
  },
  data () {
    return {
      'img': require('../../../static/img/yoga-hd-wallpaper_024616754_279.jpg'),
      partners: [
        {
          id: 1,
          img: require('../../../static/img/partners/ifk.jpg'),
          txt: 'Институт физической культуры ТюмГУ'
        },
        {
          id: 2,
          img: require('../../../static/img/partners/VladimirChebaldin.jpg'),
          txt: 'Фотограф Владимир Чебалдин'
        },
        {
          id: 3,
          img: require('../../../static/img/partners/VladimirOgnev.jpg'),
          txt: 'Видеограф Владимир Огнев'
        },
        {
          id: 4,
          img: require('../../../static/img/partners/DanilaProhorenko.jpg'),
          txt: 'Видеограф Данила Прохоренко'
        },
        {
          id: 5,
          img: require('../../../static/img/partners/AnastasiaBadarina.jpg'),
          txt: 'Дизайнер Анастасия Бударина'
        },
        {
          id: 6,
          img: require('../../../static/img/partners/ZamirYusupov.jpg'),
          txt: 'Программист Замир Юсупов'
        }
      ],
      items: [
        {
          src: require('../../../static/img/key_001_10.jpg'),
          lazy: require('../../../static/img/key_001_10_lazy.jpg')
        },
        {
          src: require('../../../static/img/key_002_10.jpg'),
          lazy: require('../../../static/img/key_002_10_lazy.jpg')
        },
        {
          src: require('../../../static/img/key_003_10.jpg'),
          lazy: require('../../../static/img/key_003_10_lazy.jpg')
        },
        {
          src: require('../../../static/img/key_004_10.jpg'),
          lazy: require('../../../static/img/key_004_10_lazy.jpg')
        }
      ],
      feedbacksAll: [
        {
          id: 1,
          fio: 'Milena McKenzie',
          text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit.Lorem, ipsum dolor sit amet consectetur adipisicing elit.Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
          img: require('../../../static/img/fitness.jpg'),
          color: 'light-green lighten-4'
        },
        {
          id: 2,
          fio: 'Milena McKenzie',
          text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?',
          img: require('../../../static/img/fitness.jpg'),
          color: 'teal lighten-4'
        },
        {
          id: 3,
          fio: 'Milena McKenzie',
          text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit. Saepe?',
          img: require('../../../static/img/fitness.jpg'),
          color: 'light-green lighten-4'
        },
        {
          id: 4,
          fio: 'Milena McKenzie',
          text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
          img: require('../../../static/img/fitness.jpg'),
          color: 'teal lighten-4'
        },
        {
          id: 5,
          fio: 'Milena McKenzie',
          text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. dolore harum eum molestias omnis voluptates quas error nemo quaerat ex impedit.',
          img: require('../../../static/img/fitness.jpg'),
          color: 'light-green lighten-4'
        }
      ]
    }
  },
  methods: {
    randColor (index) {
      switch (index) {
        case 0: return 'lime accent-4'
        case 1: return 'orange darken-1'
        case 2: return 'blue darken-2'
      }
    }
  }
}
</script>
