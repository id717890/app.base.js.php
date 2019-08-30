<template>
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
      <!-- <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/XkAJUvX2UZ8?modestbranding=1;controls=2;showinfo=0;modestbranding=1;rel=0" frameborder="0"  modestbranding="1" allowfullscreen></iframe> -->
      <video-player  class="video-player-box video-intro"
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
          <v-text-field label="ФИО" v-model="form.fio" required :rules="fieldRules"></v-text-field>
          <v-text-field label="Возраст" type="number" v-model="form.age" required :rules="fieldRules"></v-text-field>
          <v-text-field label="Город" v-model="form.city" required :rules="fieldRules"></v-text-field>
          <v-text-field label="E-mail" v-model="form.email" required :rules="emailRules"></v-text-field>
          <v-text-field label="Телефон" v-model="form.phone" required :rules="fieldRules"></v-text-field>
          <!-- <v-select :items="prices" item-text="text" item-value="value" v-model="selectedPrice" label="Цена"></v-select> -->
          <v-checkbox v-model="form.accept" :rules="acceptRules" label="Даю согласие на хранение и обработку моих персональных данных" required></v-checkbox>
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
</template>

<script>
import authMixin from '../../mixins/auth'
import videoMixin from '../../mixins/videoplayer'
import { mapState, mapActions } from 'vuex'
export default {
  mixins: [authMixin, videoMixin],
  props: ['product'],
  data () {
    return {
      loading: false,
      selectedPrice: 2,
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
          // src: 'https://getfile.dokpub.com/yandex/get/https://yadi.sk/i/U_jexcSCCleBmw'
          // src: 'https://drive.google.com/uc?export=download&confirm=j5PF&id=1xzhouvWc8Uememn_gvdvKTfhkcNWu2ms'
        }],
        poster: '/static/images/author.jpg'
      },
      form: {
        valid: false,
        fio: null,
        age: null,
        city: null,
        email: null,
        phone: null,
        // fio: 'qwe',
        // age: null,
        // city: 'qwe',
        // email: 'qwe@qwe',
        // phone: 'qwe',
        accept: false,
        productId: 1
      },
      fieldRules: [
        v => !!v || 'Поле обязательно для заполнения'
      ],
      acceptRules: [
        v => !!v || 'Для продолжения Вы должны поставить согласие!'
      ],
      emailRules: [
        v => !!v || 'E-mail должен быть заполнен',
        v => /.+@.+/.test(v) || 'Поле должно содержать E-mail'
      ]
    }
  },
  computed: {
    prices () {
      return [
        { text: '2500 руб.', value: 2 },
        { text: '5000 руб.', value: 2.1 }
      ]
    },
    ...mapState({
      yandex: state => state.payment.yandex,
      user: state => state.auth.user
    })
  },
  async created () {
  },
  methods: {
    ...mapActions(['acceptProductWithPrice', 'clearAllMessages']),
    clickToBuy () {
      this.$refs.submitForm.$el.click()
    },
    buy (e) {
      e.preventDefault()
      this.clearAllMessages()
      this.loading = true
      if (this.$refs.form.validate()) {
        this.form.user = this.getUser
        this.form.product = this.form.productId
        this.acceptProductWithPrice(this.form)
          .then(() => this.$refs.form.$el.submit())
      } else this.loading = false
    }
  }
}
</script>

<style>

</style>
