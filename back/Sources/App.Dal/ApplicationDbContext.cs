using System;
using App.Dal.Mapping;
using App.Domain.Interface.Entity;
using Microsoft.AspNetCore.Cryptography.KeyDerivation;
using Microsoft.AspNetCore.Identity;
using Microsoft.AspNetCore.Identity.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore;

namespace App.Dal
{
    public class ApplicationDbContext : IdentityDbContext<ApplicationUser>
    {
        public ApplicationDbContext(DbContextOptions options)
            : base(options)
        {
        }

        public DbSet<Tag> Tags { get; set; }
        public DbSet<TagGroup> TagGroups { get; set; }
        public DbSet<TagGroupItem> TagGroupItemss { get; set; }
        //public DbSet<Customer> Customers { get; set; }
        //public DbSet<GiftDraw> GiftDraws { get; set; }
        //public DbSet<Vote> Votes { get; set; }
        //public DbSet<VoteUser> VoteUsers { get; set; }
        //public DbSet<Order> Orders { get; set; }
        //public DbSet<GiftDrawUser> GiftDrawUsers{ get; set; }
        //public DbSet<GiftDrawUserKey> GiftDrawUserKeys { get; set; }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            base.OnModelCreating(modelBuilder);
            modelBuilder.ApplyConfiguration(new TagMap());
            modelBuilder.ApplyConfiguration(new TagGroupMap());
            modelBuilder.ApplyConfiguration(new TagGroupItemMap());

            //modelBuilder.ApplyConfiguration(new GiftDrawMap());
            //modelBuilder.ApplyConfiguration(new CustomerMap());
            //modelBuilder.ApplyConfiguration(new VoteMap());
            //modelBuilder.ApplyConfiguration(new VoteUserMap());
            //modelBuilder.ApplyConfiguration(new OrderMap());
            //modelBuilder.ApplyConfiguration(new GiftDrawUserMap());
            //modelBuilder.ApplyConfiguration(new GiftDrawUserKeyMap());


            //modelBuilder.Entity<GiftDraw>()
            //    .HasOne<Gift>(s => s.Gift)
            //    .WithMany(g => g.GiftDraws)
            //    .HasForeignKey(s => s.GiftId);

            var roleAdmin = new IdentityRole { Id = Guid.NewGuid().ToString(), Name = "Admin", NormalizedName = "ADMIN" };
            var roleStandart = new IdentityRole { Id = Guid.NewGuid().ToString(), Name = "Client", NormalizedName = "CLIENT" };

            modelBuilder.Entity<IdentityRole>().HasData(roleAdmin, roleStandart);

            // derive a 256-bit subkey (use HMACSHA1 with 10,000 iterations)
            string hashed = Convert.ToBase64String(KeyDerivation.Pbkdf2(
                password: "qweqwe",
                salt: new byte[128 / 8],
                prf: KeyDerivationPrf.HMACSHA1,
                iterationCount: 10000,
                numBytesRequested: 256 / 8));

            PasswordHasher<ApplicationUser> ph = new PasswordHasher<ApplicationUser>();


            var user = new ApplicationUser {
                Id = "1",
                Email = "jusupovz@gmail.com",
                UserName = "jusupovz@gmail.com",
                NormalizedEmail = "JUSUPOVZ@GMAIL.COM",
                NormalizedUserName = "JUSUPOVZ@GMAIL.COM",
                EmailConfirmed = true,
                FirstName = "Zamir",
                LastName = "Yusupov",
                MiddleName = "Almasovich",
            };

            user.PasswordHash = ph.HashPassword(user, "qweqwe");

            modelBuilder.Entity<ApplicationUser>().HasData(user);


            var tagGroup1 = new TagGroup() { Id = 1, Name = "Затопления", UserId = user.Id, Description = "Все затопления УУМН" };
            var tagGroup2 = new TagGroup() { Id = 2, Name = "Group 2", UserId = user.Id, Description = "Tag Group 2" };
            modelBuilder.Entity<TagGroup>().HasData(tagGroup1, tagGroup2);

            var tag1 = new Tag() { Id = 1, Name = "AK.SIBNP.R_Uraj.LU_Berez_Krut.KP_729.Win_1.AlarmSink", Description = "РДП Урай. СГП. ЛУ Березовое-Крутое. 729 км. Затопление колодца К2" };
            var tag2 = new Tag() { Id = 2, Name = "AK.SIBNP.R_Uraj.LU_Berez_Krut.KP_729.Win_2.AlarmSink", Description = "РДП Урай. СГП. ЛУ Березовое-Крутое. 729 км. Затопление колодца К5" };
            var tag3 = new Tag() { Id = 3, Name = "AK.SIBNP.R_Uraj.LU_SHT.KP_24.Win_3.AlarmSink", Description = "РДП Урай ШК ЛУ Шаим2-Конда КП-24 Узел запорной арматуры. Затопление колодца  B24.2/2" };
            modelBuilder.Entity<Tag>().HasData(tag1, tag2);

