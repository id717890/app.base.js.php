<template>
  <v-layout row wrap v-if="product !== null && product !== undefined && product !== 'undefined'">
    <v-flex xs12 pa-0 ma-0 v-if="product.days">
      <v-flex xs12 sm10 offset-sm1 md8 offset-md2>
        <v-layout row wrap>
          <v-flex xs12 sm12 md10 offset-md1 lg8 offset-lg2 text-xs-center>
            <h1>Фитнес-программа «ДВИЖЕНИЕ»<br>с элементами FLOW</h1>
            <p>Старт 1 октября 2019</p>
            <br>
          </v-flex>
          <v-flex xs12 sm12 md10 offset-md1 lg8 offset-lg2 text-xs-center mt-4>
            <div class="video-wrapper">
              <iframe src="https://drive.google.com/file/d/163CTVp4_ibMPMW6zN8t0yHqLQ3fmh_eK/preview" width="100%" height="100%"></iframe>
              <div class="hidedrive">&nbsp;</div>
            </div>
          </v-flex>
          <v-flex xs12 sm12 md10 offset-md1 lg8 offset-lg2>
            <h3 class="mt-4">Что включено в программу:</h3>
            <ul class="ma-0">
              <li>Разминка + растяжка</li>
              <li>18 функциональных тренировок + flow в конце каждой тренировки</li>
              <li>8 тренировок на мобильность</li>
            </ul>

            <h3 class="">Что нужно для участия:</h3>
            <ul class="">
              <li>30 минут свободного времени в день</li>
              <li>Небольшое пространство, коврик</li>
              <li>Удобная спортивная форма</li>
              <li>Базовая физическая подготовка</li>
              <li>Желание работать над собой и стать лучшей версией себя</li>
            </ul>

            <h3 class="">Рекомендации по выполнению тренировок:</h3>
            <ol class="">
              <li>Начинайте каждую тренировку с разминки. Это снизит риск получения травмы</li>
              <li>Выполняйте тренировки исключительно по порядку, так как в каждой тренировке идет прогрессия по отношению к предыдущей</li>
              <li>
                Программа «ДВИЖЕНИЕ» состоит из 30 дней. Каждая неделя соответствует следующему циклу работы:
                <ul>
                  <li>День 1: круговая тренировка + flow (начинающие)</li>
                  <li>День 2: круговая тренировка + flow (продвинутые)</li>
                  <li>День 3: восстановительная тренировка (мобильность/баланс/стретчинг)</li>
                  <li>День 4: круговая тренировка + flow (начинающие)</li>
                  <li>День 5: круговая тренировка + flow (продвинутые)</li>
                  <li>День 6: восстановительная тренировка (мобильность/баланс/стретчинг)</li>
                  <li>День 7: выходной</li>
                </ul>
              </li>
              <li>После каждой круговой тренировки выполняйте растяжку 5-10 минут</li>
              <li>Выкладывайте свои flow в соц. сети с хештегом #movementislife</li>
            </ol>
            <v-alert :value="true" color="error" icon="fa fa-exclamation-triangle" outline class="mt-5 mb-2">
              <p>Внимание! Если у Вас не воспроизводится видео или долго идет загрузка, нужно очистить файлы cookie и кэш браузера, затем перезагрузить страницу.</p>
              <p>Инструкции для очистки cookie и кэша Вашего браузера:</p>
              <ul>
                <li ><a class="red--text" href="https://support.google.com/accounts/answer/32050?co=GENIE.Platform%3DDesktop&hl=ru&oco=1" target="_blank">Google Chrome</a></li>
                <li ><a class="red--text" href="https://firefox-browsers.ru/udalit-kuki-v-mozilla-firefox.html" target="_blank">Mozilla Firefox</a></li>
                <li ><a class="red--text" href="https://operaru.ru/faq/how-to-clear-cookies-in-opera" target="_blank">Opera</a></li>
                <li ><a class="red--text" href="https://browser.yandex.ru/help/personal-data-protection/cookies.html" target="_blank">Yandex</a></li>
                <li ><a class="red--text" href="https://support.apple.com/ru-ru/HT201265" target="_blank">Safari</a></li>
              </ul>
            </v-alert>
            <!-- <h3 class="">Заполняя следующую форму регистрации, вы даете согласие:</h3>
            <ul class="">
              <li>На обработку своих персональных данных</li>
              <li>На добровольное участие в программе</li>
              <li>Вы несете полную ответственность за свое здоровье во время выполнения программы</li>
            </ul> -->
          </v-flex>
          <v-flex xs12 sm12 md10 offset-md1 py-5 v-if="product !== null && product !== undefined && product !== 'undefined' && product.product !== null && product.product !== undefined && product.product !== 'undefined' && product.days !== null">
            <v-expansion-panel expand v-if="trainings !== null">
              <v-expansion-panel-content v-for="item in trainings" :key="item.id">
                <template v-slot:header>
                  <div @click="clickToHeader(item)"><i :class="item.icon+' mr-3 ' + item.color+'--text'"></i>{{item.title}}</div>
                </template>
                <v-card class="grey lighten-4 text-xs-center">
                  <v-card-text>
                    <v-progress-linear :indeterminate="true" :ref="'myloader' + item.id"></v-progress-linear>
                    <div :ref="'videowrapper_' + item.id"></div>
                    <!-- <h2 v-else>Здесь будет видео</h2> -->
                  </v-card-text>
                  <v-card-text v-if="item.url_file !== null"><a :href="item.url_file"><i class="far fa-file-pdf"></i> Скачать файл "{{item.title}}"</a></v-card-text>
                </v-card>
              </v-expansion-panel-content>
            </v-expansion-panel>
          </v-flex>
        </v-layout>
      </v-flex>
    </v-flex>
    <v-flex xs12 pa-0 ma-0 v-else>
      <v-layout row wrap>
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 text-xs-center>
          <h1>Фитнес-программа «ДВИЖЕНИЕ»<br>с элементами FLOW</h1>
          <p>Старт 1 октября 2019</p>
          <br>
        </v-flex>
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 mb-3>
          <h3 class="ma-0">Цены:</h3>
          <ul class="">
            <li>2500 р.</li>
            <li>5000 р. (разбор ваших видео + онлайн консультации)</li>
          </ul>
        </v-flex>
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 text-xs-center mt-4 v-if="isAuth && product.is_available !== null  && product.is_available !== undefined  && product.is_available !== 'undefined'  && product.is_available === true">
          <v-layout row nowrap justify-center>
          <v-select :items="prices" item-text="text" item-value="value" v-model="selectedPrice" label="Цена"></v-select>
          <v-btn large :disabled="!form.valid" color="red darken-3" dark @click="clickToBuy" :loading="loading">
            <i class="fab fa-cc-visa fa-2x mr-3"></i>
            Купить
          </v-btn>
          </v-layout>
        </v-flex>
        <v-flex  xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 text-xs-center mt-4 v-if="product.is_available === null  || product.is_available === undefined || product.is_available === 'undefined' || product.is_available === false">
          <h3 class="pink--text">Продажа фитнес-программы "ДВИЖЕНИЕ" начнётся в ближайшее время.</h3>
        </v-flex>
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 text-xs-center mt-4>
          <video-player  class="video-player-box video-intro video-wrapper"
            ref="videoPlayer"
            :options="introOptions"
            :playsinline="true"
            customEventName="customstatechangedeventname"
            >
          </video-player>
        </v-flex>
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3>
          <h3 class="mt-4">Что включено в программу:</h3>
          <ul class="ma-0">
            <li>Разминка + растяжка</li>
            <li>18 функциональных тренировок + flow в конце каждой тренировки</li>
            <li>8 тренировок на мобильность</li>
          </ul>

          <h3 class="">Что нужно для участия:</h3>
          <ul class="">
            <li>30 минут свободного времени в день</li>
            <li>Небольшое пространство, коврик</li>
            <li>Удобная спортивная форма</li>
            <li>Базовая физическая подготовка</li>
            <li>Желание работать над собой и стать лучшей версией себя</li>
          </ul>
          <!-- <h3 class="">Заполняя следующую форму регистрации, вы даете согласие:</h3>
          <ul class="">
            <li>На обработку своих персональных данных</li>
            <li>На добровольное участие в программе</li>
            <li>Вы несете полную ответственность за свое здоровье во время выполнения программы</li>
          </ul> -->
        </v-flex>
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 py-5 v-if="product !== null && product !== undefined && product !== 'undefined' && product.product !== null && product.product !== undefined && product.product !== 'undefined'">
          <v-form v-if="product.days === null" lazy-validation v-model="form.valid" ref="form" method="POST" @submit="buy" action="https://money.yandex.ru/quickpay/confirm.xml">
            <v-flex xs12>
              <app-notify></app-notify>
            </v-flex>
            <v-flex xs12>
              <!--Номер кошелька в системе Яндекс Денег-->
              <input type="hidden" name="receiver" :value="yandex.receiver">
              <!--Название платежа, я не нашел, где этот параметр используется, поэтому просто указал адрес своего сайта (длина 50 символов)-->
              <input type="hidden" name="formcomment" :value="'Оплата ' + product.product.name">
              <!--Этот параметр передаёт ID плагина, для того, чтобы скрипту было понятно, что потом отсылать пользователю (длина 64 символа)-->
              <input type="hidden" name="label" :value="user+'@@@'+product.product.id + '@@@'+selectedPrice">
              <!--Тип формы, может принимать значения shop (универсальное), donate (благотворительная), small (кнопка)-->
              <input type="hidden" name="quickpay-form" :value="yandex.quickpayForm">
              <!--Назначение платежа, это покупатель видит на сайте Яндекс Денег при вводе платежного пароля (длина 150 символов)-->
              <input type="hidden" name="targets" :value="'Оплата ' + product.product.name">
              <!--Сумма платежа, валюта - рубли по умолчанию-->
              <input type="hidden" name="sum" :value="selectedPrice" data-type="number">
              <!--Должен ли Яндекс запрашивать ФИО покупателя-->
              <input type="hidden" name="need-fio" :value="yandex.needFio">
              <!--Должен ли Яндекс запрашивать email покупателя-->
              <input type="hidden" name="need-email" :value="yandex.needEmail">
              <!--Должен ли Яндекс запрашивать телефон покупателя-->
              <input type="hidden" name="need-phone" :value="yandex.needPhone">
              <!--Должен ли Яндекс запрашивать адрес покупателя-->
              <input type="hidden" name="need-address" :value="yandex.needAddress">
              <!--Метод оплаты, PC - Яндекс Деньги, AC - банковская карта-->
              <input type="hidden" name="paymentType" :value="payData.paymentType" />
              <!--Куда перенаправлять пользователя после успешной оплаты платежа-->
              <input type="hidden" name="successURL" :value="yandex.successURL">
            </v-flex>
            <v-flex xs12 text-xs-center v-if="product.is_available !== null  && product.is_available !== undefined  && product.is_available !== 'undefined'  && product.is_available === true">
              <section v-if="isAuth">
                <v-layout row nowrap justify-center>
                  <v-select :items="prices" item-text="text" item-value="value" v-model="selectedPrice" label="Цена"></v-select>
                  <v-btn large :disabled="!form.valid" color="red darken-3" dark ref="submitForm" type="submit" :loading="loading">
                    <i class="fab fa-cc-visa fa-2x mr-3"></i>
                    Купить
                  </v-btn>
                </v-layout>
              </section>
              <section v-else>
                <h3 class="red--text mb-4">* Для покупки или регистрации в программе нужно авторизоваться</h3>
              </section>
            </v-flex>
            <v-flex xs12 text-xs-center v-else>
              <h3 class="pink--text">Продажа фитнес-программы "ДВИЖЕНИЕ" начнётся в ближайшее время.</h3>
            </v-flex>
          </v-form>
        </v-flex>
      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>
