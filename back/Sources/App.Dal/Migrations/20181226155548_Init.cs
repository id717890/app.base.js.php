using System;
using Microsoft.EntityFrameworkCore.Metadata;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Raffle.Dal.Migrations
{
    public partial class Init : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.CreateTable(
                name: "AspNetRoles",
                columns: table => new
                {
                    Id = table.Column<string>(nullable: false),
                    Name = table.Column<string>(maxLength: 256, nullable: true),
                    NormalizedName = table.Column<string>(maxLength: 256, nullable: true),
                    ConcurrencyStamp = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetRoles", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "AspNetUsers",
                columns: table => new
                {
                    Id = table.Column<string>(nullable: false),
                    UserName = table.Column<string>(maxLength: 256, nullable: true),
                    NormalizedUserName = table.Column<string>(maxLength: 256, nullable: true),
                    Email = table.Column<string>(maxLength: 256, nullable: true),
                    NormalizedEmail = table.Column<string>(maxLength: 256, nullable: true),
                    EmailConfirmed = table.Column<bool>(nullable: false),
                    PasswordHash = table.Column<string>(nullable: true),
                    SecurityStamp = table.Column<string>(nullable: true),
                    ConcurrencyStamp = table.Column<string>(nullable: true),
                    PhoneNumber = table.Column<string>(nullable: true),
                    PhoneNumberConfirmed = table.Column<bool>(nullable: false),
                    TwoFactorEnabled = table.Column<bool>(nullable: false),
                    LockoutEnd = table.Column<DateTimeOffset>(nullable: true),
                    LockoutEnabled = table.Column<bool>(nullable: false),
                    AccessFailedCount = table.Column<int>(nullable: false),
                    FirstName = table.Column<string>(nullable: true),
                    LastName = table.Column<string>(nullable: true),
                    Address = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetUsers", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "Gifts",
                columns: table => new
                {
                    Id = table.Column<long>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
                    IsDeleted = table.Column<bool>(nullable: false),
                    Name = table.Column<string>(nullable: false),
                    Image = table.Column<string>(nullable: true),
                    ImageLocal = table.Column<string>(nullable: true),
                    DescriptionFull = table.Column<string>(nullable: false),
                    DescriptionShort = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Gifts", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "Orders",
                columns: table => new
                {
                    Id = table.Column<long>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
                    IsDeleted = table.Column<bool>(nullable: false),
                    OperationId = table.Column<string>(nullable: true),
                    NotificationType = table.Column<string>(nullable: true),
                    Date = table.Column<string>(nullable: true),
                    Amount = table.Column<string>(nullable: true),
                    WithdrawAmount = table.Column<string>(nullable: true),
                    Currency = table.Column<string>(nullable: true),
                    Sender = table.Column<string>(nullable: true),
                    Codepro = table.Column<string>(nullable: true),
                    Label = table.Column<string>(nullable: true),
                    Sha1Hash = table.Column<string>(nullable: true),
                    Sha1HashServer = table.Column<string>(nullable: true),
                    Unaccepted = table.Column<string>(nullable: true),
                    YandexString = table.Column<string>(nullable: true),
                    Errors = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Orders", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "AspNetRoleClaims",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
                    RoleId = table.Column<string>(nullable: false),
                    ClaimType = table.Column<string>(nullable: true),
                    ClaimValue = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetRoleClaims", x => x.Id);
                    table.ForeignKey(
                        name: "FK_AspNetRoleClaims_AspNetRoles_RoleId",
                        column: x => x.RoleId,
                        principalTable: "AspNetRoles",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "AspNetUserClaims",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
                    UserId = table.Column<string>(nullable: false),
                    ClaimType = table.Column<string>(nullable: true),
                    ClaimValue = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetUserClaims", x => x.Id);
                    table.ForeignKey(
                        name: "FK_AspNetUserClaims_AspNetUsers_UserId",
                        column: x => x.UserId,
                        principalTable: "AspNetUsers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "AspNetUserLogins",
                columns: table => new
                {
                    LoginProvider = table.Column<string>(nullable: false),
                    ProviderKey = table.Column<string>(nullable: false),
                    ProviderDisplayName = table.Column<string>(nullable: true),
                    UserId = table.Column<string>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetUserLogins", x => new { x.LoginProvider, x.ProviderKey });
                    table.ForeignKey(
                        name: "FK_AspNetUserLogins_AspNetUsers_UserId",
                        column: x => x.UserId,
                        principalTable: "AspNetUsers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "AspNetUserRoles",
                columns: table => new
                {
                    UserId = table.Column<string>(nullable: false),
                    RoleId = table.Column<string>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetUserRoles", x => new { x.UserId, x.RoleId });
                    table.ForeignKey(
                        name: "FK_AspNetUserRoles_AspNetRoles_RoleId",
                        column: x => x.RoleId,
                        principalTable: "AspNetRoles",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_AspNetUserRoles_AspNetUsers_UserId",
                        column: x => x.UserId,
                        principalTable: "AspNetUsers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "AspNetUserTokens",
                columns: table => new
                {
                    UserId = table.Column<string>(nullable: false),
                    LoginProvider = table.Column<string>(nullable: false),
                    Name = table.Column<string>(nullable: false),
                    Value = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetUserTokens", x => new { x.UserId, x.LoginProvider, x.Name });
                    table.ForeignKey(
                        name: "FK_AspNetUserTokens_AspNetUsers_UserId",
                        column: x => x.UserId,
                        principalTable: "AspNetUsers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "Customers",
                columns: table => new
                {
                    Id = table.Column<long>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
                    IsDeleted = table.Column<bool>(nullable: false),
                    IdentityId = table.Column<string>(nullable: true),
                    Location = table.Column<string>(nullable: true),
                    Locale = table.Column<string>(nullable: true),
                    Gender = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Customers", x => x.Id);
                    table.ForeignKey(
                        name: "FK_Customers_AspNetUsers_IdentityId",
                        column: x => x.IdentityId,
                        principalTable: "AspNetUsers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Restrict);
                });

            migrationBuilder.CreateTable(
                name: "GiftDraws",
                columns: table => new
                {
                    Id = table.Column<long>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
                    IsDeleted = table.Column<bool>(nullable: false),
                    GiftId = table.Column<long>(nullable: false),
                    Price = table.Column<decimal>(nullable: false),
                    PriceKey = table.Column<decimal>(nullable: false),
                    WinnerKey = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_GiftDraws", x => x.Id);
                    table.ForeignKey(
                        name: "FK_GiftDraws_Gifts_GiftId",
                        column: x => x.GiftId,
                        principalTable: "Gifts",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "Votes",
                columns: table => new
                {
                    Id = table.Column<long>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
                    IsDeleted = table.Column<bool>(nullable: false),
                    GiftId = table.Column<long>(nullable: false),
                    Price = table.Column<decimal>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Votes", x => x.Id);
                    table.ForeignKey(
                        name: "FK_Votes_Gifts_GiftId",
                        column: x => x.GiftId,
                        principalTable: "Gifts",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "GiftDrawUsers",
                columns: table => new
                {
                    Id = table.Column<long>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
                    IsDeleted = table.Column<bool>(nullable: false),
                    GiftDrawId = table.Column<long>(nullable: false),
                    UserId = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_GiftDrawUsers", x => x.Id);
                    table.ForeignKey(
                        name: "FK_GiftDrawUsers_GiftDraws_GiftDrawId",
                        column: x => x.GiftDrawId,
                        principalTable: "GiftDraws",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_GiftDrawUsers_AspNetUsers_UserId",
                        column: x => x.UserId,
                        principalTable: "AspNetUsers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Restrict);
                });

            migrationBuilder.CreateTable(
                name: "VoteUsers",
                columns: table => new
                {
                    Id = table.Column<long>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
                    IsDeleted = table.Column<bool>(nullable: false),
                    UserId = table.Column<string>(nullable: true),
                    VoteId = table.Column<long>(nullable: false),
                    Value = table.Column<bool>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_VoteUsers", x => x.Id);
                    table.ForeignKey(
                        name: "FK_VoteUsers_AspNetUsers_UserId",
                        column: x => x.UserId,
                        principalTable: "AspNetUsers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Restrict);
                    table.ForeignKey(
                        name: "FK_VoteUsers_Votes_VoteId",
                        column: x => x.VoteId,
                        principalTable: "Votes",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "GiftDrawUserKeys",
                columns: table => new
                {
                    Id = table.Column<long>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
                    IsDeleted = table.Column<bool>(nullable: false),
                    GiftDrawUserId = table.Column<long>(nullable: false),
                    Key = table.Column<string>(nullable: false),
                    Price = table.Column<decimal>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_GiftDrawUserKeys", x => x.Id);
                    table.ForeignKey(
                        name: "FK_GiftDrawUserKeys_GiftDrawUsers_GiftDrawUserId",
                        column: x => x.GiftDrawUserId,
                        principalTable: "GiftDrawUsers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.InsertData(
                table: "AspNetRoles",
                columns: new[] { "Id", "ConcurrencyStamp", "Name", "NormalizedName" },
                values: new object[,]
                {
                    { "1a9c5933-230d-4cc4-a411-c679f92fc51b", "a8ca2929-26f6-415f-a1d3-666e514a92d7", "Superuser", "SUPERUSER" },
                    { "abf44858-2ab6-4e53-b04e-5ebd3f91b47c", "e14d2e11-ce26-402e-a82d-c5bb76528cd3", "Participant", "PARTICIPANT" }
                });

            migrationBuilder.InsertData(
                table: "Gifts",
                columns: new[] { "Id", "DescriptionFull", "DescriptionShort", "Image", "ImageLocal", "IsDeleted", "Name" },
                values: new object[,]
                {
                    { 1L, "Смартфон Apple iPhone X – воплощение статуса, надежности и передовых технологий. Большой, 5.8-дюймовый безрамочный экран дарит удивительно четкое и живое изображение (разрешение 2436x1125). Привычный поклонникам бренда интерфейс здесь дополнен такими возможностями, как бесконтактная оплата и зарядка, поддержка максимального количества диапазонов LTE.", null, "https://www.re-store.ru/upload/iblock/ea3/ea3a57da3137cf5be1c0b3d1e8999a37.jpg", null, false, "Apple iPhone X 64 ГБ" },
                    { 2L, "Смартфон Samsung Galaxy Note 8 64 ГБ – устройство, в котором внимание уделялось всем деталям. Выполнена задняя панель в синем цвете, она придает лаконичный дизайн. Устанавливается стекло Corning Gorilla Glass 5 с двух сторон. Оно не царапается при эксплуатации и обладает увеличенной прочностью. Samsung Galaxy Note 8 64 ГБ поддерживает установку 2 SIM - карт.Если вы используете номера различных операторов, то сможете совместить их в одном устройстве.Экран получил большой размер, диагональ составляет 6.3 дюйма.Но рамки незначительные, особое соотношение сторон 18:9 улучшает взаимодействие со смартфоном.", null, "https://cdn.images.express.co.uk/img/dynamic/galleries/x701/260002.jpg", null, false, "Samsung Galaxy Note 8 64 ГБ" },
                    { 3L, "Игровая приставка PlayStation 4 Pro в полной мере оправдывает свое название. В приставке есть все необходимое для комфортного использования любимых игр. Модель использует игровые носители Blu-ray. Также есть поддержка DVD и CD. Приставка поддерживает форматы Full HD и Ultra HD (4K), а также технологию 3D. Вам останется лишь подключить устройство к функциональному телевизионному приемнику. Комплектный геймпад оборудован сенсорной панелью. Приставка PlayStation 4 Pro обладает безупречным быстродействием, которое обеспечивается 2.1 - гигагерцовым процессором AMD Jaguar x86 - 64, 8 ГБ оперативной памяти и графическое ядро AMD Radeon GPU.Объем встроенной памяти достаточен для размещения очень большого количества данных: он равен 1 ТБ.Беспроводные интерфейсы устройства представлены Wi - Fi и Bluetooth.", null, "https://brain-images-ssl.cdn.dixons.com/1/7/10153771/l_10153771_001.jpg", null, false, "PlayStation 4 Pro" },
                    { 4L, "Игровая приставка Microsoft Xbox ONE X совместима с играми, разработанными для платформ Xbox 360 и Xbox One. Модель рассчитана на игровые носители Blu-ray. Поддерживаются и носители CD и DVD. Приставка комплектуется беспроводным геймпадом, который отличается значительным радиусом действия. Для вывода изображения используется выход HDMI.", null, "https://static.eldorado.ru/photos/71/713/662/67/new_71366267_l_1507895560.jpeg/resize/500x375/", null, false, "Microsoft Xbox One X" },
                    { 5L, "Смартфон Apple iPhone 7 выполнен в герметичном черном алюминиевом корпусе, защищающем его от брызг, царапин и пыли. При этом смартфон еще и очень тонкий, его габариты: 67.1x138.3x 7.1 миллиметра. У Apple iPhone 7 отличная фронтальная камера в 7 Мп. Это позволяет получать еще более качественные фотографии с отличной степенью резкости, делать великолепного качества панорамные кадры, а также дает широкие возможности при видеосъемке. Снимайте видео в формате Ultra HD 4K, а также ведите замедленную съемку в формате 1080p и 720p.Шестилинзовый объектив и вспышка True Tone Quad - LED гарантируют отличную освещенность и хорошие кадры даже ночью.Мощный 4 - ядерный процессор обеспечит отличное быстродействие системы, легкую загрузку и работу с файлами и приложениями любого объема.Вы можете не ограничивать себя в скачивании информации, видео и снимать столько, сколько вам захочется, 128 ГБ встроенной памяти хватит на все.", null, "https://www.re-store.ru/upload/iblock/fe9/fe9918ce97219b07de7ac1a088e6b3c1.jpg", null, false, "Apple iPhone 7 128 Гб" },
                    { 6L, "Телевизор LED LG 43UK6200 поддерживает цифровые тюнеры DVB-T, DVB-T2, DVB-C, DVB-S и DVB-S2.", null, null, "LED LG 43UK6200 2.jpg", false, "Телевизор LED LG 43UK6200" },
                    { 7L, "Микроволновая печь LG MH6336GIB выполнена в стильном матовом корпусе черного цвета.", null, null, "LG MH6336GIB.jpg", false, "Микроволновая печь LG MH6336GIB" },
                    { 8L, "9.7-дюймовый планшет Samsung GALAXY Tab S2 оснащен внушительным запасом встроенной памяти 32 ГБ и беспроводной технологией доступа к мобильной интернет-сети 3G.", null, null, "Samsung GALAXY Tab S2 32 ГБ 3G, LTE черный.jpg", false, "Планшет Samsung GALAXY Tab S2 9.7" },
                    { 9L, "Стиральная машина Samsung WW60H2200EWD/LP – модель от компании, которая давно занимается выпуском данной техники.", null, null, "washmachine Samsung WW60H2200EWDLP.jpg", false, "Стиральная машина Samsung WW60H2200EWD/LP" },
                    { 10L, "Пылесос Thomas DryBOX AMFIBIA выполнен в корпусе черного цвета с голубыми деталями.", null, null, "Thomas DryBOX AMFIBIA.jpg", false, "Пылесос Thomas DryBOX AMFIBIA" },
                    { 11L, "Смартфон Samsung Galaxy A8+ SM-A730F сможет поразить своим обширным функционалом и грандиозным техническим оснащением даже самого требовательного и капризного пользователя.", null, null, "Samsung Galaxy A8+ SM-A730F 32 ГБ черный.jpg", false, "Смартфон Samsung Galaxy A8+ SM-A730F" },
                    { 12L, "Фитнес-браслет Xiaomi Mi Band 3 - миниатюрное устройство для пользователя, который ведет активный образ жизни. Представленная техника позволит вам отслеживать ваш пульс, количество пройденных шагов, потраченные калории и пройденное расстояние. Модель стала обладательницей универсальным черным корпусом и ремешком. Поддерживается совместимость с операционными платформами Android версии 4.4 и выше, а также iOS версии 9 и выше. Настройка параметров работы и управление браслетом осуществляется со смартфона.", null, "https://i5.stat01.com/2/59/100583661/075a3e/remeshok-dlya-fitnes-brasleta-xiaomi-mi-band-2-chernyj.png", null, false, "Фитнес-браслет Xiaomi Mi Band 3" },
                    { 13L, "Стильный и ультратонкий LED-телевизор LG 32LJ500V представлен в черной расцветке. Прямой экран Direct LED обладает диагональю 32 дюйма и разрешение 1920x1080 при формате 16:9. Используется матрица с качеством изображения 200 PMI и частотой обновления 50 Гц. Предусматривается наличие двух HDMI-портов, трех аудиовходов и одного USB-порта. Допускается надежное крепление на стену при помощи кронштейна 100x100.", null, "https://avatars.mds.yandex.net/get-mpic/200316/img_id4405617333422780220/9hq", null, false, "Телевизор LED LG 32LJ500V (81 см)" }
                });

            migrationBuilder.InsertData(
                table: "GiftDraws",
                columns: new[] { "Id", "GiftId", "IsDeleted", "Price", "PriceKey", "WinnerKey" },
                values: new object[,]
                {
                    { 3L, 1L, false, 10m, 2m, null },
                    { 4L, 2L, false, 10m, 2m, null },
                    { 5L, 3L, false, 12m, 2m, null },
                    { 6L, 4L, false, 12m, 2m, null },
                    { 7L, 5L, false, 8m, 2m, null },
                    { 1L, 12L, false, 6m, 2m, null },
                    { 2L, 13L, false, 10m, 2m, null }
                });

            migrationBuilder.InsertData(
                table: "Votes",
                columns: new[] { "Id", "GiftId", "IsDeleted", "Price" },
                values: new object[,]
                {
                    { 1L, 6L, false, 29999m },
                    { 2L, 7L, false, 9999m },
                    { 3L, 8L, false, 29499m },
                    { 4L, 9L, false, 24499m },
                    { 5L, 10L, false, 24999m },
                    { 6L, 11L, false, 22999m }
                });

            migrationBuilder.CreateIndex(
                name: "IX_AspNetRoleClaims_RoleId",
                table: "AspNetRoleClaims",
                column: "RoleId");

            migrationBuilder.CreateIndex(
                name: "RoleNameIndex",
                table: "AspNetRoles",
                column: "NormalizedName",
                unique: true,
                filter: "[NormalizedName] IS NOT NULL");

            migrationBuilder.CreateIndex(
                name: "IX_AspNetUserClaims_UserId",
                table: "AspNetUserClaims",
                column: "UserId");

            migrationBuilder.CreateIndex(
                name: "IX_AspNetUserLogins_UserId",
                table: "AspNetUserLogins",
                column: "UserId");

            migrationBuilder.CreateIndex(
                name: "IX_AspNetUserRoles_RoleId",
                table: "AspNetUserRoles",
                column: "RoleId");

            migrationBuilder.CreateIndex(
                name: "EmailIndex",
                table: "AspNetUsers",
                column: "NormalizedEmail");

            migrationBuilder.CreateIndex(
                name: "UserNameIndex",
                table: "AspNetUsers",
                column: "NormalizedUserName",
                unique: true,
                filter: "[NormalizedUserName] IS NOT NULL");

            migrationBuilder.CreateIndex(
                name: "IX_Customers_IdentityId",
                table: "Customers",
                column: "IdentityId");

            migrationBuilder.CreateIndex(
                name: "IX_GiftDraws_GiftId",
                table: "GiftDraws",
                column: "GiftId");

            migrationBuilder.CreateIndex(
                name: "IX_GiftDrawUserKeys_GiftDrawUserId",
                table: "GiftDrawUserKeys",
                column: "GiftDrawUserId");

            migrationBuilder.CreateIndex(
                name: "IX_GiftDrawUsers_GiftDrawId",
                table: "GiftDrawUsers",
                column: "GiftDrawId");

            migrationBuilder.CreateIndex(
                name: "IX_GiftDrawUsers_UserId",
                table: "GiftDrawUsers",
                column: "UserId");

            migrationBuilder.CreateIndex(
                name: "IX_Votes_GiftId",
                table: "Votes",
                column: "GiftId");

            migrationBuilder.CreateIndex(
                name: "IX_VoteUsers_UserId",
                table: "VoteUsers",
                column: "UserId");

            migrationBuilder.CreateIndex(
                name: "IX_VoteUsers_VoteId",
                table: "VoteUsers",
                column: "VoteId");
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "AspNetRoleClaims");

            migrationBuilder.DropTable(
                name: "AspNetUserClaims");

            migrationBuilder.DropTable(
                name: "AspNetUserLogins");

            migrationBuilder.DropTable(
                name: "AspNetUserRoles");

            migrationBuilder.DropTable(
                name: "AspNetUserTokens");

            migrationBuilder.DropTable(
                name: "Customers");

            migrationBuilder.DropTable(
                name: "GiftDrawUserKeys");

            migrationBuilder.DropTable(
                name: "Orders");

            migrationBuilder.DropTable(
                name: "VoteUsers");

            migrationBuilder.DropTable(
                name: "AspNetRoles");

            migrationBuilder.DropTable(
                name: "GiftDrawUsers");

            migrationBuilder.DropTable(
                name: "Votes");

            migrationBuilder.DropTable(
                name: "GiftDraws");

            migrationBuilder.DropTable(
                name: "AspNetUsers");

            migrationBuilder.DropTable(
                name: "Gifts");
        }
    }
}
