<template>
  <v-layout row wrap mb-4>
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
      <!-- <video-player  class="video-player-box video-intro video-wrapper"
        ref="videoPlayer"
        :options="introOptions"
        :playsinline="true"
        customEventName="customstatechangedeventname"
        >
      </video-player> -->
      <!-- <iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1-Gm3cK6Zm5Qj7HDepbY0V1jAYG0vzoP2y55jZMuHhtPjjVsC7MpB2gKmO3EcGD5rNDKxqIesX330_ENMc859zWOuKUba-HiEJqc9114SiiMjCjNKsIbCG7pyeL-BJj-s8-pE3rWYTySTiWsSeu39DgO4x8xd7zj895z2OVbZfYFmKi-EbZ71jMzueGyaqZLA2ouYNrZhBOSX9lDkF4KfB5Dn4c6yN5ErSs5d3BYKPGrl1RwqdK4Jdy6Q6PsaJIfVO9gEosd0DRu2qcy5pSUqbex82Ecy99NSf-jPbXmVz7jyrCQz6qeRnG%2F591c9d135db58%2Fa4fc5d943c93c7867c1d9cd26b2241e2251a5bdebd7023ac19261cebfd035522%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F57f5065663baa5f869bcf320d53da8148f852b97bd050042fee8d4996cdce146%2F5d6fa913%2FsXquPWtG1xWi1tVde_ZatGd2IrsS4JK2Emnjq6Nc4OBsF5qeeYy0ODtYeoWElCh3SxoGRtf8o_jte_qjJ013oQ%253D%253D%3Fuid%3D0%26filename%3DIntro.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%222920c015a449b7db0b50ac46d91f40707ca79fb2611db674000b76db71e06212%22%7D&amp;vsid=2920c015a449b7db0b50ac46d91f40707ca79fb2611db674000b76db71e06212"></iframe> -->
      <div  style="width: 100%; height: 300px; position: relative;">
        <iframe src="https://drive.google.com/file/d/1UPIbYRUIt3ZVnePMA7htJxr3Xmb0IItG/preview" width="100%" height="300"></iframe>
        <div class="hidedrive" style="width: 80px; height: 80px; position: absolute; opacity: 1; right: -5px; top: -5px;">&nbsp;</div>
      </div>
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
          // src: 'https://s148man.storage.yandex.net/rdisk/cb0eb44d76be8350df383f53b79ac25ad13b30aca9b6436ecb43721a95ff6dda/5d6d4b5d/lwbbln4jVLFQENHpeeg8w_BYtYdJpwNX1grPFKQ4oaBupOwBrd-WtJdUpF1uRaL2de-nMPDL08wVrgY0okQvXQ==?uid=536727340&filename=Intro.mp4&disposition=attachment&hash=&limit=0&content_type=video%2Fquicktime&owner_uid=536727340&fsize=321722526&hid=3895759b2f029ce4b72b6e130872845b&media_type=video&tknv=v2&etag=f8faf8440f5749242373dd2dc162518f&rtoken=eh5XmPWhncyN&force_default=yes&ycrid=na-0a2af6bb862728a16d63a59474c88e06-downloader7e&ts=59194f333d140&s=f8209a6f064b8f0e85359280e023f0bae13c07054c3dfd980884465b1e795e77&pb=U2FsdGVkX19TRLtDYoP7XHeUC5VCBYFxgTIVPY8F2m6L0fkzoN1o9pD5gAhzVd7drhYjZ5p-FrwYzs1kjHXQzcuZ7aN0Gyo1Z-VHlt5Ib5U'
          src: 'https://www.dropbox.com/s/85s1a6t37u9hdzy/Intro.mp4?dl=1'
          // src: 'https://getfile.dokpub.com/yandex/get/https://yadi.sk/i/U_jexcSCCleBmw'
          // src: 'https://drive.google.com/uc?export=download&confirm=j5PF&id=1xzhouvWc8Uememn_gvdvKTfhkcNWu2ms'
        }],
        poster: require('../../../static/img/player/intro.jpg')
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
    // prices () {
    //   return [
    //     { text: '2500 руб.', value: 2 },
    //     { text: '5000 руб.', value: 2.1 }
    //   ]
    // },
    ...mapState({
      yandex: state => state.payment.yandex,
      user: state => state.auth.user,
      prices: state => state.product.prices
    })
  },
  async created () {
  },
  mounted () {
    if (this.prices !== null && this.prices !== undefined && this.prices !== 'undefined') {
      this.selectedPrice = this.prices[0].value
    }
  },
  methods: {
    ...mapActions(['acceptProductWithPrice', 'clearAllMessages']),
    clickToBuy () {
      this.$refs.submitForm.$el.click()
    },
    buy (e) {
      // console.log(this.selectedPrice)
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
