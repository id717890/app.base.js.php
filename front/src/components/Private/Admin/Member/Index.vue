<template>
  <v-layout row>
    <v-flex xs12>
      <section v-if="members === null">
        <v-progress-circular
          :size="100"
          :width="10"
          color="blue"
          indeterminate
        ></v-progress-circular>
      </section>
      <section v-else>
        <v-card-title class="ma-0 pa-0">
          <v-spacer></v-spacer>
          <v-text-field class="pa-0 pb-3"
            v-model="search"
            append-icon="fa fa-search"
            label="Поиск"
            single-line
            hide-details
          ></v-text-field>
        </v-card-title>
        <v-tabs show-arrows
          centered
          color="light-blue"
          dark
          icons-and-text
          >
          <v-tabs-slider color="yellow"></v-tabs-slider>
          <v-tab style="max-width: none" v-for="product in products" :key="product.id"  :href="'#prod'+product.id">
            {{product.name}}
            <i :class="product.icon"></i>
          </v-tab>
          <v-tab-item v-for="product in products" :key="product.id" :value="'prod'+product.id">
            <v-flex xs12 v-if="product.id === 2">
              <v-data-table
                :headers="headers"
                :items="members.challenge"
                class="elevation-1"
                hide-actions
                :search="search"
              >
                <template v-slot:items="props" >
                  <tr @click="props.expanded = !props.expanded">
                    <td>{{props.index + 1}}</td>
                    <td>{{ props.item.fio }}</td>
                    <td>{{ props.item.phone }}</td>
                    <td>{{ props.item.email }}</td>
                  </tr>
                  <!-- <td><v-img :src="props.item.image"></v-img></td>
                  <td>{{ date(props.item.created_at, 'DD.MM.YYYY')  }}</td>
                  <td>
                    <section>
                      <v-btn class="ma-0" flat title="Удалить" icon color="error" @click="callConfirmDialog2(props.item)"><i class="fa fa-trash-alt"></i></v-btn>
                      <v-btn class="ma-0" flat title="Редактировать" icon color="success" :to="'/dashboard/news/edit/'+props.item.id"><i class="fa fa-pencil-alt"></i></v-btn>
                    </section>
                  </td> -->
                </template>
                <template v-slot:expand="props">
                  <v-card flat class="grey lighten-4">
                    <v-card-text>
                      <p><b>Город:</b> {{props.item.city}}</p>
                      <p><b>Возраст:</b> {{props.item.age}}</p>
                      <p><b>Время регистрации:</b> {{date(props.item.created_at)}}</p>
                    </v-card-text>
                  </v-card>
                </template>
                <template v-slot:no-data>
                    <h4 class="text-xs-center">Нет данных</h4>
                </template>
              </v-data-table>
            </v-flex>
            <v-flex xs12 v-if="product.id === 1">
              <v-data-table
                :headers="headersFlow"
                :items="members.flow"
                class="elevation-1"
                hide-actions
                :search="search"
              >
                <template v-slot:items="props" >
                  <tr @click="props.expanded = !props.expanded">
                    <td>{{ props.index + 1}}</td>
                    <td>{{ props.item.fio }}</td>
                    <td>{{ props.item.phone }}</td>
                    <td>{{ props.item.email }}</td>
                    <td :class="props.item.color + ' white--text'">
                      {{ props.item.price !== null ? Number(props.item.price) : '-'}}
                    </td>
                  </tr>
                </template>
                <template v-slot:expand="props">
                  <v-card flat class="grey lighten-4">
                    <v-card-text>
                      <p><b>Город:</b> {{props.item.city}}</p>
                      <p><b>Возраст:</b> {{props.item.age}}</p>
                      <p><b>Время регистрации:</b> {{date(props.item.created_at)}}</p>
                    </v-card-text>
                  </v-card>
                </template>
                <template v-slot:no-data>
                    <h4 class="text-xs-center">Нет данных</h4>
                </template>
              </v-data-table>
            </v-flex>
          </v-tab-item>
        </v-tabs>
      </section>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapActions, mapState } from 'vuex'
import moment from '../../../../packages/moment'
export default {
  data () {
    return {
      search: null,
      products: [
        { id: 1, name: 'Прграмма "Движение"', icon: 'fa fa-paw' },
        { id: 2, name: 'Бесплатный челлендж', icon: 'fa fa-dumbbell' }
      ],
      headers: [
        { text: '#', value: '', width: '70', sortable: false },
        { text: 'ФИО', value: 'fio' },
        { text: 'Телефон', value: 'phone' },
        { text: 'E-mail', value: 'email' }
        // { text: 'Image', value: 'image', sortable: false, width: '150' },
        // { text: 'Created At', value: 'created_at', width: '150' },
      ],
      headersFlow: [
        { text: '#', value: '', width: '70', sortable: false },
        { text: 'ФИО', value: 'fio' },
        { text: 'Телефон', value: 'phone' },
        { text: 'E-mail', value: 'email' },
        { text: 'Цена', value: 'price', width: '120' }
      ]
    }
  },
  computed: {
    ...mapState({
      members: state => state.product.members
    })
  },
  methods: {
    ...mapActions(['getMembers']),
    date (e) {
      return moment.getDateFormat(e, 'DD.MM.YYYY HH:mm:ss')
    }
  },
  async created () {
    this.getMembers()
  }
}
</script>

<style>

</style>