            var tagGroupItem1 = new TagGroupItem() { Id = 1, TagGroupId = tagGroup1.Id, TagId = tag1.Id };
            var tagGroupItem2 = new TagGroupItem() { Id = 2, TagGroupId = tagGroup1.Id, TagId = tag2.Id };
            modelBuilder.Entity<TagGroupItem>().HasData(tagGroupItem1, tagGroupItem2);

            //var gift1 = new Gift
            //{
            //    Id = 1,
            //    Name = "Apple iPhone X 64 ГБ",
            //    DescriptionFull =
            //    "Смартфон Apple iPhone X – воплощение статуса, надежности и передовых технологий. Большой, 5.8-дюймовый безрамочный экран дарит удивительно четкое и живое изображение (разрешение 2436x1125). Привычный поклонникам бренда интерфейс здесь дополнен такими возможностями, как бесконтактная оплата и зарядка, поддержка максимального количества диапазонов LTE.",
            //    Image = "https://www.re-store.ru/upload/iblock/ea3/ea3a57da3137cf5be1c0b3d1e8999a37.jpg",
            //    ImageLocal = null,
            //    IsDeleted = false
            //};

            //var gift2 = new Gift
            //{
            //    Id = 2,
            //    Name = "Samsung Galaxy Note 8 64 ГБ",
            //    DescriptionFull =
            //    "Смартфон Samsung Galaxy Note 8 64 ГБ – устройство, в котором внимание уделялось всем деталям. Выполнена задняя панель в синем цвете, она придает лаконичный дизайн. Устанавливается стекло Corning Gorilla Glass 5 с двух сторон. Оно не царапается при эксплуатации и обладает увеличенной прочностью. Samsung Galaxy Note 8 64 ГБ поддерживает установку 2 SIM - карт.Если вы используете номера различных операторов, то сможете совместить их в одном устройстве.Экран получил большой размер, диагональ составляет 6.3 дюйма.Но рамки незначительные, особое соотношение сторон 18:9 улучшает взаимодействие со смартфоном.",
            //    Image = "https://cdn.images.express.co.uk/img/dynamic/galleries/x701/260002.jpg",
            //    ImageLocal = null,
            //    IsDeleted = false
            //};

            //var gift3 = new Gift
            //{
            //    Id = 3,
            //    Name = "PlayStation 4 Pro",
            //    DescriptionFull =
            //    "Игровая приставка PlayStation 4 Pro в полной мере оправдывает свое название. В приставке есть все необходимое для комфортного использования любимых игр. Модель использует игровые носители Blu-ray. Также есть поддержка DVD и CD. Приставка поддерживает форматы Full HD и Ultra HD (4K), а также технологию 3D. Вам останется лишь подключить устройство к функциональному телевизионному приемнику. Комплектный геймпад оборудован сенсорной панелью. Приставка PlayStation 4 Pro обладает безупречным быстродействием, которое обеспечивается 2.1 - гигагерцовым процессором AMD Jaguar x86 - 64, 8 ГБ оперативной памяти и графическое ядро AMD Radeon GPU.Объем встроенной памяти достаточен для размещения очень большого количества данных: он равен 1 ТБ.Беспроводные интерфейсы устройства представлены Wi - Fi и Bluetooth.",
            //    Image = "https://brain-images-ssl.cdn.dixons.com/1/7/10153771/l_10153771_001.jpg",
            //    ImageLocal = null,
            //    IsDeleted = false
            //};

            //var gift4 = new Gift
            //{
            //    Id = 4,
            //    Name = "Microsoft Xbox One X",
            //    DescriptionFull =
            //    "Игровая приставка Microsoft Xbox ONE X совместима с играми, разработанными для платформ Xbox 360 и Xbox One. Модель рассчитана на игровые носители Blu-ray. Поддерживаются и носители CD и DVD. Приставка комплектуется беспроводным геймпадом, который отличается значительным радиусом действия. Для вывода изображения используется выход HDMI.",
            //    Image = "https://static.eldorado.ru/photos/71/713/662/67/new_71366267_l_1507895560.jpeg/resize/500x375/",
            //    ImageLocal = null,
            //    IsDeleted = false
            //};

