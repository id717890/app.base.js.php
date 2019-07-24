<template>
<v-layout column fill-height>
  <v-flex xs12>
    <v-img :src="require('../../../static/img/about/about.jpg')" :lazy-src="require('../../../static/img/about/about_lazy.jpg')"></v-img>
    <!-- <div class="about-top-img-wrapper">
      <h2>Обо мне</h2>
    </div> -->
  </v-flex>
  <v-flex xs12>
    <v-layout justify-center align-center row>
      <v-flex xs12 sm10 md7 pa-5 class="text-justify">
        <!-- <h1>Алоха, дружочки!</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        <p><img :src="require('../../../static/img/key_003_10.jpg')" alt="" class="img-bordered elevation-10" width="300px" style="float: left; margin: 0 10px 10px 0">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum earum quidem voluptatibus perspiciatis, alias optio perferendis iste tempore! </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum earum quidem voluptatibus perspiciatis, alias optio perferendis iste tempore! Incidunt vel, quis eos inventore exercitationem iusto quae optio doloribus aperiam ipsa.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum earum quidem voluptatibus perspiciatis, alias optio perferendis iste tempore! Incidunt vel, quis eos inventore exercitationem iusto quae optio doloribus aperiam ipsa.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum earum quidem voluptatibus perspiciatis, alias optio perferendis iste tempore! </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum earum quidem voluptatibus perspiciatis, alias optio perferendis iste tempore! Incidunt vel, quis eos inventore exercitationem iusto quae optio doloribus aperiam ipsa.</p>
        <p><img :src="require('../../../static/img/key_004_10.jpg')" alt="" class="img-bordered elevation-10" width="350px" style="float: right; margin: 0 10px 10px 0">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum earum quidem voluptatibus perspiciatis, alias optio perferendis iste tempore! Incidunt vel, quis eos inventore exercitationem iusto quae optio doloribus aperiam ipsa.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto ipsa harum tenetur culpa repudiandae cum corrupti nobis, dolorem, alias praesentium tempore beatae doloribus numquam quae? Repellendus dolor aliquid incidunt doloribus.</p>
        <p class="fa-2x mb-5"><strong>Евгения Кабанова</strong></p> -->
        <p class="strong2">Привет, друзья!</p>
        <p>Добро пожаловать на мой сайт! Меня зовут Евгения Кабанова, я люблю спорт, люблю движение и считаю, что в здоровом теле здоровый дух.</p>
        <img :src="require('../../../static/img/about/about1.jpg')" :lazy-src="require('../../../static/img/about/about1_lazy.jpg')" alt="" class="about-img3 img-bordered elevation-15">
        <p>Я родилась и выросла в г. Урае (Ханты-Мансийский Автономный Округ) и с 5 лет занималась спортивной акробатикой. Я сразу влюбилась в красоту исполнения акробатических элементов и стремилась достичь высшего мастерства с самого детства.</p>
        <p>
          В 14 лет я выполнила мастера спорта, в 16 лет стала мастером спорта международного класса, завоевав серебро на взрослом чемпионате России в г. Астрахань. В 2000 году мы с моей партнершей Файзуллиной Гузель попали в молодежную сборную России и в 2001 году стали абсолютными победительницами Первенства Мира по акробатике, которое проходило в Польше. После окончания Первенства Мира я завершила свою спортивную карьеру и уехала учиться в Тюмень.
        </p>
        <img :src="require('../../../static/img/about/about2.jpg')" :lazy-src="require('../../../static/img/about/about2_lazy.jpg')" alt="" class="about-img4 img-bordered elevation-15">
        <p>В Тюмени я начала заниматься танцами и моим первым коллективом стал ТОДЕС (Тюменская школа-студия), где я протанцевала 5 лет и именно там встретила своих подруг, с которыми мы создали трио «ФОРСАЖ» для коммерческих выступлений. Со временем наш маленький коллектив перерос в большую студию танца.</p>
        <p>В 2009 году на одном из танцевальных мастер-классов я познакомилась с очень талантливой девушкой Екатериной Тимоничевой, у которой тоже был свой танцевальный коллектив под названием STEP UP. Уже через год мы объединились и начали реализовывать амбициозные танцевальные проекты вместе под общим брендом MAFIA. Сейчас MAFIA является сильнейшим танцевальным коллективом Тюмени, который знают далеко за пределами Тюменской области.</p>
        <p>
          <img :src="require('../../../static/img/about/about3.jpg')" :lazy-src="require('../../../static/img/about/about3_lazy.jpg')" alt="" class="about-img1 img-bordered elevation-15">
          В 2019 году я случайно наткнулась на необычное видео в инстаграм, где мужчина исполнял невероятно красивую комбинацию с элементами гимнастики, йоги и капоейры. Меня очень зацепила красота и эстетика исполнения элементов, мне это видео даже чем-то напомнило акробатику, и я очень заинтересовалась и начала искать информацию. Направление фитнеса на этом видео оказалось не мало известным в Европе и США ANIMAL FLOW. Через 2 недели после просмотра этого видео я уже прилетела в Варшаву на обучающий семинар инструкторов 1 уровня, через месяц сдала экзамены и стала первым инструктором ANIMAL FLOW из России. В июле 2019 я прошла второй этап обучения в Мадриде и получила сертификат инструктора ANIMAL FLOW 2 уровня. Планирую активно развивать эту методику в России.</p>
        <p>У меня есть авторская программа тренировок с собственным весом, которую я разработала в 2018 году. Я люблю делиться своим опытом и быть кому-то полезной, поэтому на моем YouTube канале есть очень много тренировок в бесплатном доступе. Я постоянно пополняю свою коллекцию видео и часто получаю положительные отзывы с разных уголков мира от людей, которые тренируются по моей методике, и это потрясающе! Положительные отзывы вдохновляют меня на новые идеи!</p>
        <p>
          <img :src="require('../../../static/img/about/about4.jpg')" :lazy-src="require('../../../static/img/about/about4_lazy.jpg')" alt="" class="about-img2 img-bordered elevation-15">
          Сейчас я работаю над главным для меня проектом – фитнес-программой «ДВИЖЕНИЕ» с элементами FLOW. Эта программа будет включать мои лучшие наработки в сфере фитнеса и поможет людям, которые будут пользоваться этой программой, стать лучшей версией себя, изменить отношение к спорту и изменить свою жизнь! В лучшую сторону, конечно! </p>
        <p>Я увлекаюсь экстремальными видами спорта, очень люблю сноуборд, вейкборд и серфинг! Не раз прыгала с тарзанки, с парашютом, с водопадов высотой 15 метров, в общем, есть у меня хроническая нехватка адреналина Очень люблю путешествовать, мои любимые места: Индонезия, США, Чехия, Австрия, Италия и Швейцария. </p>
        <p>Не люблю красивую одежду, украшения и аксессуары, всегда предпочту потратить деньги на путешествия, приключения или на освоение нового вида спорта. Люблю открытых, позитивных и увлеченных людей, которые горят своим делом и любят жизнь. </p>
        <p>На этом сайте буду делиться своей информацией и энергией с вами! Буду очень рада взаимообмену опытом и общению!</p>
        <p class="text-xs-right"><i><b>С уважением, Евгения Кабанова</b></i></p>
      </v-flex>
    </v-layout>
  </v-flex>
