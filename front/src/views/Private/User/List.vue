<template>
  <v-layout justify-center align-start>
    <v-flex xs12 md8 lg6>
      <v-data-table hide-actions :headers="headers" :items="users" class="elevation-1" :pagination.sync="pagination" item-key="email">
        <template v-slot:headers="props">
          <tr>
            <th :width="header.width"  v-for="header in props.headers" :key="header.text"  :class="['column sortable', header.class, pagination.descending ? 'desc': 'asc', header.value === pagination.sortBy ? 'active' : '']" @click="changeSort(header.value, header.sortable)">
              <!-- <v-icon>arrow</v-icon> -->
              <fai icon="caret-down" v-if="header.sortable"/>
              {{header.text}}
              <v-btn icon flat v-if="header.value === 'button'" :to="{ name: 'CreateUser' }"><fai icon="plus" size="2x"/></v-btn>
            </th>
            <!-- <th class="column sortable text-xs-left">{{props.headers[0].text}}</th> -->
          </tr>
        </template>
        <template v-slot:items="props">
          <tr>
            <td>{{props.index + 1}}</td>
            <td>{{props.item.shortName}}</td>
            <td>{{props.item.email}}</td>
            <td>{{props.item.isActive}}</td>
            <td>
              <v-btn icon flat color="green darken-4" :to="{ name: 'EditUser', params: { id: props.item.id } }">
                <fai icon="pencil-alt"/>
              </v-btn>
            </td>
          </tr>
        </template>
      </v-data-table>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapState, mapActions } from 'vuex'
export default {
  data () {
    return {
      headers: [
        { text: '#', sortable: true, value: 'id', width: 70, align: 'left', class: 'text-xs-left' },
        { text: 'Short Name', sortable: true, value: 'shortName', class: 'text-xs-left' },
        { text: 'E-mail', sortable: true, value: 'email', align: 'left', class: 'text-xs-left' },
        { text: 'Active', sortable: true, value: 'isActive', align: 'left', class: 'text-xs-left' },
        { text: '', sortable: false, value: 'button', width: 70, align: 'left', class: 'text-xs-left' }
      ],
      items: [
        { id: 1, email: 'qwe1' },
        { id: 2, email: 'qwe2' },
        { id: 3, email: 'qwe3' }
      ],
      pagination: {
        sortBy: ''
      }
    }
  },
  computed: {
    ...mapState({
      'users': state => state.user.allUsers
    })
  },
  methods: {
    ...mapActions(['getAllUsers']),
    changeSort (column, sortable) {
      if (sortable === false) return
      if (this.pagination.sortBy === column) {
        this.pagination.descending = !this.pagination.descending
      } else {
        this.pagination.sortBy = column
        this.pagination.descending = false
      }
    }
  },
  async created () {
    this.getAllUsers()
  }
}
</script>

<style>
.v-datatable thead th.column.sortable.active.desc .svg-inline--fa {
    -webkit-transform: rotate(-180deg);
    transform: rotate(-180deg);
    transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}

.v-datatable thead th.column.sortable.active.asc .svg-inline--fa {
    -webkit-transform: rotate(-0deg);
    transform: rotate(0deg);
    transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}
</style>