            //var gift5 = new Gift
            //{
            //    Id = 5,
            //    Name = "Apple iPhone 7 128 Гб",
            //    DescriptionFull =
            //    "Смартфон Apple iPhone 7 выполнен в герметичном черном алюминиевом корпусе, защищающем его от брызг, царапин и пыли. При этом смартфон еще и очень тонкий, его габариты: 67.1x138.3x 7.1 миллиметра. У Apple iPhone 7 отличная фронтальная камера в 7 Мп. Это позволяет получать еще более качественные фотографии с отличной степенью резкости, делать великолепного качества панорамные кадры, а также дает широкие возможности при видеосъемке. Снимайте видео в формате Ultra HD 4K, а также ведите замедленную съемку в формате 1080p и 720p.Шестилинзовый объектив и вспышка True Tone Quad - LED гарантируют отличную освещенность и хорошие кадры даже ночью.Мощный 4 - ядерный процессор обеспечит отличное быстродействие системы, легкую загрузку и работу с файлами и приложениями любого объема.Вы можете не ограничивать себя в скачивании информации, видео и снимать столько, сколько вам захочется, 128 ГБ встроенной памяти хватит на все.",
            //    Image =
            //        "https://www.re-store.ru/upload/iblock/fe9/fe9918ce97219b07de7ac1a088e6b3c1.jpg",
            //    ImageLocal = null,
            //    IsDeleted = false
            //};

            //var gift6 = new Gift
            //{
            //    Id = 6,
            //    Name = "Телевизор LED LG 43UK6200",
            //    DescriptionFull = "Телевизор LED LG 43UK6200 поддерживает цифровые тюнеры DVB-T, DVB-T2, DVB-C, DVB-S и DVB-S2.",
            //    Image = null,
            //    ImageLocal = "LED LG 43UK6200 2.jpg",
            //    IsDeleted = false
            //};

            //var gift7 = new Gift
            //{
            //    Id = 7,
            //    Name = "Микроволновая печь LG MH6336GIB",
            //    DescriptionFull = "Микроволновая печь LG MH6336GIB выполнена в стильном матовом корпусе черного цвета.",
            //    Image = null,
            //    ImageLocal = "LG MH6336GIB.jpg",
            //    IsDeleted = false
            //};

            //var gift8 = new Gift
            //{
            //    Id = 8,
            //    Name = "Планшет Samsung GALAXY Tab S2 9.7",
            //    DescriptionFull = "9.7-дюймовый планшет Samsung GALAXY Tab S2 оснащен внушительным запасом встроенной памяти 32 ГБ и беспроводной технологией доступа к мобильной интернет-сети 3G.",
            //    Image = null,
            //    ImageLocal = "Samsung GALAXY Tab S2 32 ГБ 3G, LTE черный.jpg",
            //    IsDeleted = false
            //};

            //var gift9 = new Gift
            //{
            //    Id = 9,
            //    Name = "Стиральная машина Samsung WW60H2200EWD/LP",
            //    DescriptionFull = "Стиральная машина Samsung WW60H2200EWD/LP – модель от компании, которая давно занимается выпуском данной техники.",
            //    Image = null,
            //    ImageLocal = "washmachine Samsung WW60H2200EWDLP.jpg",
            //    IsDeleted = false
            //};

            //var gift10 = new Gift
            //{
            //    Id = 10,
            //    Name = "Пылесос Thomas DryBOX AMFIBIA",
            //    DescriptionFull = "Пылесос Thomas DryBOX AMFIBIA выполнен в корпусе черного цвета с голубыми деталями.",
            //    Image = null,
            //    ImageLocal = "Thomas DryBOX AMFIBIA.jpg",
            //    IsDeleted = false
            //};

            //var gift11 = new Gift
            //{
            //    Id = 11,
            //    Name = "Смартфон Samsung Galaxy A8+ SM-A730F",
            //    DescriptionFull = "Смартфон Samsung Galaxy A8+ SM-A730F сможет поразить своим обширным функционалом и грандиозным техническим оснащением даже самого требовательного и капризного пользователя.",
            //    Image = null,
            //    ImageLocal = "Samsung Galaxy A8+ SM-A730F 32 ГБ черный.jpg",
            //    IsDeleted = false
            //};

