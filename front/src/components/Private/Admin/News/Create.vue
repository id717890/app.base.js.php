<template>
  <v-layout column fill-height>
    <v-flex xs12>
      <v-text-field
            v-model="title"
            :rules="titleRules"
            :counter="100"
            label="Title"
            required
            class="ma-0 pa-0"
          ></v-text-field>
    </v-flex>
    <v-flex xs12>
      <v-text-field class="ma-0 pa-0"
            v-model="image"
            label="Url image"
          ></v-text-field>
    </v-flex>
    <v-flex>
      <v-layout row>
        <v-flex xs12 sm10 md8 lg6 xs5>
          <tteditor @editorChanged="textChanged" :text="null"/>
        </v-flex>
      </v-layout>
    </v-flex>
    <v-flex xs12>
      <v-btn class="primary" large @click="save">
        <i class="fa fa-save fa-2x mr-2"></i>
        Сохранить
      </v-btn>
      <v-btn to="/dashboard/news" class="silver" large>
        <i class="fa fa-times fa-2x mr-2"></i>
        Отмена
      </v-btn>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapActions } from 'vuex'
import TtEditor from '../../../Shared/TipTapEditor'
export default {
  components: {
    'tteditor': TtEditor
  },
  data() {
    return {
      valid: false,
      title: '',
      image: '',
      text: '',
      titleRules: [
        v => !!v || 'Title is required',
        v => v.length <= 100 || 'Title must be less than 100 characters'
      ]
    }
  },
  mounted() {
  },
  methods: {
    textChanged(event) {
      this.text = event
    },
    ...mapActions(['saveNews']),
    save() {
      if (this.text === '' || this.text === null || this.title === '' || this.title === null) {
        alert('Заголовок и текст статьи не должны быть пустыми')
      } else {
        this.saveNews({ 'text': this.text, 'title': this.title, 'image': this.image })
          .then(() => this.$router.push('/dashboard/news'))
          // .catch(() => alert('Ошибка при сохранении'))
          .catch(x => console.log(x))
      }
    }
  }
}
</script>

<style>

</style>
