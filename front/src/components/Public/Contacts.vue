<template>
  <v-layout row wrap justify-center  style="background: #f2f2f2">
    <v-flex xs12 class="bg3 text-xs-center">
        <!-- <h2 class="h2-s1"><i class="fa fa-phone mr-3"></i>Звоните, спрашивайте, уточняйте</h2>
        <h2 class="h2-s1">+7 987 654 3210</h2> -->
      <v-layout row wrap justify-center>
        <v-flex xs12 sm10 md8>
          <v-layout row wrap>
            <v-flex xs12 class="pa-5">
          <!-- <h3 class="h2-s1" style="font-size: 2rem">Часы работы</h3> -->
          <p style="font-size: 1.4rem">Друзья, если у вас возникли ко мне вопросы по поводу фитнес-программ, тренировок или сотрудничества, свяжитесь со мной по почте или в любой социальной сети. Я отвечу оперативно.</p>
        </v-flex>
        <v-flex xs12 class="px-5">
          <!-- <h3 class="h2-s1" style="font-size: 2rem">Свяжитесь с нами</h3> -->
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
                    :src="require('../../../static/img/gmail-logo.png')"
                  >
                    <v-expand-transition>
                      <a v-if="hover" href="mailto:EvgeniaKabanovaSport@gmail.com" _taget="blank" style="height: 100%;" class="d-flex transition-fast-in-fast-out red accent-4 v-card--reveal display-3 white--text"></a>
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
                    :src="require('../../../static/img/instagram-logo.png')"
                  >
                    <v-expand-transition>
                      <a v-if="hover" href="https://www.instagram.com/evgenia_kabanova/?hl=ru" _taget="blank" style="height: 100%;" class="d-flex transition-fast-in-fast-out red darken-1 v-card--reveal display-3 white--text"></a>
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
                      <a v-if="hover" href="https://vk.com/evgenia_kabanova" _taget="blank" style="height: 100%;" class="d-flex transition-fast-in-fast-out light-blue  v-card--reveal display-3 white--text"></a>
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
                      <a v-if="hover" href="https://www.facebook.com/evgeniya.kabanova.3" _taget="blank" style="height: 100%;" class="d-flex transition-fast-in-fast-out blue darken-4 v-card--reveal display-3 white--text"></a>
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
                    :src="require('../../../static/img/youtube-logo.png')"
                  >
                    <v-expand-transition>
                      <a v-if="hover" href="https://www.youtube.com/channel/UCKcpqrRCQ_BaZWNTom6E39g?view_as=subscriber" _taget="blank" style="height: 100%;" class="d-flex transition-fast-in-fast-out orange darken-2 v-card--reveal display-3 white--text"></a>
                    </v-expand-transition>
                  </v-img>
                </v-card>
              </v-hover>
            </v-flex>
          </v-layout>
        </v-flex>
          </v-layout>
        </v-flex>
      </v-layout>
    </v-flex>
    <v-flex xs12 lg8>
    </v-flex>
    <!-- <v-flex xs12 pt-5>
      <div style="overflow:hidden;width: 100%;position: relative;">
        <iframe width="100%" height="440" src="https://maps.google.com/maps?width=1500&amp;height=440&amp;hl=en&amp;q=%D0%A2%D0%B0%D0%B9%D0%BC-%D0%BA%D0%B0%D1%84%D0%B5%20%D0%9A%D0%B2%D0%B0%D0%B4%D1%80%D0%B0%D1%82+(%D0%9D%D0%B0%D0%B7%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
      <div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
        <small style="line-height: 1.8;font-size: 2px;background: #fff;">
          Powered by
          <a href="https://embedgooglemaps.com/fr/">embedgooglemaps FR</a>
          <a href="https://iamsterdamcard.it">iamsterdam card.it</a>
        </small>
      </div>
      </div><br />
    </v-flex> -->
  </v-layout>
</template>

<script>
export default {

}
</script>

<style>

</style>
