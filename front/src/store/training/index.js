// import context from '../../api/product'
// import Vue from 'vue'
// import * as types from '../mutation-types'

/* eslint-disable */
const state = {
  loadedTrainings: null,
  listOfTrainings: [{
      'id': 1,
      'title': 'Разминка',
      'icon': 'fa fa-burn',
      'color': 'red',
      'url_viedo': '',
      'url_file': null,
      'googledisk': 'https://drive.google.com/file/d/13oSt_9hTTyi9trswqgclE6pcVTcvwod6/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 2,
      'title': 'Тренировка №1',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/cfvupim668i1brr/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%201.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1jPnLfnu3kmiZ0JBVBDntMOoDHIJiy_y1/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 3,
      'title': 'Тренировка №2',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/yfcei4nfzr2scdw/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%202.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1sEvWGHk9tAYfPXfCohz3lTqVskx5bfjg/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 4,
      'title': 'Тренировка №3',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/pfwxj79eguqksrw/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%203.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/17OIYCcSeRwVIK90BP-5IT0aq8nPEkIb5/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 5,
      'title': 'Тренировка №4',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/eijhe2upat3ox54/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%204.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1bW7vhyF395iWHhDDN4gqHcQVd6oXjpyc/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 6,
      'title': 'Тренировка №5',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/1pbn3pxk1jwadjz/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%205.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1GIfv8CItUvmqlZO1i8VzqrRswwA4AgM9/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 7,
      'title': 'Тренировка №6',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/2ntg5u0l7wh4fc2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%206.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1EXr4aYQd6IhF13GhWux4LylqaIdQcr5L/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 8,
      'title': 'Тренировка №7',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/62uafhw2mk6y31s/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%207.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1xhJhtus5engUwbaxHVFwnHXHOIq4b5Aq/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 9,
      'title': 'Тренировка №8',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/aidk747fljs9og5/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%208.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1_00rXc8njHHLskeCvKzXNFLehisRWZGT/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 10,
      'title': 'Тренировка №9',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/w31ssapbrsnias6/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%209.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/17x3YGBNle1fpVnyj45bs06uASik_UA5Y/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 11,
      'title': 'Тренировка №10',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/86zmjlcz1ckbbqg/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2010.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1Y1XDNl9mOB6INtn7YtM9BCrn1-1bqpyw/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 12,
      'title': 'Тренировка №11',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/m7m544xpigwi29f/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2011.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/193ZZuaisnGu68pMSrNVRIoZQwq0e6ctQ/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 13,
      'title': 'Тренировка №12',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/kn0dgosnpilot8a/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2012.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1EQ09_9rXz3qeupHhQAi6iLPgzGkO0GQo/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 14,
      'title': 'Тренировка №13',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/r6rfjtjjm7chg6u/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2013.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1xX3tInix_LVrJ8SIYXyiTykwAVxQw0Gb/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 15,
      'title': 'Тренировка №14',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/gvku8jw1y7bykel/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2014.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1QY-M0FbuI77PabxtQwMJqI05YWcGatk1/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 16,
      'title': 'Тренировка №15',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/ikbgwix40sg45bd/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2015.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1LhnHCjliP0qqjziUn3vEOqO4Xg3v4ADt/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 17,
      'title': 'Тренировки №16-17',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/44lcan1221nbozq/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2016.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1PKw3-JFDeHCJvGxjXwaN_SlvZ3Jv681p/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 19,
      'title': 'Тренировка №18',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/9j3kl0asxihs6ih/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2018.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1JUDkc4hjBL8CEHb0iRjvaC6fvEfAIxDe/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 20,
      'title': 'Тренировка №19',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/gjst9xn7fxpyy0z/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2019.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1gY8X_5FBalr8gJHYSkbq38GXBhk22O3F/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 21,
      'title': 'Тренировка №20',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/cbh1ky676x8kipn/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2020.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/19TPOk-91DNhT1Q3baEXKkGquDyiiuSCF/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 22,
      'title': 'Тренировка №21',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/pn92jn6crrawey2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2021.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1c4e33vn-5o83yUMrvMNeyFmiW1JEiD8Q/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 23,
      'title': 'Тренировка №22',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/08t1z68ixkdeayl/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2022.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1qJvRxXaQi8-zccYgFHycP0Vtr1WwMhsb/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 24,
      'title': 'Тренировка №23',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/df6zc32uxr5xmf2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2023.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/13F9BdFPUDdqoV_e5IYkKssgCBW2W-xOV/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 25,
      'title': 'Тренировка №24',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/jhku7qwt12zwsg8/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2024.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1tum5v2S1YiqNqZbS_TBvpx3NcPRjv7ix/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 26,
      'title': 'Тренировка №25',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/ak5pig7gemfopua/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2025.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1oN7PDd1u3ZC0Kd98bFi9EZYEJN_sf4aX/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 27,
      'title': 'Тренировка №26',
      'icon': 'fa fa-running',
      'color': 'teal',
      'url_viedo': null,
      'url_file': 'https://www.dropbox.com/s/xtgfxjhll17sooq/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2026.pdf?dl=1',
      'googledisk': 'https://drive.google.com/file/d/1Ezh0ZCRBEClqVHNpnqSR_9sqwF6gjCDb/preview',
      'loading': true,
      'yadisk': null
    },
    {
      'id': 28,
      'title': 'Раcтяжка',
      'icon': 'fa fa-burn',
      'color': 'blue',
      'url_viedo': null,
      'url_file': null,
      // 'googledisk': null,
      'googledisk': 'https://drive.google.com/file/d/1TFkaVxkqeEVnvsWz-iTETuidIqtmV6S5/preview'
      // 'loading': true, 'yadisk': '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 100%; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1_MkDu_-XhV6luJC9PLC-JYlzwhqyFoSq7DAZfHJX9oCqiWRlN9eNdQwma23XwXY2jEykGyQv-hiXLRDt8dSyn9Xf_G_kFrxgIEygBvLIQgSz-bdAw2_gPxuKpKU9pzcjYffjXrSuszF6Oj0nCpExeR7TGpew210mRpbKXhhiZam7as4bVeWG4I2OY8MTVjFXhAf_8WL91n14tzWVsBKkzoqUKO-zOjjaeAxAcOeFzuqIYGAxtV-DP0wWd_mb0L4lNBUphfiADTdzb4BQeTjqbAauUKtNFB6GCd2V59lO6qEOlz0MEiAmC4%2F59249e92b9df8%2F6235e554c738cd1bc3756fbe43479e90b2ce24b362d1c3b12c237022d3a68e69%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F4a9ef8201258925d203a2bb1a412dd6a867a4d122ddd9b0e9a06851405f13bc5%2F5d780e21%2FS_aWmOuuzEMsWEZD-Gx-new5uDkyWJmSMGtkrlijyLVaj1RLn1I5b9pgiz6rp5LfMShnWrzCbISBzh7ONsJvpg%253D%253D%3Fuid%3D0%26filename%3Drastyazka.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22d2642ab6cc4eb66541bd5ded103ccf3845a3031dc2b161f16ba50a651d0761be%22%7D&amp;vsid=d2642ab6cc4eb66541bd5ded103ccf3845a3031dc2b161f16ba50a651d0761be"></iframe>'
    }
  ]
}

// actions
const actions = {}

// mutations
const mutations = {}

// getters
const getters = {
  getTrainingById: state => id => {
    if (state.listOfTrainings) return state.listOfTrainings.find(x => Number(x.id) === Number(id))
    return null
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
