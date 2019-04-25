<template>
  <div>
    <v-flex v-if="this.getMessages.length > 0" mb-3>
    <v-alert
      :value="message"
      dismissible
      v-for="(message, index) in this.getMessages"
      :key="index"
      transition="scale-transition"
      type="success">
      {{message}}
    </v-alert>
  </v-flex>
  <v-flex v-if="this.getErrors.length > 0" mb-3>
    <v-alert
      :value="message"
      dismissible
      v-for="(message, index) in this.getErrors"
      :key="index"
      transition="scale-transition"
      type="error">
      {{message}}
    </v-alert>
  </v-flex>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  computed: {
    ...mapGetters(['getMessages', 'getErrors'])
  }
}
</script>
