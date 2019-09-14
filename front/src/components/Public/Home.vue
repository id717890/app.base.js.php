<template>
  <v-layout column class="bg1">
    <v-flex xs12>
      <v-carousel
            :cycle="true"
            class="elevation-0 100h"
            hide-delimiters
            hide-controls
            height="auto"
            prev-icon="fa fa-arrow-left"
            next-icon="fa fa-arrow-right">
        <v-carousel-item v-for="(item,i) in items" :key="i">
          <v-img style="height: 100%" :src="item.src" :lazy-src="item.lazy" class="hidden-sm-and-down">
            <!-- <span class="photo-sign">{{item.author}}</span> -->
            <!-- <span class="photo-text">{{item.text}}</span> -->
          </v-img>
          <v-img style="height: 100%" :src="item.src" :lazy-src="item.lazy" contain class="hidden-md-and-up">
            <!-- <span class="photo-sign">{{item.author}}</span> -->
            <!-- <span class="photo-text" style="margin: auto">{{item.text}}</span> -->
          </v-img>
        </v-carousel-item>
      </v-carousel>
    </v-flex>
    <v-flex xs12>
      <v-layout row wrap fill-height class="bg1">
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2  align-self-center px-4 class="h1-left-block pa-1 mt-5">
          <p class="logo-text" data-aos="fade-up">
            Друзья, добро пожаловать на сайт Евгении Кабановой, мастера спорта международного класса, чемпионки мира по спортивной акробатике и сертифицированного инструктора методики ANIMAL FLOW.
          </p>
          <p class="logo-text" data-aos="fade-up" data-aos-delay="100">
            Здесь вы найдете полезную информацию о тренировках, сможете пройти бесплатный челлендж, <strong class="">а также купить новую уникальную фитнес-программу «ДВИЖЕНИЕ» с элементами FLOW!</strong> Эта программа не только изменит ваш подход к тренировкам, но и изменит вашу жизнь!
          </p>
          <p data-aos="fade-up" data-aos-delay="200" class="strong2 text-xs-center" style="color:#DD2C00; font-size: 1.4rem">Старт программы 1 октября 2019!</p>
        </v-flex>
      </v-layout>
    </v-flex>
    <v-flex class="grey lighten-1"  xs12>
      <v-layout class="bg1" row wrap>
        <v-flex xs12  data-aos="zoom-in"  data-aos-delay="200">
          <h2 class="h2-s1 text-xs-center pt-2 mt-5 mb-3"><i class="far fa-handshake"></i> Партнеры фитнес-программы <br>«ДВИЖЕНИЕ»</h2>
        </v-flex>
        <v-flex xs12 md8 offset-md2 mb-5 style="color: #d19c1d">
          <v-layout row wrap justify-center>
            <v-flex xs12 md6 lg4 v-for="partner in partners" :key="partner.id" class="text-xs-center pa-3">
              <div class="partner-wrapper" :data-aos-delay="delayRand(500, 1500)" :data-aos="effectZoomRand()">
                <div class="partner border grow-and-rotate">
                  <a :href="partner.url" target="_blank">
                    <v-img  width="100%" class="" height="100%" :src="partner.img"></v-img>
                  </a>
                </div>
                <p v-html="partner.txt" :data-aos-delay="delayRand(1500, 1800)" data-aos="flip-up"></p>
              </div>
            </v-flex>
          </v-layout>
        </v-flex>
      </v-layout>
    </v-flex>
    <v-flex xs12>
      <div class="prlx prlxb3">
        <v-layout row wrap justify-center align-center class="vh100">
          <v-flex xs xs12 sm6 md5 lg4 pa-3 v-for="(product, index) in products" :key="product.id">
            <v-card class="product elevation-12" :color="randColor(index)" data-aos="zoom-in">
              <v-img
                aspect-ratio="2.75"
                :src="require('../../../static/img/' + product.photo)"
                height="400"
              ></v-img>

              <v-card-title primary-title>
                <div style="width: 100%!important">
                  <h3 class="headline mb-0 text-xs-center white--text"  v-html="product.name_html"></h3>
                  <div class="text-xs-center white--text mt-4 mb-3">{{product.description}}</div>
                </div>
              </v-card-title>

              <v-card-actions class="hidden-sm-and-down" data-aos="zoom-in">
                <v-btn :to="'lk/products'" large round dark color="deep-orange" style="margin: auto" v-if="product.price>0">
                  <i class="fab fa-cc-visa fa-2x mr-2"></i>
                  Купить
                </v-btn>
                <v-btn :to="'/lk/products'" large round dark color="deep-orange" style="margin: auto" v-else>
                  <i class="fa fa-dumbbell fa-2x mr-2"></i>
                  Регистрация
                </v-btn>
                <v-btn small  flat :to="'/product/'+product.id"  dark color="white" style="margin: auto">
                  Подробнее
                </v-btn>
              </v-card-actions>

              <v-card-actions class="hidden-md-and-up" data-aos="zoom-in">
                <v-layout column>
                  <v-btn class="w100 mb-2" :to="'lk/products'" large round dark color="deep-orange" style="margin: auto" v-if="product.price>0">
                  <i class="fab fa-cc-visa fa-2x mr-2"></i>
                  Купить
                </v-btn>
                <v-btn class="w100 mb-2" :to="'/lk/products'" large round dark color="deep-orange" style="margin: auto" v-else>
                  <i class="fa fa-dumbbell fa-2x mr-2"></i>
                  Регистрация
                </v-btn>
                <v-btn class="w100"  flat :to="'/product/'+product.id"  dark color="white" style="margin: auto">
                  Подробнее
                </v-btn>
                </v-layout>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </div>
    </v-flex>
    <v-flex xs12 class="text-xs-center bg1 mt-0 mb-3 mt-5" style="max-height: 70px">
      <h2 class="h2-s1" data-aos="flip-up">Отзывы <i class="fa fa-comment"></i> </h2>
    </v-flex>
    <v-flex xs12 class="bg1 pa-1" >
      <v-layout row wrap justify-center>
        <feedbacks4/>
        <feedbacks3/>
        <feedbacks2/>
        <feedbacks1/>
      </v-layout>
    </v-flex>
    <v-flex xs12 class="hidden-md-and-up">
      <v-layout row wrap style="z-index: 2">
        <v-flex xs12 pt-0 pb-5 mb-4>
          <v-layout row wrap style="z-index: 2" align-center>
            <v-flex xs12 style="z-index: 3" class="text-justify px-4">
              <br>
              <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center" data-aos="flip-up">Друзья, всем привет!</p>
              <p data-aos="flip-up" data-aos-delay="500">Рада видеть вас на моем сайте! Здесь я буду делиться с вами своим опытом в сфере спорта и фитнеса, чтобы помочь вам стать лучшей версией себя!</p>
              <p data-aos="flip-up" data-aos-delay="800">Надеюсь, что буду вам полезна, и буду очень рада вашим достижениям и успехам!</p>
              <p data-aos="flip-up" data-aos-delay="1100">Я всегда открыта к диалогу, поэтому, если у вас возникнут вопросы, или вы захотите поделиться со мной своими эмоциями, пишите мне, мои контактные данные указаны в разделе «контакты»!</p>
            </v-flex>
          </v-layout>
        </v-flex>
      </v-layout>
    </v-flex>
    <v-flex xs12>
      <div class="end-block">
        <v-layout row wrap style="z-index: 2">
          <v-flex xs12 sm12 md10 offset-md1 py-3>
            <v-layout row wrap style="z-index: 2" align-center>
              <v-flex xs12 sm12 md4 style="z-index: 3" class="text-justify px-4 hidden-sm-and-down">
                <br>
                <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center" data-aos="flip-up">Друзья, всем привет!</p>
                <p data-aos="flip-up" data-aos-delay="500">Рада видеть вас на моем сайте! Здесь я буду делиться с вами своим опытом в сфере спорта и фитнеса, чтобы помочь вам стать лучшей версией себя!</p>
                <p data-aos="flip-up" data-aos-delay="800">Надеюсь, что буду вам полезна, и буду очень рада вашим достижениям и успехам!</p>
                <p data-aos="flip-up" data-aos-delay="1100">Я всегда открыта к диалогу, поэтому, если у вас возникнут вопросы, или вы захотите поделиться со мной своими эмоциями, пишите мне, мои контактные данные указаны в разделе «контакты»!</p>
              </v-flex>
              <v-flex xs12 sm12 md8 style="z-index: 3" class="pa-3 text-xs-center">
                <v-img data-aos="fade-in" class="bottom-photo elevation-24 img-bordered" style="margin:auto" :src="require('../../../static/img/KEY.jpg')" :lazy-src="require('../../../static/img/KEY_lazy.jpg')" max-width="510"></v-img>
              </v-flex>
            </v-layout>
          </v-flex>
        </v-layout>
      </div>
    </v-flex>
  </v-layout>
