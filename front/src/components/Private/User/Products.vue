<template>
  <v-layout row>
    <v-flex xs12>
      <v-tabs show-arrows
        centered
        color="light-blue"
        dark
        icons-and-text
        >
        <v-tabs-slider color="yellow"></v-tabs-slider>
        <v-tab style="max-width: none"  v-for="product in products" :key="product.product.id" :href="'#prod'+product.product.id">
          {{product.product.name}}
          <i :class="product.product.icon"></i>
        </v-tab>
        <v-tab-item
          v-for="product in products"
          :key="product.product.id"
          :value="'prod' + product.product.id"
        >
          <v-card flat>
            <v-card-text>
                <v-layout row wrap>
                  <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3>
                    <v-img :src="require('../../../../static/img/' + product.product.photo)"></v-img>
                  </v-flex>
                  <v-flex xs12 sm10 offset-sm1 md6 offset-md3>
                    {{product.product.description}}
                  </v-flex>
                </v-layout>
            </v-card-text>
            <v-card-text v-if="product.days !== null">
              <v-layout row wrap>
                  <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3>
                    <v-expansion-panel expand>
                      <v-expansion-panel-content
                        v-for="(day,i) in product.days"
                        :key="i"
                      >
                        <template v-slot:header>
                          <div>{{day.title}}</div>
                        </template>
                        <v-card class="light-blue lighten-4">
                          <v-card-text>{{day.description}}</v-card-text>
                        </v-card>
                      </v-expansion-panel-content>
                    </v-expansion-panel>
                  </v-flex>
              </v-layout>
            </v-card-text>
            <v-card-text v-else>
              <v-layout>
                <v-flex xs12 sm10 offset-sm1 md8 offset-md2 lg6 offset-lg3 text-xs-center>
                  <form target="_blank" method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
                    <!--Номер кошелька в системе Яндекс Денег-->
                    <input type="hidden" name="receiver" :value="yandex.receiver">
                    <!--Название платежа, я не нашел, где этот параметр используется, поэтому просто указал адрес своего сайта (длина 50 символов)-->
                    <input type="hidden" name="formcomment" :value="'Оплата программы ' + product.product.name">
                    <!--Этот параметр передаёт ID плагина, для того, чтобы скрипту было понятно, что потом отсылать пользователю (длина 64 символа)-->
                    <input type="hidden" name="label" :value="'['+user+']['+product.product.id+']'">
                    <!--Тип формы, может принимать значения shop (универсальное), donate (благотворительная), small (кнопка)-->
                    <input type="hidden" name="quickpay-form" :value="yandex.quickpayForm">
                    <!--Назначение платежа, это покупатель видит на сайте Яндекс Денег при вводе платежного пароля (длина 150 символов)-->
                    <input type="hidden" name="targets" :value="'Оплата программы ' + product.product.name">
                    <!--Сумма платежа, валюта - рубли по умолчанию-->
                    <input type="hidden" name="sum" :value="product.product.price" data-type="number">
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
                    <v-btn large dark color="red darken-3" style="margin: auto" :type="'submit'">
                      <i class="fa fa-shopping-cart fa-2x mr-2"></i>
                      Купить программу {{Number(product.product.price)}}
                      <i class="fa fa-ruble-sign mr-2"></i>
                    </v-btn>

                    <!-- <button :disabled="!validCount"  class="btn btn-primary w-100"><fai icon="donate" /> Donate</button> -->
                  </form>
                </v-flex>
              </v-layout>
            </v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapState, mapActions } from 'vuex'
export default {
  mounted () {
    // if (this.gift !== undefined && this.gift !== null) {
    //   this.payData.formcomment = 'Donat на получения ключа(ей) подарка №' + this.gift.idRow
    //   this.payData.label = '[' + this.getUser + '][' + this.gift.idRow + ']'
    //   this.payData.targets = 'Donate для получения ключа(ей) подарка ' + this.gift.giftName
    // }
  },
  data () {
    return {
      payData: {
        formcomment: '',
        label: '',
        targets: '',
        paymentType: 'AC'
      }
    }
  },
  computed: {
    ...mapState({
      products: state => state.product.productsOfUser,
      yandex: state => state.payment.yandex,
      user: state => state.auth.user
    })
  },
  async created () {
    this.getAllProductsForUser()
  },
  methods: {
    ...mapActions(['getAllProductsForUser'])
  }
}
</script>

<style>

</style>
