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
            <!-- <iframe width="100%" height="350" scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX18mWmYtAGhe7pDvkdov3mLbMxwK9O4jlfcgDpAg2ZJbehSXJvKvgnAapQSqax-nyC6IoB_56SqPL8874S7GPwSCDfOAgPR-P6L3LlqZZ44TvZE7NicJQtGJUc1SVSLNDnoClGvhqfEOdHFahJEgmYayyEL1cfVFhOoYG1G92Q2vZ74Ydb4QQJqQTuG4aFbX41tDXCf8s7IXznZllkr_fR8G65IsRWfcrywas06ogN9XSx43BgQSktT3UPAcNre0GGDBLcQMFIFOlWrDJPaqIGXMivhSH16jMZdjIxqYZzhJ7A0lsHlZuyJ6%2F591aafce63758%2F2ede3522aac72b08fe4730f7936de9aeb94e1f0377f259cd548d2e8970f76940%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Fef6fae3339807dee2633a1947bdf9028e9e54915bef47177cce7152a9a895c96%2F5d6da3d8%2FsXquPWtG1xWi1tVde_ZatGd2IrsS4JK2Emnjq6Nc4OBsF5qeeYy0ODtYeoWElCh3SxoGRtf8o_jte_qjJ013oQ%253D%253D%3Fuid%3D0%26filename%3DIntro.mp4%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22e2f124095bdefe1f6a94f895a7a0d0992bcfa1f4bf8e3296aebd934c081dfe64%22%7D&amp;vsid=e2f124095bdefe1f6a94f895a7a0d0992bcfa1f4bf8e3296aebd934c081dfe64"></iframe> -->
            <video-player  class="video-player-box video-intro video-wrapper"
              ref="videoPlayer"
              :options="introOptions"
              :playsinline="true"
              customEventName="customstatechangedeventname"
              >
            </video-player>
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
                  <div><i :class="item.icon+' mr-3 ' + item.color+'--text'"></i>{{item.title}}</div>
                </template>
                <v-card class="grey lighten-4 text-xs-center">
                  <!-- <v-card-text>
                    <div  style="width: 100%; height: 350px; position: relative;">
                      <iframe src="https://drive.google.com/file/d/1UPIbYRUIt3ZVnePMA7htJxr3Xmb0IItG/preview" allowfullscreen=""   width="100%" height="350" frameborder="0" scrolling="no" seamless=""></iframe>
                      <div style="width: 80px; height: 80px; position: absolute; opacity: 0; right: 0px; top: 0px;">&nbsp;</div>
                  </div>
                  </v-card-text> -->
                  <v-card-text>
                    <div v-if="item.yadisk" v-html="item.yadisk"></div>
      <!-- <iframe width="100%" height="350" src="https://www.youtube-nocookie.com/embed/XkAJUvX2UZ8?modestbranding=1;controls=2;showinfo=0;modestbranding=1;rel=0;autohide=1" frameborder="0"  modestbranding="1" allowfullscreen></iframe> -->
                    <!-- <video-player v-if="item.url_video !== ''"  class="video-player-box video-intro video-wrapper"
                      :options="videoOption(item.url_video)"
                      :playsinline="true"
                      >
                    </video-player>-->
                    <h2 v-else>Здесь будет видео</h2>
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
import { mapState, mapActions } from 'vuex'
export default {
  props: ['product'],
  mixins: [authMixin, videoMixin],
  data () {
    return {
      trains: [
        {
          id: 1,
          title: 'Разминка',
          url_video: '',
          url_file: '',
          icon: 'fa fa-burn',
          color: 'red'
        },
        {
          id: 2,
          title: 'Тренировка №1',
          url_file: 'https://getfile.dokpub.com/yandex/get/https://yadi.sk/i/pFDgx8ZqYdponw',
          // url_file: 'https://www.dropbox.com/s/okqp5bvvnh5v3uq/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%201.pdf?dl=1',
          icon: 'fa fa-running',
          color: 'teal',
          yadisk: '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1-g5W-ECZp2eaPH42IqPh6FOZieVmaJPccm2RsoWwFGNjGLMxjlyxRFNh4qfagWp9KPo2-gLELzoNJfReXS5RJfaXm6lAgBkaQ5czkPmw2bz59WU4Y6pmSk3TjmHnyuRPOoQBtXg5ki3G_g0xeyktike7S9lv8mHkWnny5WEMBbKG1wivXL4HiU3WksMF6CjpqOaxu29ES9YEZSPYr-B9THqgWczSrzd1JHBBPzlBr9APp5Yh-euETsfR3Pi7VhAmas7K4kQgQ8-1bOA4bDtS2FtILhbLHyhuk6j4ljrU7xUxTnANeafqJf%2F591ab0bb6b640%2Fb1330be4bd06dfc113c27627cab4f9e8b3b145f45367115c01bda220158d4d2e%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Fe62260644846961227f2b3d8c5c48d547f2bd9d0bd80f58c5b12b2260f7a3379%2F5d6da4d1%2F_fR2-3nKsNtzK-BeBJg5nAEpNwyPMrnYI3dlK95FaPHw4a3ytAma-wjgm-pwCKoWLdTDKiav10S9DN5Q7InZ9Q%253D%253D%3Fuid%3D0%26filename%3Dtren1.mp4%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22693bbcbf9d23a8eb8f2101e97b1e63abafff56926935510ec9d6600001ed7e98%22%7D&amp;vsid=693bbcbf9d23a8eb8f2101e97b1e63abafff56926935510ec9d6600001ed7e98"></iframe>'
        },
        { id: 3, title: 'Тренировка №2', url_video: '', url_file: 'https://www.dropbox.com/s/1ql0hlqqgnudsel/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%202.pdf?dl=1', icon: 'fa fa-running', color: 'teal' },
        { id: 4, title: 'Тренировка №3', url_video: '', url_file: 'https://www.dropbox.com/s/pnxza7wojrvlggp/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%203.pdf?dl=1', icon: 'fa fa-running', color: 'teal' },
        { id: 5, title: 'Тренировка №3', url_video: '', url_file: 'https://www.dropbox.com/s/pnxza7wojrvlggp/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%203.pdf?dl=1', icon: 'fa fa-running', color: 'teal' },
        { id: 6, title: 'Тренировка №3', url_video: '', url_file: 'https://www.dropbox.com/s/pnxza7wojrvlggp/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%203.pdf?dl=1', icon: 'fa fa-running', color: 'teal' },
        { id: 7, title: 'Тренировка №3', url_video: '', url_file: 'https://www.dropbox.com/s/pnxza7wojrvlggp/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%203.pdf?dl=1', icon: 'fa fa-running', color: 'teal' },
        { id: 8, title: 'Тренировка №3', url_video: '', url_file: 'https://www.dropbox.com/s/pnxza7wojrvlggp/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%203.pdf?dl=1', icon: 'fa fa-running', color: 'teal' },
        { id: 9, title: 'Тренировка №3', url_video: '', url_file: 'https://www.dropbox.com/s/pnxza7wojrvlggp/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%203.pdf?dl=1', icon: 'fa fa-running', color: 'teal' },
        { id: 10, title: 'Тренировка №3', url_video: '', url_file: 'https://www.dropbox.com/s/pnxza7wojrvlggp/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%203.pdf?dl=1', icon: 'fa fa-running', color: 'teal' },
        { id: 32, title: 'Разтяжка', url_video: '', url_file: '', icon: 'fa fa-burn', color: 'blue' }
      ],
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
      trainings: state => state.product.paid_content
    })
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
