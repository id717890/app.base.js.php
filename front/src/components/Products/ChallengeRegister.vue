<template>
  <v-layout row wrap>
    <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 text-xs-center>
      <h1>Бесплатный челлендж <br> «БУДЬ В ФОРМЕ» (2 недели)</h1>
      <p>Старт 15 сентября 2019</p>
      <p>(доступ открыт до 18 сентября)</p>
      <br>
      <h3>Регистрация</h3>
      <section v-if="isAuth">
        <v-btn :disabled="!form.valid" large color="primary" @click="registerToProgram" :loading="loading">
        <i class="fa fa-star fa-2x mr-3"></i>
          Зарегистрироваться
        </v-btn>
      </section>
      <section v-else>
        <h3 class="red--text mb-4">* Для покупки или регистрации в программе нужно авторизоваться</h3>
      </section>
    </v-flex>
    <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 class="text-justify">
      <p>
        Бесплатный челлендж «БУДЬ В ФОРМЕ» - это то, что вам нужно, если вы хотите начать регулярно тренироваться и всегда быть в хорошей спортивной форме!
      </p>
      <h3>Что вас ждет:</h3>
      <ul>
        <li>План тренировок на 2 недели (включая 4 выходных)</li>
        <li>Разнообразные и интересные упражнения</li>
        <li>Общий чат участников челленджа, поддержка тренера</li>
        <li>Рекомендации по питанию</li>
        <li>Возможность выиграть бесплатный доступ к программе тренировок «ДВИЖЕНИЕ» с элементами FLOW (программа рассчитана на месяц, старт 1 октября 2019)</li>
      </ul>

      <h3>Что нужно для участия:</h3>
      <ul>
        <li>30 минут свободного времени в день</li>
        <li>Небольшое пространство, коврик</li>
        <li>Удобная спортивная форма</li>
        <li>Базовая физическая подготовка</li>
        <li>Желание работать над собой и делать себя лучше</li>
      </ul>

      <h3>Как проходит челлендж:</h3>
      <ul>
        <li>После регистрации вы получаете доступ к странице челленджа, где вы найдете план тренировок на 2 недели и ссылки на видео</li>
        <li>Каждый день – новая тренировка, рекомендуется делать все тренировки в соответствии с планом</li>
        <li>2 выходных в неделю</li>
        <li>Будем общаться и поддерживать друг друга в общем чате</li>
        <li>В рамках челленджа будет проходить конкурс, победитель которого получит бесплатный доступ к новой программе «ДВИЖЕНИЕ» с элементами FLOW! Эта программа научит вас контролировать свое тело, сделает вас сильнее, гибче, выносливее и полностью изменит ваш подход к тренировкам! Условия конкурса вы найдете на странице челленджа после регистрации.</li>
      </ul>

      <h3>Заполняя следующую форму регистрации, вы даете согласие:</h3>
      <ul>
        <li>На обработку своих персональных данных</li>
        <li>На добровольное участие в челлендже</li>
        <li>Вы несете полную ответственность за свое здоровье во время выполнения программы челленджа</li>
        <li>Будем общаться и поддерживать друг друга в общем чате</li>
      </ul>

      <p>
        <i class="fa fa-exclamation-circle fa-2x" style="color: red"></i> Все материалы данного сайта являются интеллектуальной собственностью и предназначены только для личного пользования. Копирование, тиражирование и коммерческое использование без согласия автора запрещены!
      </p>
    </v-flex>
    <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 py-5>
      <v-form lazy-validation v-model="form.valid" ref="form">
        <v-flex xs12>
          <app-notify></app-notify>
        </v-flex>
        <v-flex xs12>
          <v-text-field label="ФИО" v-model="form.fio" required :rules="fieldRules"></v-text-field>
          <v-text-field label="Возраст" type="number" v-model="form.age" required :rules="fieldRules"></v-text-field>
          <v-text-field label="Город" v-model="form.city" required :rules="fieldRules"></v-text-field>
          <v-text-field label="E-mail" v-model="form.email" required :rules="emailRules"></v-text-field>
          <v-text-field label="Телефон" v-model="form.phone" required :rules="fieldRules"></v-text-field>
          <v-checkbox v-model="form.accept" :rules="acceptRules" label="Даю согласие на хранение и обработку моих персональных данных" required></v-checkbox>
        </v-flex>
        <v-flex xs12 text-xs-center>
          <section v-if="isAuth">
            <v-btn :disabled="!form.valid" large color="primary" @click="registerToProgram" :loading="loading">
            <i class="fa fa-star fa-2x mr-3"></i>
              Зарегистрироваться
            </v-btn>
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
import { mapActions } from 'vuex'
export default {
  mixins: [authMixin],
  data () {
    return {
      loading: false,
      form: {
        valid: true,
        fio: null,
        age: null,
        city: null,
        email: null,
        phone: null,
        accept: null,
        product: 2
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
  methods: {
    ...mapActions(['acceptProduct', 'clearAllMessages']),
    registerToProgram () {
      this.clearAllMessages()
      this.loading = true
      if (this.$refs.form.validate()) {
        this.form.user = this.getUser
        this.acceptProduct(this.form)
      } else this.loading = false
    }
  }
}
</script>

<style>

</style>