import authMixin from '../../mixins/auth'
import videoMixin from '../../mixins/videoplayer'
import { mapState, mapActions, mapGetters } from 'vuex'
export default {
  props: ['product'],
  mixins: [authMixin, videoMixin],
  data () {
    return {
      loading: false,
      selectedPrice: null,
      payData: {
        formcomment: '',
        label: '',
        targets: '',
        paymentType: 'AC'
      },
      introOptions: {
        // videojs options
        muted: false,
        height: '308',
        language: 'en',
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [{
          type: 'video/mp4',
          // src: 'https://rocld.com/m9osd'
          src: 'https://www.dropbox.com/s/85s1a6t37u9hdzy/Intro.mp4?dl=1'
        }],
        poster: require('../../../static/img/player/intro.jpg')
      },
      form: {
        valid: true
      }
    }
  },
  computed: {
    ...mapState({
      yandex: state => state.payment.yandex,
      user: state => state.auth.user,
      prices: state => state.product.prices,
      trainings: state => state.training.listOfTrainings
    }),
    ...mapGetters(['getTrainingById'])
  },
  mounted () {
    if (this.prices !== null && this.prices !== undefined && this.prices !== 'undefined') {
      this.selectedPrice = this.prices[0].value
    }
    if (this.product.days !== null) {
      this.getTraining()
    }
  },
  methods: {
    ...mapActions(['getTraining']),
    getTrainingByIdComponent (id) {
      return this.getTrainingById(id)
    },
    clickToHeader (item) {
      let source = this.getTrainingByIdComponent(item.id)
      if (source !== null) {
        if (this.$refs['videowrapper_' + item.id][0].innerHTML === '') {
          setTimeout(() => {
            // console.log(source.googledisk)
            if (source.googledisk !== null) {
              this.$refs['videowrapper_' + item.id][0].innerHTML = `
                <div  class="video-wrapper">
                    <iframe src="` + source.googledisk + `"   width="100%" height="100%" frameborder="0" scrolling="no" seamless="" allowfullscreen="1"></iframe>
                    <div class="hidedrive">&nbsp;</div>
                </div>`
            } else {
              this.$refs['videowrapper_' + item.id][0].innerHTML = `<div  class="video-wrapper">` + source.yadisk + `</div>`
            }
            this.$refs['myloader' + item.id][0].$el.classList.add('d-none')
          }, 1000)
        }
      }
      // console.log(item)
      // console.log(this.$refs['myloader' + item.id][0].$el)
      // console.log(this.$refs['videowrapper_' + item.id])
      // this.$refs['videowrapper_' + item.id][0].innerHTML = 'sdasd'
      // this.$refs['myloader' + item.id][0].$el.classList.add('d-none')
      // this.$refs['loader' + item.id].addClass('is-valid')
    },
    videoOption (url) {
      return {
        muted: false,
        height: '308',
        language: 'en',
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [{
          type: 'video/mp4',
          src: 'videoOption'
        }],
        poster: require('../../../static/img/player/intro.jpg')
      }
    },
    clickToBuy () {
      this.$refs.submitForm.$el.click()
    },
    buy (e) {
      e.preventDefault()
      this.loading = true
      this.$refs.form.$el.submit()
      if (this.$refs.form.validate()) {
        this.$refs.form.$el.submit()
      } else this.loading = false
    }
  }
}
</script>

<style>

</style>
