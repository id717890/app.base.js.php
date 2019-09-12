<template>
  <v-layout row>
    <v-flex xs12>
      <section v-if="feedbacks === null">
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
        <v-flex xs12>
          <app-notify/>
          <v-snackbar
            :absolute = "true"
            color="success"
            v-model="snackbarSuccessSaveFeedback.snackbar"
            :bottom="snackbarSuccessSaveFeedback.y === 'bottom'"
            :left="snackbarSuccessSaveFeedback.x === 'left'"
            :multi-line="snackbarSuccessSaveFeedback.mode === 'multi-line'"
            :right="snackbarSuccessSaveFeedback.x === 'right'"
            :timeout="snackbarSuccessSaveFeedback.timeout"
            :top="snackbarSuccessSaveFeedback.y === 'top'"
            :vertical="snackbarSuccessSaveFeedback.mode === 'vertical'"
          >
            {{ snackbarSuccessSaveFeedback.text }}
            <v-btn
              color="pink"
              flat
              @click="snackbarSuccessSaveFeedback.snackbar = false"
            >
              Close
            </v-btn>
          </v-snackbar>
          <v-data-table
            :headers="headers"
            :items="feedbacks"
            class="elevation-1"
            hide-actions
            :search="search"
            :pagination.sync="pagination"
          >
            <template v-slot:items="props" >
              <tr @click="expandRow(props)">
                <td>{{props.index + 1}}</td>
                <td>{{ props.item.name }}</td>
                <td>{{ props.item.email }}</td>
                <td>
                  <i class="fa fa-2x fa-check-square green--text" v-if="props.item.is_show === 1"></i>
                  <i class="fa fa-2x fa-pause-circle red--text" v-else></i>
                </td>
                <td :title="date(props.item.created_at, 'DD.MM.YYYY HH:mm:ss')">{{ date(props.item.created_at, 'DD.MM.YYYY') }}</td>
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
                <v-form lazy-validation :v-model="true" ref="form">
                 <v-card-text>
                  <v-textarea :rows="2" outline label="Отзыв пользователя:" v-model="text_user_field" :rules="feedbackUserRules"></v-textarea>
                  <v-textarea :rows="2" outline label="Комментарий администратора:" v-model="text_admin_field"></v-textarea>
                  <v-checkbox v-model="is_show_field" label="On/Off"></v-checkbox>
                  <v-btn large class="primary" @click="saveFeedback(props)"><i class="fa fa-save fa-2x mr-2"></i>Сохранить</v-btn>
                </v-card-text>
                </v-form>
              </v-card>
            </template>
            <template v-slot:no-data>
                <h4 class="text-xs-center">Нет данных</h4>
            </template>
          </v-data-table>
        </v-flex>
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
      text_user_field: null,
      text_admin_field: null,
      is_show_field: false,
      snackbarSuccessSaveFeedback: {
        snackbar: false,
        y: 'top',
        x: 'right',
        mode: '',
        timeout: 6000,
        text: 'Успешно сохранено'
      },
      search: null,
      feedbackUserRules: [
        v => !!v || 'Field is required',
        v => (v || '').length <= this.maxLenghtFeedback || `A maximum of ${this.maxLenghtFeedback} characters is allowed`
      ],
      maxLenghtFeedback: 20,
      pagination: {
        sortBy: 'created_at',
        descending: true,
        rowsPerPage: -1
      },
      headers: [
        { text: '#', value: '', width: '70', sortable: false },
        { text: 'Имя', value: 'name' },
        { text: 'E-mail', value: 'email' },
        { text: 'On', value: 'is_show', width: '70' },
        { text: 'Дата', value: 'created_at', width: '70' }
      ]
    }
  },
  computed: {
    ...mapState({
      feedbacks: state => state.feedback.feedbacksOfAdmin
    })
  },
  methods: {
    ...mapActions(['getAdminFeedbacks', 'saveAdminFeedback']),
    expandRow (props) {
      props.expanded = !props.expanded
      this.text_user_field = props.item.text_user
      this.text_admin_field = props.item.text_admin
      this.is_show_field = props.item.is_show
    },
    saveFeedback (props) {
      // let find = this.feedbacks.find(x => x.id === props.item.id)
      // console.log(this.text_user)
      // console.log(this.text_admin)
      // console.log(this.is_show
      // let o = { id: props.item.id, text_user: this.text_user_field, text_admin: this.text_user_field, is_show: this.is_show_field }
      // console.log(o)
      this.saveAdminFeedback({ id: props.item.id, text_user: this.text_user_field, text_admin: this.text_admin_field, is_show: this.is_show_field })
        .then(() => {
          this.snackbarSuccessSaveFeedback.snackbar = true
          props.expanded = !props.expanded
        })
    },
    date (e, format) {
      return moment.getDateFormat(e, format)
    }
  },
  async created () {
    this.getAdminFeedbacks()
  }
}
</script>

<style>

</style>