            //var gift12 = new Gift
            //{
            //    Id = 12,
            //    Name = "Фитнес-браслет Xiaomi Mi Band 3",
            //    DescriptionFull = "Фитнес-браслет Xiaomi Mi Band 3 - миниатюрное устройство для пользователя, который ведет активный образ жизни. Представленная техника позволит вам отслеживать ваш пульс, количество пройденных шагов, потраченные калории и пройденное расстояние. Модель стала обладательницей универсальным черным корпусом и ремешком. Поддерживается совместимость с операционными платформами Android версии 4.4 и выше, а также iOS версии 9 и выше. Настройка параметров работы и управление браслетом осуществляется со смартфона.",
            //    Image = "https://i5.stat01.com/2/59/100583661/075a3e/remeshok-dlya-fitnes-brasleta-xiaomi-mi-band-2-chernyj.png",
            //    ImageLocal = null,
            //    IsDeleted = false
            //};

            //var gift13 = new Gift
            //{
            //    Id = 13,
            //    Name = "Телевизор LED LG 32LJ500V (81 см)",
            //    DescriptionFull = "Стильный и ультратонкий LED-телевизор LG 32LJ500V представлен в черной расцветке. Прямой экран Direct LED обладает диагональю 32 дюйма и разрешение 1920x1080 при формате 16:9. Используется матрица с качеством изображения 200 PMI и частотой обновления 50 Гц. Предусматривается наличие двух HDMI-портов, трех аудиовходов и одного USB-порта. Допускается надежное крепление на стену при помощи кронштейна 100x100.",
            //    Image = "https://avatars.mds.yandex.net/get-mpic/200316/img_id4405617333422780220/9hq",
            //    ImageLocal = null,
            //    IsDeleted = false
            //};

            //modelBuilder.Entity<Gift>().HasData(gift1, gift2, gift3, gift4, gift5, gift6, gift7, gift8, gift9, gift10, gift11, gift12, gift13);

            //modelBuilder.Entity<GiftDraw>().HasData(
            //    new GiftDraw { GiftId = gift12.Id, Id = 1, Price = 6, PriceKey = 2, IsDeleted = false }, // браслет
            //    //new GiftDraw { GiftId = gift12.Id, Id = 1, Price = 3000, PriceKey = 100, IsDeleted = false }, // браслет
            //    new GiftDraw { GiftId = gift13.Id, Id = 2, Price = 10, PriceKey = 2, IsDeleted = false }, //Телевизор LED
            //    //new GiftDraw { GiftId = gift13.Id, Id = 2, Price = 19000, PriceKey = 100, IsDeleted = false }, //Телевизор LED
            //    new GiftDraw { GiftId = gift1.Id, Id = 3, Price = 10, PriceKey = 2, IsDeleted = false }, //Apple iPhone X 64
            //    //new GiftDraw { GiftId = gift1.Id, Id = 3, Price = 77000, PriceKey = 100, IsDeleted = false }, //Apple iPhone X 64
            //    new GiftDraw { GiftId = gift2.Id, Id = 4, Price = 10, PriceKey = 2, IsDeleted = false }, //"Samsung Galaxy Note 8
            //    //new GiftDraw { GiftId = gift2.Id, Id = 4, Price = 50000, PriceKey = 100, IsDeleted = false }, //"Samsung Galaxy Note 8
            //    new GiftDraw { GiftId = gift3.Id, Id = 5, Price = 12, PriceKey = 2, IsDeleted = false },  //PlayStation 4 Pro
            //    //new GiftDraw { GiftId = gift3.Id, Id = 5, Price = 36000, PriceKey = 100, IsDeleted = false },  //PlayStation 4 Pro
            //    new GiftDraw { GiftId = gift4.Id, Id = 6, Price = 12, PriceKey = 2, IsDeleted = false },  //Microsoft Xbox One X
            //    //new GiftDraw { GiftId = gift4.Id, Id = 6, Price = 39000, PriceKey = 100, IsDeleted = false },  //Microsoft Xbox One X
            //    new GiftDraw { GiftId = gift5.Id, Id = 7, Price = 8, PriceKey = 2, IsDeleted = false }  //Apple iPhone 7
            //    //new GiftDraw { GiftId = gift5.Id, Id = 7, Price = 47000, PriceKey = 100, IsDeleted = false }  //Apple iPhone 7
            //);

            //modelBuilder.Entity<Vote>().HasData(
            //    new Vote { Id = 1, GiftId = 6, IsDeleted = false, Price = 29999 },
            //    new Vote { Id = 2, GiftId = 7, IsDeleted = false, Price = 9999},
            //    new Vote { Id = 3, GiftId = 8, IsDeleted = false, Price = 29499},
            //    new Vote { Id = 4, GiftId = 9, IsDeleted = false, Price = 24499},
            //    new Vote { Id = 5, GiftId = 10, IsDeleted = false, Price = 24999},
            //    new Vote { Id = 6, GiftId = 11, IsDeleted = false, Price = 22999}
            //);
        }
    }
}