</v-layout>

  <!-- <div>
    <div class="prlx prlxb1">
      <h1>Это всего лишь параллакс</h1>
      <small>Подзаголовок или текст</small>
    </div>
    <div>
      <v-layout justify-center>
        <v-flex xs12 md6>
          <h2 id="-empower-183-explore-183-evolve-">
        <strong>EMPOWER · EXPLORE · EVOLVE</strong>
      </h2>
      <p class style="white-space:pre-wrap;">If I were to describe myself in two words, it would be:</p>
      <blockquote id="movementText" class="blockquoteAbout">Movement Enthusiast.</blockquote>
      <p
        class
        style="white-space:pre-wrap;"
      >Throughout my life I have always maintained an active lifestyle, picking up various sports and hobbies along the way.</p>
      <p class style="white-space:pre-wrap;">
        At the age of three I began taking my first dance lessons and continued dancing into my teens. Some of my favorite pastimes and hobbies are breakdancing, flag football, rollerblading, and cycling. Staying active has always been something that I utilize to combat pain from my scoliosis as well as minor injuries I have acquired over the years.
        <br />
        <br />
      </p>
        </v-flex>
      </v-layout>
    </div>
    <div class="prlx prlxb2">
      <h1>Это всего лишь параллакс</h1>
      <small>Подзаголовок или текст</small>
    </div>
  </div> -->
</template>
