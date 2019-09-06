// import context from '../../api/product'
// import Vue from 'vue'
// import * as types from '../mutation-types'

/* eslint-disable */
const state = {
  loadedTrainings: null,
  listOfTrainings: [
    {
        'id': 1, 'title': 'Разминка', 'icon': 'fa fa-burn', 'color': 'red',
        'url_viedo': '',
        'url_file': null,
        'yadisk': 'https://drive.google.com/file/d/1Sexh6s6uXi1J23lsoCQcYX1WWDtGlmlX/preview'
    },
    {
        'id': 2, 'title': 'Тренировка №1', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/cfvupim668i1brr/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%201.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1uwjaalfdXK-B3yrIA29eBlRLiFxrEPcN/preview'
    },
    {
        'id': 3, 'title': 'Тренировка №2', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/yfcei4nfzr2scdw/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%202.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1lVgOpuMw8EMIpT9LZWghteBrRvpynzne/preview'
    },
    {
        'id': 4, 'title': 'Тренировка №3', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/pfwxj79eguqksrw/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%203.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1G46u3lWvKZW_FdG32gJXPIRr81-p6WTw/preview'
    },
    {
        'id': 5, 'title': 'Тренировка №4', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/eijhe2upat3ox54/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%204.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1C4hm02gJeUQg_3R7O5uksigLBXxmUvCN/preview'
    },
    {
        'id': 6, 'title': 'Тренировка №5', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/1pbn3pxk1jwadjz/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%205.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1b1T2hlU-BT7GXI3klaJJr7c_fPwghefB/preview'
    },
    {
        'id': 7, 'title': 'Тренировка №6', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/2ntg5u0l7wh4fc2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%206.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1VQn5jxR-BiSa-nfGue_wLX0a1r7jBuWZ/preview'
    },
    {
        'id': 8, 'title': 'Тренировка №7', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/62uafhw2mk6y31s/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%207.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1xhJhtus5engUwbaxHVFwnHXHOIq4b5Aq/preview'
    },
    {
        'id': 9, 'title': 'Тренировка №8', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/aidk747fljs9og5/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%208.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1_00rXc8njHHLskeCvKzXNFLehisRWZGT/preview'
    },
    {
        'id': 10, 'title': 'Тренировка №9', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/w31ssapbrsnias6/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%209.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/17x3YGBNle1fpVnyj45bs06uASik_UA5Y/preview'
    },
    {
        'id': 11, 'title': 'Тренировка №10', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/86zmjlcz1ckbbqg/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2010.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1Y1XDNl9mOB6INtn7YtM9BCrn1-1bqpyw/preview'
    },
    {
        'id': 12, 'title': 'Тренировка №11', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/m7m544xpigwi29f/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2011.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/193ZZuaisnGu68pMSrNVRIoZQwq0e6ctQ/preview'
    },
    {
        'id': 13, 'title': 'Тренировка №12', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/kn0dgosnpilot8a/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2012.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1EQ09_9rXz3qeupHhQAi6iLPgzGkO0GQo/preview'
    },
    {
        'id': 14, 'title': 'Тренировка №13', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/r6rfjtjjm7chg6u/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2013.pdf?dl=1',
        'yadisk': ''
    },
    {
        'id': 15, 'title': 'Тренировка №14', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/gvku8jw1y7bykel/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2014.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1QY-M0FbuI77PabxtQwMJqI05YWcGatk1/preview'
    },
    {
        'id': 16, 'title': 'Тренировка №15', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/ikbgwix40sg45bd/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2015.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1LhnHCjliP0qqjziUn3vEOqO4Xg3v4ADt/preview'
    },
    {
        'id': 17, 'title': 'Тренировки №16-17', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/44lcan1221nbozq/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2016.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1PKw3-JFDeHCJvGxjXwaN_SlvZ3Jv681p/preview'
    },
    {
        'id': 19, 'title': 'Тренировка №18', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/9j3kl0asxihs6ih/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2018.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1JUDkc4hjBL8CEHb0iRjvaC6fvEfAIxDe/preview'},
    {
        'id': 20, 'title': 'Тренировка №19', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/gjst9xn7fxpyy0z/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2019.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1gY8X_5FBalr8gJHYSkbq38GXBhk22O3F/preview'},
    {
        'id': 21, 'title': 'Тренировка №20', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/cbh1ky676x8kipn/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2020.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/19TPOk-91DNhT1Q3baEXKkGquDyiiuSCF/preview'},
    {
        'id': 22, 'title': 'Тренировка №21', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/pn92jn6crrawey2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2021.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1tfim3Hd1xBCf9iI3ITMKBEa9UTyIpThC/preview'},
    {
        'id': 23, 'title': 'Тренировка №22', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/08t1z68ixkdeayl/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2022.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/19iLVsJEaCKx7GYk2Ir5Zn-I0J7fmw3mS/preview'},
    {
        'id': 24, 'title': 'Тренировка №23', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/df6zc32uxr5xmf2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2023.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1vFwINM03B8_rNBzlTv72SX2yAIe8Hg4x/preview'},
    {
        'id': 25, 'title': 'Тренировка №24', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/jhku7qwt12zwsg8/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2024.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1M6Uvnu3OdOBqSAauS1qPtZxcTNnICstf/preview'},
    {
        'id': 26, 'title': 'Тренировка №25', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/ak5pig7gemfopua/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2025.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1aV1DKZfCj5DA6hBZSb5fIzNbD80Ariif/preview'},
    {
        'id': 27, 'title': 'Тренировка №26', 'icon': 'fa fa-running', 'color': 'teal',
        'url_viedo': null,
        'url_file': 'https://www.dropbox.com/s/xtgfxjhll17sooq/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2026.pdf?dl=1',
        'yadisk': 'https://drive.google.com/file/d/1bfERqth-RDMqZGwx3t7FBxk6xAgAVSdr/preview'},
    {
        'id': 28, 'title': 'Раcтяжка', 'icon': 'fa fa-burn', 'color': 'blue',
        'url_viedo': null,
        'url_file': null,
        'yadisk': 'https://drive.google.com/file/d/1do4_wBSDm35oeMYvRDDQNxaEnU-6n1-5/preview'
    }
  ]
}

// actions
const actions = {
  async getTrainingVideo ({ commit }) {

  }
}

// mutations
const mutations = {
}

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
