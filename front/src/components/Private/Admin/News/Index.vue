<template>
  <v-layout row wrap>
    <v-flex xs12 mb-3>
      <v-btn large class="primary" to="/dashboard/news/create">
        <i class="fa fa-plus mr-2"></i>Добавить
      </v-btn>
    </v-flex>
    <v-flex xs12>
      <v-data-table :headers="headers" :items="news" class="elevation-1" :items-per-page="21" hide-actions>
        <template v-slot:items="props">
          <td>{{ props.item.title }}</td>
          <td>
            <v-img :src="props.item.image"></v-img>
          </td>
          <td>{{ date(props.item.created_at, 'DD.MM.YYYY') }}</td>
          <td>
            <section>
              <v-btn class="ma-0" flat title="Удалить" icon color="error" @click="callConfirmDialog2(props.item)">
                <i class="fa fa-trash-alt"></i>
              </v-btn>
              <v-btn class="ma-0" flat title="Редактировать" icon color="success" :to="'/dashboard/news/edit/' + props.item.id">
                <i class="fa fa-pencil-alt"></i>
              </v-btn>
            </section>
          </td>
        </template>
        <template v-slot:no-data>
          <h4 class="text-xs-center">Нет данных</h4>
        </template>
      </v-data-table>
    </v-flex>
  </v-layout>
</template>

<script>
const settings = {
  height: 'auto',
  maxWidth: 400,
  adaptive: true,
  transition: 'nice-modal-fade',
  clickToClose: false
}
// eslint-disable-next-line
import { mapActions, mapState } from 'vuex'
// eslint-disable-next-line
import ConfirmDialogModal from '../../../Dialog/ConfirmDialog'
// eslint-disable-next-line
import moment from '../../../../packages/moment'

export default {
  data() {
    return {
      removedNews: null,
      headers: [
        { text: 'Title', value: 'title' },
        { text: 'Image', value: 'image', sortable: false, width: '150' },
        { text: 'Created At', value: 'created_at', width: '150' },
        { text: '', value: '', width: '120', sortable: false }
      ]
    }
  },
  methods: {
    date(e) {
      return moment.getDateFormat(e, 'DD.MM.YYYY')
    },
    ...mapActions(['resetConfirmDialogResult', 'deleteNews', 'getAllNews']),
    callConfirmDialog2(item) {
      this.removedNews = item
      this.$modal.show(
        ConfirmDialogModal,
        { question: 'Удалить запись?' },
        settings,
        {
          closed: this.confirmDeleteDialog
        }
      )
    },
    confirmDeleteDialog() {
      if (this.confirmDialogResult === true) {
        this.resetConfirmDialogResult()
        this.deleteNews(this.removedNews)
        this.removedNews = null
      }
    }
  },
  async mounted() {
    this.getAllNews()
  },
  computed: {
    ...mapState({
      news: state => state.news.news,
      confirmDialogResult: state => state.dialog.confirmDialogResult
    })
  }
}
</script>

<style></style>
