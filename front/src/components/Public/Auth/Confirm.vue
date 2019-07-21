<template>
  <v-layout row wrap pa-5 justify-center align-center>
    <v-flex xs12 sm10 md6>
      <v-alert
      :value="showSuccess"
      type="success"
    >
      Ваша учетная запись успешно подтверждена. Теперь вы можете авторизоваться!
    </v-alert>
    <v-alert
      :value="showError"
      type="error"
    >
      Ошибка при верификации. Ссылка не действительна
    </v-alert>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
  props: ['code'],
  data () {
    return {
      showSuccess: false,
      showError: false
    }
  },
  async created () {
    this.$store.dispatch('clearAllMessages')
    // let id = this.$route.query.id
    // let code = this.$route.query.code
    // console.log(id)
    // console.log(code)
    // if (id === null || code === null || id === '' || code === '') alert('Некорректная ссылка для восстановления')
    // else {
    //   // this.form.userId = id
    //   // this.form.code = code
    // }
  },
  mounted () {
    this.$store.dispatch('confirmation', this.code)
      .then(() => {
        this.showSuccess = true
      })
      .catch(() => {
        this.showError = true
      })
  }
}
</script>

<style>

</style>
