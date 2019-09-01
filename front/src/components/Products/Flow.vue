<template>
  <v-layout row wrap v-if="product !== null && product !== undefined && product !== 'undefined'">
    <v-flex xs12 pa-0 ma-0 v-if="product.days">
      <v-flex xs12 sm10 offset-sm1 md8 offset-md2>
        <v-layout row wrap>
          <v-flex xs12 sm10 offset-sm1 md10 offset-md1 lg8 offset-lg2 text-xs-center>
            <h1>Фитнес-программа «ДВИЖЕНИЕ»<br>с элементами FLOW</h1>
            <p>Старт 1 октября 2019</p>
            <br>
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

            <h3 class="">Заполняя следующую форму регистрации, вы даете согласие:</h3>
            <ul class="">
              <li>На обработку своих персональных данных</li>
              <li>На добровольное участие в программе</li>
              <li>Вы несете полную ответственность за свое здоровье во время выполнения программы</li>
            </ul>
          </v-flex>
          <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 py-5 v-if="product !== null && product !== undefined && product !== 'undefined' && product.product !== null && product.product !== undefined && product.product !== 'undefined' && product.days !== null">
            <v-expansion-panel expand>
              <v-expansion-panel-content>
                <template v-slot:header>
                  <div><i class="fa fa-burn mr-3"></i> Тренировка №1</div>
                </template>
                <v-card class="grey lighten-4">
                  <v-card-text>Видео + файл</v-card-text>
                </v-card>
              </v-expansion-panel-content>
              <v-expansion-panel-content>
                <template v-slot:header>
                  <div><i class="fa fa-burn mr-3 red--text"></i>Тренировка №2</div>
                </template>
                <v-card class="grey lighten-4">
                  <v-card-text>Видео + файл</v-card-text>
                </v-card>
              </v-expansion-panel-content>
              <v-expansion-panel-content>
                <template v-slot:header>
                  <div><i class="fa fa-burn mr-3"></i>Тренировка №3</div>
                </template>
                <v-card class="grey lighten-4">
                  <v-card-text>Видео + файл</v-card-text>
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
        <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 text-xs-center mt-4 v-if="isAuth">
          <v-layout row nowrap justify-center>
          <v-select :items="prices" item-text="text" item-value="value" v-model="selectedPrice" label="Цена"></v-select>
          <v-btn large :disabled="!form.valid" color="red darken-3" dark @click="clickToBuy" :loading="loading">
            <i class="fab fa-cc-visa fa-2x mr-3"></i>
            Купить
          </v-btn>
          </v-layout>
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

          <h3 class="">Заполняя следующую форму регистрации, вы даете согласие:</h3>
          <ul class="">
            <li>На обработку своих персональных данных</li>
            <li>На добровольное участие в программе</li>
            <li>Вы несете полную ответственность за свое здоровье во время выполнения программы</li>
          </ul>
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
            <v-flex xs12 text-xs-center>
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
          </v-form>
        </v-flex>
      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>
import authMixin from '../../mixins/auth'
import videoMixin from '../../mixins/videoplayer'
import { mapState } from 'vuex'
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
      prices: state => state.product.prices
    })
  },
  mounted () {
    if (this.prices !== null && this.prices !== undefined && this.prices !== 'undefined') {
      this.selectedPrice = this.prices[0].value
    }
  },
  methods: {
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
