<template>
  <v-layout column>
    <v-flex xs12>
      <div style="overflow:hidden;width: 100%;position: relative;">
        <iframe width="1500" height="440" src="https://maps.google.com/maps?width=1500&amp;height=440&amp;hl=en&amp;q=%D0%A2%D0%B0%D0%B9%D0%BC-%D0%BA%D0%B0%D1%84%D0%B5%20%D0%9A%D0%B2%D0%B0%D0%B4%D1%80%D0%B0%D1%82+(%D0%9D%D0%B0%D0%B7%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
      <div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
        <small style="line-height: 1.8;font-size: 2px;background: #fff;">
          Powered by
          <a href="https://embedgooglemaps.com/fr/">embedgooglemaps FR</a>
          <a href="https://iamsterdamcard.it">iamsterdam card.it</a>
        </small>
      </div>
      </div><br />
    </v-flex>
    <v-flex xs12 mb-5 pb-3>
      <v-layout row wrap justify-center>
        <v-flex class="pa-3" xs12 sm6 md2>
          <v-hover>
            <v-card
              slot-scope="{ hover }"
              class="mx-auto"
              color="grey lighten-4"
            >
              <v-img
                :aspect-ratio="16/16"
                :src="require('../../../static/img/instagram-logo.png')"
              >
                <v-expand-transition>
                  <a v-if="hover" href="https://instagram.com" _taget="blank" style="height: 100%;" class="d-flex transition-fast-in-fast-out red darken-1 v-card--reveal display-3 white--text"></a>
                </v-expand-transition>
              </v-img>
            </v-card>
          </v-hover>
        </v-flex>
        <v-flex class="pa-3" xs12 sm6 md2>
          <v-hover>
            <v-card
              slot-scope="{ hover }"
              class="mx-auto"
              color="grey lighten-4"
            >
              <v-img
                :aspect-ratio="16/16"
                :src="require('../../../static/img/vk-logo.png')"
              >
                <v-expand-transition>
                  <a v-if="hover" href="https://instagram.com" _taget="blank" style="height: 100%;" class="d-flex transition-fast-in-fast-out light-blue  v-card--reveal display-3 white--text"></a>
                </v-expand-transition>
              </v-img>
            </v-card>
          </v-hover>
        </v-flex>
        <v-flex class="pa-3" xs12 sm6 md2>
          <v-hover>
            <v-card
              slot-scope="{ hover }"
              class="mx-auto"
              color="grey lighten-4"
            >
              <v-img
                :aspect-ratio="16/16"
                :src="require('../../../static/img/fb-logo.png')"
              >
                <v-expand-transition>
                  <a v-if="hover" href="https://instagram.com" _taget="blank" style="height: 100%;" class="d-flex transition-fast-in-fast-out blue darken-4 v-card--reveal display-3 white--text"></a>
                </v-expand-transition>
              </v-img>
            </v-card>
          </v-hover>
        </v-flex>
        <v-flex class="pa-3" xs12 sm6 md2>
          <v-hover>
            <v-card
              slot-scope="{ hover }"
              class="mx-auto"
              color="grey lighten-4"
            >
              <v-img
                :aspect-ratio="16/16"
                :src="require('../../../static/img/ok-logo.png')"
              >
                <v-expand-transition>
                  <a v-if="hover" href="https://instagram.com" _taget="blank" style="height: 100%;" class="d-flex transition-fast-in-fast-out orange darken-2 v-card--reveal display-3 white--text"></a>
                </v-expand-transition>
              </v-img>
            </v-card>
          </v-hover>
        </v-flex>
      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>
export default {

}
</script>

<style>

</style>