</template>

<script>
import Feedbacks4 from './Feedback4'
import Feedbacks3 from './Feedback3'
import Feedbacks2 from './Feedback2'
import Feedbacks1 from './Feedback1'
import aosMixin from '../../mixins/aos'
import { mapState } from 'vuex'
export default {
  mixins: [aosMixin],
  components: {
    Feedbacks4,
    Feedbacks3,
    Feedbacks2,
    Feedbacks1
  },
  computed: {
    ...mapState({
      products: state => state.product.products
    })
  },
  data () {
    return {
      partners: [
        {
          id: 2,
          img: require('../../../static/img/partners/VladimirChebaldin.jpg'),
          txt: 'Фотограф<br>Владимир Чебалдин',
          url: 'https://www.instagram.com/v4photo/?hl=ru'
        },
        {
          id: 1,
          img: require('../../../static/img/partners/ifk.jpg'),
          txt: 'Институт физической культуры ТюмГУ',
          url: 'https://www.utmn.ru/ifk/'
        },
        {
          id: 4,
          img: require('../../../static/img/partners/DanilaProhorenko.jpg'),
          txt: 'Видеограф<br>Данила Прохоренко',
          url: 'https://www.instagram.com/danila.pr/?hl=ru'
        },
        {
          id: 3,
          img: require('../../../static/img/partners/VladimirOgnev.jpg'),
          txt: 'Видеограф<br>Владимир Огнев',
          url: 'https://www.instagram.com/vladimirogniov/?hl=ru'
        },
        {
          id: 5,
          img: require('../../../static/img/partners/AnastasiaBadarina.jpg'),
          txt: 'Дизайнер<br>Анастасия Бударина',
          url: 'https://www.instagram.com/stasiabu/?hl=ru'
        },
        {
          id: 6,
          img: require('../../../static/img/partners/ZamirYusupov.jpg'),
          txt: 'Программист<br>Замир Юсупов',
          url: 'https://yusupovz.ru/'
        },
        {
          id: 7,
          img: require('../../../static/img/partners/sport72.jpg'),
          txt: 'СПОРТ 72',
          url: 'http://sport-72.ru/'
        }
      ],
      items: [
        {
          src: require('../../../static/img/mslider/ms1.jpg'),
          lazy: require('../../../static/img/mslider/ms1_lazy.jpg'),
          text: 'В здоровом теле - здоровый дух!',
          author: 'Фотограф Владимир Чебалдин'
        },
        {
          src: require('../../../static/img/mslider/ms2.jpg'),
          lazy: require('../../../static/img/mslider/ms2_lazy.jpg'),
          text: 'Лучшая одежда это хорошая физическая форма!',
          author: 'Фотограф Артём Гвоздулин'
        },
        {
          src: require('../../../static/img/mslider/ms3.jpg'),
          lazy: require('../../../static/img/mslider/ms3_lazy.jpg'),
          text: 'Важно найти свой тип нагрузки. <br> Тогда тренироваться будет легко и в кайф!',
          author: 'Фотограф Владимир Чебалдин'
        },
        {
          src: require('@/../static/img/mslider/ms4.jpg'),
          lazy: require('@/../static/img/mslider/ms4_lazy.jpg'),
          text: 'Движение это жизнь!',
          author: 'Фотограф Артём Гвоздулин'
        }
      ]
    }
  },
  methods: {
    randColor (index) {
      switch (index) {
        case 0: return 'green accent-4'
        case 1: return 'teal darken-1'
        case 2: return 'blue darken-2'
      }
    }
  }
}
</script>
