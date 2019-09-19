<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserProduct;
use App\Models\UserProductAccept;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;

class ProductController extends Controller
{
    private $trainings = [
        [
            'id' => 1, 'title' => 'Разминка', 'icon' => 'fa fa-burn', 'color' => 'red',
            'url_viedo' => '',
            'url_file' => null,
            'yadisk' => 'https://drive.google.com/file/d/1Sexh6s6uXi1J23lsoCQcYX1WWDtGlmlX/preview'
        ],
        [
            'id' => 2, 'title' => 'Тренировка №1', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/cfvupim668i1brr/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%201.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1uwjaalfdXK-B3yrIA29eBlRLiFxrEPcN/preview'
        ],
        [
            'id' => 3, 'title' => 'Тренировка №2', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/yfcei4nfzr2scdw/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%202.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1lVgOpuMw8EMIpT9LZWghteBrRvpynzne/preview'
        ],
        [
            'id' => 4, 'title' => 'Тренировка №3', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/pfwxj79eguqksrw/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%203.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1G46u3lWvKZW_FdG32gJXPIRr81-p6WTw/preview'
        ],
        [
            'id' => 5, 'title' => 'Тренировка №4', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/eijhe2upat3ox54/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%204.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1C4hm02gJeUQg_3R7O5uksigLBXxmUvCN/preview'
        ],
        [
            'id' => 6, 'title' => 'Тренировка №5', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/1pbn3pxk1jwadjz/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%205.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1b1T2hlU-BT7GXI3klaJJr7c_fPwghefB/preview'
        ],
        [
            'id' => 7, 'title' => 'Тренировка №6', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/2ntg5u0l7wh4fc2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%206.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1VQn5jxR-BiSa-nfGue_wLX0a1r7jBuWZ/preview'
        ],
        [
            'id' => 8, 'title' => 'Тренировка №7', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/62uafhw2mk6y31s/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%207.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1xhJhtus5engUwbaxHVFwnHXHOIq4b5Aq/preview'
        ],
        [
            'id' => 9, 'title' => 'Тренировка №8', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/aidk747fljs9og5/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%208.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1_00rXc8njHHLskeCvKzXNFLehisRWZGT/preview'
        ],
        [
            'id' => 10, 'title' => 'Тренировка №9', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/w31ssapbrsnias6/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%209.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/17x3YGBNle1fpVnyj45bs06uASik_UA5Y/preview'
        ],
        [
            'id' => 11, 'title' => 'Тренировка №10', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/86zmjlcz1ckbbqg/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2010.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1Y1XDNl9mOB6INtn7YtM9BCrn1-1bqpyw/preview'
        ],
        [
            'id' => 12, 'title' => 'Тренировка №11', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/m7m544xpigwi29f/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2011.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/193ZZuaisnGu68pMSrNVRIoZQwq0e6ctQ/preview'
        ],
        [
            'id' => 13, 'title' => 'Тренировка №12', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/kn0dgosnpilot8a/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2012.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1EQ09_9rXz3qeupHhQAi6iLPgzGkO0GQo/preview'
        ],
        [
            'id' => 14, 'title' => 'Тренировка №13', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/r6rfjtjjm7chg6u/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2013.pdf?dl=1',
            'yadisk' => ''
        ],
        [
            'id' => 15, 'title' => 'Тренировка №14', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/gvku8jw1y7bykel/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2014.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1QY-M0FbuI77PabxtQwMJqI05YWcGatk1/preview'
        ],
        [
            'id' => 16, 'title' => 'Тренировка №15', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/ikbgwix40sg45bd/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2015.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1LhnHCjliP0qqjziUn3vEOqO4Xg3v4ADt/preview'
        ],
        [
            'id' => 17, 'title' => 'Тренировки №16-17', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/44lcan1221nbozq/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2016.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1PKw3-JFDeHCJvGxjXwaN_SlvZ3Jv681p/preview'
        ],
        [
            'id' => 19, 'title' => 'Тренировка №18', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/9j3kl0asxihs6ih/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2018.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1JUDkc4hjBL8CEHb0iRjvaC6fvEfAIxDe/preview'],
        [
            'id' => 20, 'title' => 'Тренировка №19', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/gjst9xn7fxpyy0z/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2019.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1gY8X_5FBalr8gJHYSkbq38GXBhk22O3F/preview'],
        [
            'id' => 21, 'title' => 'Тренировка №20', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/cbh1ky676x8kipn/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2020.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/19TPOk-91DNhT1Q3baEXKkGquDyiiuSCF/preview'],
        [
            'id' => 22, 'title' => 'Тренировка №21', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/pn92jn6crrawey2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2021.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1tfim3Hd1xBCf9iI3ITMKBEa9UTyIpThC/preview'],
        [
            'id' => 23, 'title' => 'Тренировка №22', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/08t1z68ixkdeayl/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2022.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/19iLVsJEaCKx7GYk2Ir5Zn-I0J7fmw3mS/preview'],
        [
            'id' => 24, 'title' => 'Тренировка №23', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/df6zc32uxr5xmf2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2023.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1vFwINM03B8_rNBzlTv72SX2yAIe8Hg4x/preview'],
        [
            'id' => 25, 'title' => 'Тренировка №24', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/jhku7qwt12zwsg8/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2024.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1M6Uvnu3OdOBqSAauS1qPtZxcTNnICstf/preview'],
        [
            'id' => 26, 'title' => 'Тренировка №25', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/ak5pig7gemfopua/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2025.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1aV1DKZfCj5DA6hBZSb5fIzNbD80Ariif/preview'],
        [
            'id' => 27, 'title' => 'Тренировка №26', 'icon' => 'fa fa-running', 'color' => 'teal',
            'url_viedo' => null,
            'url_file' => 'https://www.dropbox.com/s/xtgfxjhll17sooq/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2026.pdf?dl=1',
            'yadisk' => 'https://drive.google.com/file/d/1bfERqth-RDMqZGwx3t7FBxk6xAgAVSdr/preview'],
        [
            'id' => 28, 'title' => 'Раcтяжка', 'icon' => 'fa fa-burn', 'color' => 'blue',
            'url_viedo' => null,
            'url_file' => null,
            'yadisk' => 'https://drive.google.com/file/d/1do4_wBSDm35oeMYvRDDQNxaEnU-6n1-5/preview'
        ]
    ];
    
    
    public function index()
    {
        return response()->json(Product::all());
    }

    public function update(Request $request)
    {
        $findProduct = Product::find(Input::get('id'));
        if ($findProduct !== null) {
            $findProduct->price = Input::get('price');
            $findProduct->save();
            return response()->json(200);
        } else return response()->json('ID Not found', 404);
    }

    public function get()
    {
        $products = Product::all();
        $result = [];
        foreach ($products as $product) {
            $prod = [];
            $prod['product'] = $product->toArray();
            $findPayment = UserProduct::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
            if ($product->price == 0) {
                $prod['days'] = $product->days->toArray();
            } else if ($product->price != 0 && $findPayment != null) {
                $prod['days'] = $product->days->toArray();
            } else if ($product->price != 0 && $findPayment == null) {
                $prod['days'] = null;
            }

            $findAcception = UserProductAccept::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
            $prod['accept'] = $findAcception != null ? true : false;
            $prod['is_available'] = $product->price >= 999999 ? false : true;
            array_push($result, $prod);
        }
        return response()->json($result, 200);
    }

    public function acceptProduct()
    {
        $user = Input::get('user');
        $product = Input::get('product');
        $fio = Input::get('fio');
        $age = Input::get('age');
        $city = Input::get('city');
        $email = Input::get('email');
        $phone = Input::get('phone');

        $findUser = User::find($user);
        if (!isset($findUser)) return response()->json(['success' => false, 'error' => ['code' => 1, 'message' => 'Пользователь не найден']], 404);

        $findProduct = Product::find($product);
        if (!isset($findProduct)) return response()->json(['success' => false, 'error' => ['code' => 2, 'message' => 'Программа не найдена']], 404);

        if ($product == 2) return response()->json(['success' => false, 'error' => ['code' => 3, 'message' => 'Регистрация на челлендж закрыта!']], 404);
        UserProductAccept::create([
            'user_id' => $user,
            'product_id' => $product,
            'fio' => $fio,
            'age' => $age,
            'city' => $city,
            'email' => $email,
            'phone' => $phone
        ]);
        return response()->json(200);
    }

    public function getPrices()
    {
        return response()->json([
            ['value' => 2500, 'text' => '2500 р.'],
            ['value' => 5000, 'text' => '5000 р.']
        ], 200);
    }

    public function getMembers()
    {
        $challenge = DB::select('
        SELECT
        upa.*
        FROM user_product_accepts as upa
        LEFT JOIN user_products up ON up.user_id = upa.user_id and up.product_id = upa.product_id
        where upa.product_id = 2
        order by upa.created_at asc
        ');

        $flow = DB::select('
        SELECT
        upa.*, p.operation_id, p.date, p.amount,
        CASE
          WHEN up.price = 2500 THEN "blue"
          WHEN up.price = 5000 THEN "pink"
          ELSE "grey loghten2"
        END AS color,
        up.price
        FROM user_product_accepts as upa
        LEFT JOIN user_products up ON up.user_id = upa.user_id and up.product_id = upa.product_id
        LEFT JOIN payments p ON p.id = up.payment_id
        where upa.product_id = 1
        ');
//        dd($challenge);
        return response()->json([
            'challenge' => $challenge,
            'flow' => $flow
        ], 200, ['Content-Type' => 'application/json; charset=UTF-8'], JSON_UNESCAPED_UNICODE);
    }

    public function getTraining()
    {
        $result = [
            [
                'id' => 1, 'title' => 'Разминка', 'icon' => 'fa fa-burn', 'color' => 'red',
                'url_viedo' => '',
                'url_file' => null,
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1Sexh6s6uXi1J23lsoCQcYX1WWDtGlmlX/preview')
            ],
            [
                'id' => 2, 'title' => 'Тренировка №1', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/cfvupim668i1brr/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%201.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1uwjaalfdXK-B3yrIA29eBlRLiFxrEPcN/preview')
            ],
            [
                'id' => 3, 'title' => 'Тренировка №2', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/yfcei4nfzr2scdw/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%202.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1lVgOpuMw8EMIpT9LZWghteBrRvpynzne/preview')
            ],
            [
                'id' => 4, 'title' => 'Тренировка №3', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/pfwxj79eguqksrw/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%203.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1G46u3lWvKZW_FdG32gJXPIRr81-p6WTw/preview')
            ],
            [
                'id' => 5, 'title' => 'Тренировка №4', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/eijhe2upat3ox54/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%204.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1C4hm02gJeUQg_3R7O5uksigLBXxmUvCN/preview')
            ],
            [
                'id' => 6, 'title' => 'Тренировка №5', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/1pbn3pxk1jwadjz/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%205.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1b1T2hlU-BT7GXI3klaJJr7c_fPwghefB/preview')
            ],
            [
                'id' => 7, 'title' => 'Тренировка №6', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/2ntg5u0l7wh4fc2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%206.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1VQn5jxR-BiSa-nfGue_wLX0a1r7jBuWZ/preview')
            ],
            [
                'id' => 8, 'title' => 'Тренировка №7', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/62uafhw2mk6y31s/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%207.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1xhJhtus5engUwbaxHVFwnHXHOIq4b5Aq/preview')],
            [
                'id' => 9, 'title' => 'Тренировка №8', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/aidk747fljs9og5/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%208.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1_00rXc8njHHLskeCvKzXNFLehisRWZGT/preview')],
            [
                'id' => 10, 'title' => 'Тренировка №9', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/w31ssapbrsnias6/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%209.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/17x3YGBNle1fpVnyj45bs06uASik_UA5Y/preview')],
            [
                'id' => 11, 'title' => 'Тренировка №10', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/86zmjlcz1ckbbqg/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2010.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1Y1XDNl9mOB6INtn7YtM9BCrn1-1bqpyw/preview')],
            [
                'id' => 12, 'title' => 'Тренировка №11', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/m7m544xpigwi29f/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2011.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/193ZZuaisnGu68pMSrNVRIoZQwq0e6ctQ/preview')],
            [
                'id' => 13, 'title' => 'Тренировка №12', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/kn0dgosnpilot8a/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2012.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1EQ09_9rXz3qeupHhQAi6iLPgzGkO0GQo/preview')],
            [
                'id' => 14, 'title' => 'Тренировка №13', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/r6rfjtjjm7chg6u/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2013.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('')],
            [
                'id' => 15, 'title' => 'Тренировка №14', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/gvku8jw1y7bykel/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2014.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1QY-M0FbuI77PabxtQwMJqI05YWcGatk1/preview')],
            [
                'id' => 16, 'title' => 'Тренировка №15', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/ikbgwix40sg45bd/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2015.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1LhnHCjliP0qqjziUn3vEOqO4Xg3v4ADt/preview')],
            [
                'id' => 17, 'title' => 'Тренировки №16-17', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/44lcan1221nbozq/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2016.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1PKw3-JFDeHCJvGxjXwaN_SlvZ3Jv681p/preview')],
//            [
//                'id' => 18, 'title' => 'Тренировка №17', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/mi0ju036j17nc0z/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2017.pdf?dl=1',
//                'yadisk' => $this->youtubeEmbed('')],
            [
                'id' => 19, 'title' => 'Тренировка №18', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/9j3kl0asxihs6ih/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2018.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1JUDkc4hjBL8CEHb0iRjvaC6fvEfAIxDe/preview')],
            [
                'id' => 20, 'title' => 'Тренировка №19', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/gjst9xn7fxpyy0z/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2019.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1gY8X_5FBalr8gJHYSkbq38GXBhk22O3F/preview')],
            [
                'id' => 21, 'title' => 'Тренировка №20', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/cbh1ky676x8kipn/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2020.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/19TPOk-91DNhT1Q3baEXKkGquDyiiuSCF/preview')],
            [
                'id' => 22, 'title' => 'Тренировка №21', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/pn92jn6crrawey2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2021.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1tfim3Hd1xBCf9iI3ITMKBEa9UTyIpThC/preview')],
            [
                'id' => 23, 'title' => 'Тренировка №22', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/08t1z68ixkdeayl/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2022.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/19iLVsJEaCKx7GYk2Ir5Zn-I0J7fmw3mS/preview')],
            [
                'id' => 24, 'title' => 'Тренировка №23', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/df6zc32uxr5xmf2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2023.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1vFwINM03B8_rNBzlTv72SX2yAIe8Hg4x/preview')],
            [
                'id' => 25, 'title' => 'Тренировка №24', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/jhku7qwt12zwsg8/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2024.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1M6Uvnu3OdOBqSAauS1qPtZxcTNnICstf/preview')],
            [
                'id' => 26, 'title' => 'Тренировка №25', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/ak5pig7gemfopua/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2025.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1aV1DKZfCj5DA6hBZSb5fIzNbD80Ariif/preview')],
            [
                'id' => 27, 'title' => 'Тренировка №26', 'icon' => 'fa fa-running', 'color' => 'teal',
                'url_viedo' => null,
                'url_file' => 'https://www.dropbox.com/s/xtgfxjhll17sooq/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2026.pdf?dl=1',
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1bfERqth-RDMqZGwx3t7FBxk6xAgAVSdr/preview')],
            [
                'id' => 28, 'title' => 'Раcтяжка', 'icon' => 'fa fa-burn', 'color' => 'blue',
                'url_viedo' => null,
                'url_file' => null,
                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1do4_wBSDm35oeMYvRDDQNxaEnU-6n1-5/preview')
            ]



//            [
//            'id' => 1, 'title' => 'Разминка', 'icon' => 'fa fa-burn', 'color' => 'red',
//            'url_viedo' => '',
//            'url_file' => null,
//            'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX188VClqurOfZvt-ZqFxpYttmF2boOXQB8H6gtyI4MT3w8_o-yaJ0OYCCnLLoCzpg_mpEF-Wf1KJuo28yTQeR6O8g145OHwE8ExP3FTC8-CYy7ySodhvXbAfEBygwX-GAU3w8mnGs_dvsrVrAMKZor8qd38lLtImnd7TCt_nr0Zp0lqRAKcotYv5Sxp3lam-EIU3gM7L7wkWVMJs8FK6RQ5b9YXSARMZGGEe-aGJBo9uOjNpwVsfo1N736WSHNBW95Hs0jBV_Y0rGDwCA8_r6mAHUJtl8fLsm4eo1-_-1upm-puKXuxPAj_R%2F591c75e34e6f0%2Fc5217439a97292f90231ddc18d939b91e9235898f00625e38b4caec66950fa18%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Faab773c1614cf9a151d2224384446efd3680bd3e0d91ea50eaccfb9d396be5c1%2F5d6f7ffc%2F-Djvje-MNwpGJ1sFoy4g8DtAbW1-OhamU1R69DOzf-sVRGzUxqcuIT6zUZWy1KtPmbTQnKQU7tE0vK8D_9VbyA%253D%253D%3Fuid%3D0%26filename%3Drazminka.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22f73c2be974a8aa1e6d685292cb25a3e988c9a5d962687ee36ea818fea09bc518%22%7D&amp;vsid=f73c2be974a8aa1e6d685292cb25a3e988c9a5d962687ee36ea818fea09bc518"></iframe>'
//        ],
//            [
//                'id' => 2, 'title' => 'Тренировка №1', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/cfvupim668i1brr/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%201.pdf?dl=1',
//                'yadisk' => $this->youtubeEmbed('https://drive.google.com/file/d/1UPIbYRUIt3ZVnePMA7htJxr3Xmb0IItG/preview')
//            ],
//            [
//                'id' => 3, 'title' => 'Тренировка №2', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/yfcei4nfzr2scdw/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%202.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX18fA3OjxikTKhr9LGJ8Uii4n3_xMJp3HSIuO6t0slOTigFsFgwzTHTHVmWENsRSw1vISMLnu6CdhZt43gxEEgQFRgo94yY2hhlbJ4OJTjzYzQpdojvVKTi74AGoStW4-9oIq9BHweCit1TNk-JXqGTaNcRc4GKhaHab8mITLnRfh9LF5A7Yt8U_0FtFTwxP2cjI-X8FfJQk5Bd-cpO11zUseJgfH-arDGDoi1wRzcsNq81XY-l-XkfM5Yf3_p50vhELwllJP1b_86m8CvWqfKMflyAR-bRdfdsezzcz5c6xSzP2ifg_TAWp%2F591bc799d8da8%2F01706469bb7eef98391fba91355faf55f7b7e6d2b58318b7a536b8ab1265b973%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Ff6008b377bb852e2e18a389230d0773decb72d873e5495fdfdcb7b2749832ad3%2F5d6ec93b%2FY4KHBo_zV6VoQXCr3W5eDSkFWrlbaW76vuKoQzJKHLZDgfS9JcdVh9RqmWPd88TLVokIzNqRj5Sc3FJD3lJHjQ%253D%253D%3Fuid%3D0%26filename%3Dtren2.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%225888037567dabfe1a6c49de5fb2cbbea44105473120637fade9e9ac24614cc05%22%7D&amp;vsid=5888037567dabfe1a6c49de5fb2cbbea44105473120637fade9e9ac24614cc05"></iframe>'
//            ],
//            [
//                'id' => 4, 'title' => 'Тренировка №3', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/pfwxj79eguqksrw/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%203.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1-FQq3d8iepFMJK2mvP1wEJQCp9D_qEasfBJ3KUS5oxGhd1Q2Ekyor4BN3mK39JCRAYu9LlTmtGfEow-B9sbUnNz1GyjHyTYba_4m06sKAlk2PwTrz4eETX6qpJ-nt5JV8iiFP_wDpe1jr0b8X7YskcA0ynCWsQlGyC4sDuQfOUjO1t4A0VI7f-fiF6SOFrUvi3o_3to213E7p_DxLoIb8qv7NVKrnc_wVbwNARwHZu0kfo-KnyAZRjEZz6H-hSe163xT9gZyK8V_NjE_36mrBbLpsCpjU7SPoCf40SqKsZXMoenrZ4aPfp%2F591bc6db1ac68%2Fee6e7d6bdacf588f11f6bec40e176d1221a50cd25d5015a6bb76d1dd31253456%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Fa8dc783a790bd651e8855b9bda7e0fe99fe8d1c33efa184c8e28738a8c52d56b%2F5d6ec873%2Fa7CZs9xsQaMAU5Y6AA2xuhwUSPLXooGKDPbCYySpEGjhVmudnSZ_4VqSOVY2h1Y5NDJaHuLfYFIH1DwgNxN-_g%253D%253D%3Fuid%3D0%26filename%3Dtren3.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22c63e4cfd648c81af5768f9ac7931e413547387a6e7d9894c8d0f1b3fdaa49c69%22%7D&amp;vsid=c63e4cfd648c81af5768f9ac7931e413547387a6e7d9894c8d0f1b3fdaa49c69"></iframe>'
//
//            ],
//            [
//                'id' => 5, 'title' => 'Тренировка №4', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/eijhe2upat3ox54/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%204.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1-cgNWR8pmaxZmC6gjsVcBAdbOwzxqebrw63TUJxnWIvvVU3rgFPUy4goummWVuTVHiFJ1fCKrpTymPaMLeKpjtVS22uW4zk-5z865cvC5etr4_H19GrUfj7Lrk2roCWjlQaQYgCCTOINwkYRRA8hSHutb2VPJagf6MnlDlUrnpZ9Vfb-2nU1p0_wOd9w05or2i30dMOiStmwpNgozIlG6nuPLhSucpYpLet2a0qAwKzbGhr3fw8-Z7ybx2wYlQ7E84QzLF8MELNMUnwGI-edmTMMNliW6lj0hE9HfA8nhotRhSVJj4qgjW%2F591bee0847480%2Ff060cab1dc3944c34a8f8d96d952c52330e02161dc4d83ec99e18f86b8cedc0d%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F150214b44ce5345222bca9bff919965c90a62ab000b74093fe7a4989a91df8aa%2F5d6ef187%2FsXquPWtG1xWi1tVde_ZatJvP9ZHPaf8rRSSJTO74cmWWNZaHLtHMNfh2cEONYJhRV4be4xRU58QIU0FBe7Uwmg%253D%253D%3Fuid%3D0%26filename%3Dtren4.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%2203870d1d91df1cdfe8cb512569de78192d9680230a88c13db3c82fa6bb323dda%22%7D&amp;vsid=03870d1d91df1cdfe8cb512569de78192d9680230a88c13db3c82fa6bb323dda"></iframe>'
//            ],
//            [
//                'id' => 6, 'title' => 'Тренировка №5', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/1pbn3pxk1jwadjz/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%205.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX18FqLCv3EfF5B_1i-DEYPD6rNZlJqSddUyUpqBWTETbm-Lpd_sVLwxtYS5H0XWSfzssrjvrpppJxp326CTaQ9f2KhvkoC5HIzf3tSwu8iExJuXJyrdjdi52r5LdvA_BL7NSCmgj_WzanVy_XU11Uxq2MASc0e0WJZ-80Lm0E3PZMHg2bXnEBLtLeFP_a-E3akgS4ig3UdNYpVVx3KtbQUTWgFh-ui_8zbQK69NzJURmN8ulKToB50GezW6wcntm7cTQDRtValH11G8buzuZt5IGNiN2MyWp1b4p1l_BVPV7fMgythrw5paC%2F591bee2e7ad28%2F4238ff684d9fdf7a62f494a436aa9611d3ca53ebfacc4c1f156e75ec0ca886de%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F073b02406d978c6b081a1da3c77d20abb35d06a68d7fa0127136332bf2a18c1e%2F5d6ef1af%2FUhXBKPaIHDSdfOyU-r0_0zvVmdr_dWcuZHPeeMUqaaKqhfbv6OHF0FSRm73ffJH3ApJW6itYzSpjUiy4Uy3Izg%253D%253D%3Fuid%3D0%26filename%3Dtren5.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%224c4b37e1941068dccebaa315e07093063c9c774a8b8d30b7ebc1777a0f27a416%22%7D&amp;vsid=4c4b37e1941068dccebaa315e07093063c9c774a8b8d30b7ebc1777a0f27a416"></iframe>'
//            ],
//            [
//                'id' => 7, 'title' => 'Тренировка №6', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/2ntg5u0l7wh4fc2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%206.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX18S-n74fRRgzprinqVA2Xee_ykoIBNuFO6sFazc7BeqS9AKJPqy0x8KdF7R5nBAvHQPOGWihQ8EaNhlExS_pnW1uI-RzEeRf934l2yIAuzS5mzFDATmnDRPLTXnj2pBCe5QVXqq9p5VrSAf5neCF8mGP1o4_EStf6218ao70D8Z5rnXgxXONQYFQPrF7sZCSRge61P65CmU_-6yMHfy36fpWP9y6TG7bEkoFYmGmydZsPtvW8OWycF2spXBU-ZF6OpGB_uH7QCbRspkjb-jcN6PX7Kou7z0re5IGM77xnkhGRJGvYWIlXwr%2F591bee5b31d80%2F8ecec995fe1863c0716638daa02833c02d517415461f08076bd55b2b4e3d0908%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F32937ac82057424b4fc5840431cfe812d0fd4d7339e9054bb776340525726c00%2F5d6ef1de%2FRXJ2WfOOHAPTlom0SBJVFg9_CF1tmaLyMhYZ0HT0n6GR62mG-YbpR607b25tbCg-ZaHPfq1e03ykBoeXKhYdMw%253D%253D%3Fuid%3D0%26filename%3Dtren6.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%2200c88e417f63f9e323250c5e2b1cf7d7b40c7ac98b4bfa8a12f36546bfd2b3ff%22%7D&amp;vsid=00c88e417f63f9e323250c5e2b1cf7d7b40c7ac98b4bfa8a12f36546bfd2b3ff"></iframe>'
//            ],
//            [
//                'id' => 8, 'title' => 'Тренировка №7', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/62uafhw2mk6y31s/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%207.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX19c4cihoY5DhY3Uhu3zW_vQ-MSu-T3wQvCB-jsdGvMI9tpdiUwYhgn3h3Vgg4gT6d5hVWjG5A0FELBftD-rPttxIlyJCwHEuajheaWq2A9Edidi7nPG8FUe7Gq8Sah5HNuY6yN1YowRCjzyThRHyDRuD4PYw4dM2XGesvELO3necrCmuJos9BzuMe112eGQrAb_BKNE51be2OvgFxq8Al_AsqEwWS-nlmTNBjP3e90bIfTGRtQtXDWg2x-8hgz_bcQX2leu2k2oJLdV9Mrci2eRFbq0OYDiCJF0ERVHo6Le4piK0pKbFaGA%2F591bee855ff08%2F1576492e24b2143dc20cf6abaad4629fb9a25053184cc2a1b75b05eff06fd310%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F29526ba8cfa7e9d7604147537a2f1253adeb14dee0d3044dcd6e20a06f37a27c%2F5d6ef20a%2FuGvIiV6O_cothLk2Vj7Ohcn_5OEd8fhOIkV6jlQDTWskKkdw0KBRVg9GVt1gArAiFF25K3uyrMuF38GAfMNJzA%253D%253D%3Fuid%3D0%26filename%3Dtren7.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%226e522d3becc8774681cbc8beebd7c97396f06124537722e0cb3dc8bd7661a215%22%7D&amp;vsid=6e522d3becc8774681cbc8beebd7c97396f06124537722e0cb3dc8bd7661a215"></iframe>'
//            ],
//            [
//                'id' => 9, 'title' => 'Тренировка №8', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/aidk747fljs9og5/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%208.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1-DbZAMeyIHP-kITTKqJRuvDFmflwOhTVV00GCP5ZR4_5tBNzrOWWzR_BQNUJBVNyTdcFKvyXKtGoK5pqCS9sb2IO65sHAZ1ImZlYNeQ-MPYnnHM3nTqEvYqxuKiqppng4IEYaijzywwVXdv73NIOhuGbLUYQCAwtmMhc-NYOsVLewat_mnItbF-oWrLgtlyZ-xYvXWEhuFEA8iZljuVZVxTaXJzcXs05LotDetS4UZYDXVP38uFQSRYJOySB9t4Y10FXu4c2tIMksZBbqXY6rHYqbUYNbMdMy8heU8gN7cqb3wI3Y3xW_E%2F591beea8fbe80%2F5d79a91437f616cfdf4733ab8963dbcc6d5414f4c2b845628605720b55e4a55b%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F202a90ba6285ba10ac8e96fe011c7a7a16b47f94635fa5ef3c6a3148cd2a850f%2F5d6ef230%2F9o05_w3CctlMkozEulwdzmYI1txyi_Ng8mjlWtlFiY-hze-dOA_pLrAiAnoCbIvXpmS0cgAlzXKL73H55lUXsw%253D%253D%3Fuid%3D0%26filename%3Dtren8.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22cf4c4b91d54d463c32152f2fbde8f4fa8389760f49ae7c2de9882b271e0887ac%22%7D&amp;vsid=cf4c4b91d54d463c32152f2fbde8f4fa8389760f49ae7c2de9882b271e0887ac"></iframe>'
//            ],
//            [
//                'id' => 10, 'title' => 'Тренировка №9', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/w31ssapbrsnias6/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%209.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX19pVd5HId6IZ3VS8PBiNQgvTd4xq1gTN8DxUtwUkrKQtpUOw0WuQWNkhDVytfYT2PiFyQ0DSY1XU6a9ZHqReCbplJfl1A5xWlU_C1esmYa4b7rQVFFv9wX2Pg_PKfE4OVRzOoSnZWH_jY7q7xjLipKigOdLd_MhLPGWZktIm09N6WvDFXqEmoCaXbN_Em-n0XTnzt7a0igTqh67s_x9GZN-QTM7Pos6_813nfXHIGHXGPT39QWqB3rzmzQPvaDZTcGNfz_MdIKjrLLBkFFId91hG42g8PCsRwk%2F591beed246f38%2F1d023d209f07b0811c5f8e0ec70ee984aa9197b11f1ab4a81c108defa7396b24%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F9ea8bb5cb301c49faf54c0c2e53bb0b9051a0181e44c72a20e0bb2bd967c1ff4%2F5d6ef25b%2FFhMUDBXiJJoo-Vhf575-80YEM-rZYunn5XiSPC2yYru6E1E4C_6J5aKGBnug5V-DqfVX6fGXp8T8dcHNwQzXOg%253D%253D%3Fuid%3D0%26filename%3Dtren9.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%227d3f02f790d4add946a8b8832c9aa3e89a71d210fb0d303aee43ac944d32c1ac%22%7D&amp;vsid=7d3f02f790d4add946a8b8832c9aa3e89a71d210fb0d303aee43ac944d32c1ac"></iframe>'
//            ],
//            [
//                'id' => 11, 'title' => 'Тренировка №10', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/86zmjlcz1ckbbqg/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2010.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX182Z2aFmO4m1gNvNlhZMZ1-izll7oPJ1BJWqvA-ZH2lisifA7NBv0ne7p1c9wHmPXy5f7Z-1QtIysp9Nk8fZgKnQ7XbW1OKXv5HA1GGg_IgQD4JkJ9mGtc9JbrFyHyJlOOpInB9mwN7DAloIHTrpHkCKHGZHnn5QK0XkZH_vNmaQ0L2T7z1crEIPrRNM858I6auohc8jk_KTWZ_mMIFtfJtoMkbdehHUkt5PKQ7XAOZ1v6uKysvcEA3qkRA_W0vEEbo3FKUX9PrLMzL8V2ocXMvOGzRwfLZPlxPLaZHD16WobXDssk8icRX%2F591beef582f88%2F7417a06ee4451dfb8c36f682ff52e4fdba77797b95147d2883e84383d43bdf97%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F1f17b582e82b2468bed76b0668a9aa4b24798c047f675e7f898a95edf7b3a0c7%2F5d6ef280%2FKujUEgLuawcKHtvt9oY6mEw9BOR65jh6eU6-FDZKZg1lpXr3nVhZUK_DGMwFOPA4vvDE36WnEzQaak2y63s6Tg%253D%253D%3Fuid%3D0%26filename%3Dtren10.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%2221659ead4de338a7d66000d1ea49c457e7df75f0b1e26671713eb1e67fbd4890%22%7D&amp;vsid=21659ead4de338a7d66000d1ea49c457e7df75f0b1e26671713eb1e67fbd4890"></iframe>'
//            ],
//            [
//                'id' => 12, 'title' => 'Тренировка №11', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/m7m544xpigwi29f/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2011.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1_zlBoe7hCY5TbVJRqPvT9_SQTAUsqyDm6ITf1rwIHdPOdoCXnblZZpnwcgCWTWp9A5J2vgasol7ZCYNWyC35gGaPFaIgvjz2PmM2GHjzoZANvCWtxDu3ztYsTArvTrajObRTccer_0AUeWrM9dRuDUXDiPv9-e2lq-OQ395DAIYWUTUIJhBCBPfHBPuCZGVtf1NebASaADuwUu9OpuNJP3oHIi9NquQu9xRwh-Rx_7jvAsEIrx1nGD5KdgdbaXlPp97VuMyxKyORXZj-WJJIvYwTfmXWLY5X6l9AXrhJhpxYQEMQmEejTT%2F591c6ba0c3a88%2F8bfd0c1c0bf76af07d225d67b9c568b6404c43076d583726d5635da3385efdb9%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Fd3e69a35434410bc4d854f74bb994482bfdf7120770341ef10032d340b9146be%2F5d6f753a%2FIPowLz8sjVBtHEg7VRGdjdJ01P_cBm2KnRUICuBHWbzRCHyt9Y0eL3gqBonOTmjVMchOmTUOLncSjsjVjXbbbQ%253D%253D%3Fuid%3D0%26filename%3Dtren11.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22939bd6bff29c8345e47b0db8fca6dea5b8d6688a40af7a7df909f11a3a0f24cd%22%7D&amp;vsid=939bd6bff29c8345e47b0db8fca6dea5b8d6688a40af7a7df909f11a3a0f24cd"></iframe>'
//            ],
//            [
//                'id' => 13, 'title' => 'Тренировка №12', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/kn0dgosnpilot8a/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2012.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX191p97yyqYcIaPNNxZ79eAnzzabfMBwamyK0TbU93OcK1-q3W7fiLlo6AyEijmBdN2bInQlCUIsGaxadZ8BXeEmLCZEbbuhY-2e9qESYEwLL4O5LOtQaMjwO-9zbgOuahRf0121PclDaxLGJzZaH-zhK4oYfRDI-mnbshIt7ecbMuZBMQOCHfHhB9-C5Vnds1Is7TVXESK2NqyplC73_HOJhgUpzopZWixR9FenhweS3UdVkYD0r7lY0SlrcuRibDqZxRis8NY3BdcIUCIqZ9hoz_mcBwhCTCDa570_ijBSxN21RDu4cMJH%2F591c6bbfe3300%2Ff211c7bd79bea1900bd992e8921df8bab3413cb2510bded18763b2c5c586033a%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F7e6fd98e4ffd6fb019c41cd2058f9c9985c42bc8c7c35436bd4caf49af927af4%2F5d6f755a%2FyTvs6pC1reJ0F5NxcYwHMU2Cucra3GSfzp1bGAPPzWRerrbQKFAgTKlLsuAUI2gBWh1yrutRuF4T7qo1mhFaNQ%253D%253D%3Fuid%3D0%26filename%3Dtren12.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22cea80ab02e49fb24bb4aee3cb7a3137687c144da52ce266662d9a28392892c50%22%7D&amp;vsid=cea80ab02e49fb24bb4aee3cb7a3137687c144da52ce266662d9a28392892c50"></iframe>'
//            ],
//            [
//                'id' => 14, 'title' => 'Тренировка №13', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/r6rfjtjjm7chg6u/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2013.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX19s5GYetiRmXbMMK6IOBXoJphX27NlL-WH_ZGegqQLkypgY1B6zzHYHhGTMxjzUpcgjhLdhnVt7Va1fFqt7jXxx3XNOzZccc-JKN5keU_jdHM1TjFX17_fhiMHJi6q6XrO09ErfK4mSAOrkyluB7mSzRXjkUMDImkS5ffvTAp4xSTBHpawYNFqssBnGnLWNDC7A9ZXuKfht_QF8SAP1wsiDTzLMV_U6Q6X1JhtU9k25MmduAd0UDrpoE8wlKW4XIuBKO07gwv6FSncqKRLHA-_O9Bbx4P_RDX_tvm7rmw6JfdzuFjqmew4F%2F591c6bdc333c0%2F224479f85ce7cef09ab554d767f998e75be169d7d89d3f5658e09c081583f352%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F20b6d40e266bc2953dabb4ba2826230b1b24e15ba3c36f90e652540f8bca92b4%2F5d6f7578%2FGgZadYnzkVsozAxyadXHvdbTagEWCnYMAIQc__-7z6_P84DA8lpidsfAJIE9_nZ0iCZizSyp1N7q0TvDDODnYQ%253D%253D%3Fuid%3D0%26filename%3Dtren13.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22d0a0fc3e25643336cd6ace1cdb2c890884bceb88dffcf3d0cec1a4d2eb51bc3c%22%7D&amp;vsid=d0a0fc3e25643336cd6ace1cdb2c890884bceb88dffcf3d0cec1a4d2eb51bc3c"></iframe>'
//            ],
//            [
//                'id' => 15, 'title' => 'Тренировка №14', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/gvku8jw1y7bykel/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2014.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1-gr6bk8cTVEVwAUmcHD4YHMKn6mwoblNWjppcvuAhZ9t3_NPg84Ts_4bulc0bGARCLHVVt8706P3F5q0gQhNgFI0vP9OQmFatMPH2XAHQKndaYP5y4w7XV0vlUanouMbq89veRbcHPFppjOa23Uh3AgBVAPVW0AZKpL-siANeBe4p8BlpXEJ1HuyOGq_kvh8faMfTF7VIqZRpVl_6_gv1zTVqfefx3kdPDJcFZXxUrMYVErZJ5W58v0CoZdvTwlQ3rYMbV7rUN7uWkWvPjp-FR6Vgs_KADGGVLDh7toFxt0hzZ5ua2XxAT%2F591c6bf8f58a0%2F504cd8bb76fc8edf2e24aa08d7fa2923a96bc45d5c28994fd7e916113f485274%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Fa44a3168c6c63ea3e500cd841f999a2e0ea912c760091b7b1d809934b9d23ee3%2F5d6f7596%2FMN7bNojxEpNAklpXQIwVzzySA0z6tKq-99S3dWuQqzw95uSrtQ8_zQcKdBuMW1DNpyhkC6HlzswmbSTmoThVSg%253D%253D%3Fuid%3D0%26filename%3Dtren14.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22c57cb6ac6b4f232c0a5daafa982785513b2414ed2185cf43113422fe9011eae4%22%7D&amp;vsid=c57cb6ac6b4f232c0a5daafa982785513b2414ed2185cf43113422fe9011eae4"></iframe>'
//            ],
//            [
//                'id' => 16, 'title' => 'Тренировка №15', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/ikbgwix40sg45bd/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2015.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1--7PnrZV1I54KBrbyaCdiGvXv30EiV4uooLebqcOBFobGpYip7DQ688GR21L8rUPBw60AVyvRFUojQ_4I3OgtbJ9yiJSJSB3Ak3v9pkM_5IbORvMi1d-ry6UNgGq81TFaTTWhHmPhxjCm1uSPyuo0evlfnZTSnt7h6A73LLCLmZQsEdmWMYiaoKqGnsJjr-OzxYkhVnQiT3ADkl9J2id5S0M1AY_HGvoeXjhxmJn2FDYeY2g41wvGziP5H7Z_B9hg4Lamh1fsNYWlOSDSmL8bYZkn76X_lGVsG1a-M-EC_x1wkmoOMRQWB%2F591c6c23a1db0%2F5d8c85e3082b2d4046b136af154eb8c92accb43ed1d9c6d9aedc937929908c4c%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Fa2dffe5b19d5de5d5b2e0201af955484db037f4878efd2d720ab45004a5e0ed8%2F5d6f75c3%2FFFBz0qZP3C6RjxuhUcUXW1vTqLCDz_HUb2dLygyAkce4esKznFaMnwV_mR7CoZ_l2HQfpvwgkzIvS5MvL5yOag%253D%253D%3Fuid%3D0%26filename%3Dtren15.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%2283987bc6d0d108ec347767eac58803b8e5664200a6a8530edb7a5c695b4acd38%22%7D&amp;vsid=83987bc6d0d108ec347767eac58803b8e5664200a6a8530edb7a5c695b4acd38"></iframe>'
//            ],
//            [
//                'id' => 17, 'title' => 'Тренировка №16', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/44lcan1221nbozq/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2016.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1_NtPF5dCg6xeuvqyf9nzy2UIKhw72yTFK-l2JKgs85Sm2LAWyUhCBxCbcsIqALAVaY3W_R6TgDHz2_WpPJqlI8SmMM3v46_0-lEajEACVcnvU78HlSNnp7uIuqY0w3sSoVdcIcg6tGKHcpRnOBmr7otE3WXLZ86AjEU9d-8e8qLap7osghOD0cibFdssASggAcbJpEj5mOknnM-27Rq7R-MELk_HzRInhnTz__kWL4eviOjB0VqaR_fQC0TtiQhfMR1nwBKpz6nzsZsCZ5O_ZZmhEZOREaV8wEGToPVQgZkGlbe6Hl8PWB%2F591c6ccd35b88%2Fd9e14c1138cde1771da5b3a949246c32dadd38bbd6be9f83e3e9388472ee05be%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Faaacad7a37ee91c87112487fdafd1b8b119a3843f8946135c22161f5b86bb530%2F5d6f7675%2FTWnQ1fgs75IrMctTN9MpYwffhG7dhO5gpWQqtIGrUqiOk9j0t5y5-ZQXDQtxyeFwTcHrF-c1XYhQ2h7qt2Gqvw%253D%253D%3Fuid%3D0%26filename%3Dtren16.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%222a723c3c3f701a0abbede8796a2c48f38101329ebc3747d0ea366ace271bb416%22%7D&amp;vsid=2a723c3c3f701a0abbede8796a2c48f38101329ebc3747d0ea366ace271bb416"></iframe>'
//            ],
//            [
//                'id' => 18, 'title' => 'Тренировка №17', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/mi0ju036j17nc0z/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2017.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1_NtPF5dCg6xeuvqyf9nzy2UIKhw72yTFK-l2JKgs85Sm2LAWyUhCBxCbcsIqALAVaY3W_R6TgDHz2_WpPJqlI8SmMM3v46_0-lEajEACVcnvU78HlSNnp7uIuqY0w3sSoVdcIcg6tGKHcpRnOBmr7otE3WXLZ86AjEU9d-8e8qLap7osghOD0cibFdssASggAcbJpEj5mOknnM-27Rq7R-MELk_HzRInhnTz__kWL4eviOjB0VqaR_fQC0TtiQhfMR1nwBKpz6nzsZsCZ5O_ZZmhEZOREaV8wEGToPVQgZkGlbe6Hl8PWB%2F591c6ccd35b88%2Fd9e14c1138cde1771da5b3a949246c32dadd38bbd6be9f83e3e9388472ee05be%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Faaacad7a37ee91c87112487fdafd1b8b119a3843f8946135c22161f5b86bb530%2F5d6f7675%2FTWnQ1fgs75IrMctTN9MpYwffhG7dhO5gpWQqtIGrUqiOk9j0t5y5-ZQXDQtxyeFwTcHrF-c1XYhQ2h7qt2Gqvw%253D%253D%3Fuid%3D0%26filename%3Dtren16.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%222a723c3c3f701a0abbede8796a2c48f38101329ebc3747d0ea366ace271bb416%22%7D&amp;vsid=2a723c3c3f701a0abbede8796a2c48f38101329ebc3747d0ea366ace271bb416"></iframe>'
//            ],
//            [
//                'id' => 19, 'title' => 'Тренировка №18', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/9j3kl0asxihs6ih/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2018.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX181fVizOLc0m7xZVYz6QBMhPcFRwzl72TtiVCAgjxbw0yvMv0rvXhaUlOsP1Qpg16N_NOn6kSOWUE1SnIfo6Z6vz6pJymwYRhfeHD5PvWMaRxG4XBdjBZ78ZEJ4zQO0ATe1PSWk6mTo-437ipZPKy-jaVTA9UsEEAaIo2hoeX_TAt-kq5CX9sPRkkBfnfzVDkvYQRR6pu2rsTTmIB9hA2BR9h2fcqN-Vx5t6ZWs6zarB9ATfxNGz-uvtHTmKJX4kQn233AaavMF8T3qeTDy4p0-5uVCXXkvHzTul7h4MwtDh1srLGEovx6Q%2F591c7467c83b0%2F27afdefb617d152fa52ee0e8e68a4ba0ac55c16d1fa2ba11e351fe324f580225%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F8ae94c9a761c40a610d97c424812a61855dbdfacd06a6ef1afc342a3b6338f5e%2F5d6f7e6e%2F2KitixlcOOCd-dxxCgevhpQrtX3VzVhZQiT8nBkkF8lhMZSw1TSD-157oxiSM53NPsyxlkPbwtn_Z_hUPbDv1Q%253D%253D%3Fuid%3D0%26filename%3Dtren18.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%221b49f7325d31fad25a7024c954f72e27e2dd25ff8049071e9ce48646cfa736f2%22%7D&amp;vsid=1b49f7325d31fad25a7024c954f72e27e2dd25ff8049071e9ce48646cfa736f2"></iframe>'
//            ],
//            [
//                'id' => 20, 'title' => 'Тренировка №19', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/gjst9xn7fxpyy0z/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2019.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX19u6t8xlWV_AFjhGD0MFxngWq-WwFp5Jbju5QNEx0enfycAW6eSoDfL-EqR8Si3Mff8sHszPARDlQHS684TutD7c82jOZD1mUk-yWUbWoU8_nXtlWL0vRl8uwegfhJarLw7jSUFaESG5e2YqAVW-7Pf7tQvPNBvEzzMRxjsu4G9aDwaevgSbt5Oxa3U-wcFF-zzbNgiQr1wbJc8lPQs6_qYlP64yB4XSuyaim2k988y7ZXlS9T9YsxMCpqknagEI3ZMpCLCCS8BaotIaditAqWsSXrZoD8Pi6qHyROxUhqdCkrvkkIoJGOL%2F591c7482ea850%2F0dc3a89dcc608fc82193ee01c1b998539972e7b5ff9bc3124985b2964e04f4d9%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Fb5edfd206ed8957b26970b2e06536d1990e7974ec4594b35a540030ee768c7c2%2F5d6f7e8a%2FpzI9ydYaqYPcVv3gO5XQ7uXWhcc-th4HmWDrz7-htnvEpQGIXkW89ZtHMk3388pbG8UCXrTHKjVbxxeHgH4T0Q%253D%253D%3Fuid%3D0%26filename%3Dtren19.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22d839a91ca513f0cccecdd3f460936744b2ca1e85bb257a29f258fb816f799921%22%7D&amp;vsid=d839a91ca513f0cccecdd3f460936744b2ca1e85bb257a29f258fb816f799921"></iframe>'
//            ],
//            [
//                'id' => 21, 'title' => 'Тренировка №20', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/cbh1ky676x8kipn/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2020.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1_fN0fTHFdFOZqq8c7G8q69E2ZPv8lc2RaR1ibcDoKToj86Q-QxHRmzj8c7UjZMUGBZSSyLaX0qiPLuivos4cN1NVCp4ewiysFa1UFOM-Tn_iUC5OsclNLJJ8-OkR3izruQUDsJp94IZJ3NW85o8A8juGXcI4stJWiULmKOOjE9BEzWqmWlykvYkyRXWMxe1vFV0Ieu32NewpXNyJMYTp0WqWK1ZX9QxPti3BWncRLPXa3LVtAhV8ahQuEMAOFnvX_gsrbP20O30mfkFaRd7GhgWeciOetY56E0ZpdahAgyCGUzOGEYsKL7%2F591c74aa15600%2F03516256ab52dc93ff77ea765845414b6ddcd8ee6e5c49c9dff679c3d9c3c5b2%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F7c90530e196c4a12cf9e6a207c7c0efb19b069e426fbc8e9ffa3952dafb112fc%2F5d6f7eb3%2FJi4eVZffrhQVMCE4h-bl3A1jMZ8cKy4R8hBupTV7rKpUnNKdY4pbm43awFCLWNNcojfJnYptVHbK-K85SkZ1xg%253D%253D%3Fuid%3D0%26filename%3Dtren20.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22ffacbb318b7aff7e635b596b8e13e9bbe3c32051c913e9fb7b0a325b5ef23624%22%7D&amp;vsid=ffacbb318b7aff7e635b596b8e13e9bbe3c32051c913e9fb7b0a325b5ef23624"></iframe>'
//            ],
//            [
//                'id' => 22, 'title' => 'Тренировка №21', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/pn92jn6crrawey2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2021.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX18Ay-xocOm_JpeOSQCff2J7WZJyvYV3Gye1_86IwD6qjy-thUT0Zri9pS6uAUbarHvk1DsEzMfFdhPOYdaP7qDOF64Z75FxWhRhhupIh2n5KuESRsWpWvk_bMIGZXTo5sYlTivb2TU-QIMWqq9rmV8uKI8DL4AXcZFdh1a8l0vAguTSRqzSXjKpFhFmacH4KDD-KI-aGOvHpP1KFBHrQpiWklzyW9jh_Npe7czMgIuEVkXaEUb-VyyfoeWM3WbxeghS_Vt50aMi9VOpjTmiVoCl7zk5smEVVHaEqDEWdPCny46S6y1husTm%2F591c74d7960e8%2Fd2ddebb868f4bb37566f55a411f3c7958466fdde52ddcdbc66afcafc9f454807%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F4c89ab311cb20b978e897d969d869abd03badffbfb77fb57403817492754b02a%2F5d6f7ee3%2FrL1NR6J3gOxs8GU4bcgSwgCtKnKOINCZtLBly2hgogXOhyohav8GfyUUf0f_zVIQKGFCWjabjnoc0Zv5gJ7V4g%253D%253D%3Fuid%3D0%26filename%3Dtren21.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22060b4ab20b8361f68dc1503ed6cefccc1de5ff302c01b2aba79050220733dc3e%22%7D&amp;vsid=060b4ab20b8361f68dc1503ed6cefccc1de5ff302c01b2aba79050220733dc3e"></iframe>'
//            ],
//            [
//                'id' => 23, 'title' => 'Тренировка №22', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/08t1z68ixkdeayl/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2022.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX19Jy8uQTx3Q4ON3HZWjQ4WI5Tyn30am6DuOjaPd4t28rwenmyV2FlZImsIBC3BMv-nY7LxR7_qQsJ-3yszhQdEJ3Sgr2EvOO3jwWnIck6H1KkQI71XyoysnMoyS_jRYsKUFGWtewcTxmoTeJ5TilrkYEI59N72D9q4fKypnbbst77_ECrowp6cR8ioKySOH4c8gfYglhx4_MYS8GsXeIMQeuiVTmCa_-8TrROvjy_bfe3J7vfrSSgppZz2qNMwxkrVwlEuEmINiyC2glMr5CTRCxOLTxBkZ52OJTGbyQb0PeyzFhQnbYl7h%2F591c750a56bb8%2F5a68c7c2d33e2323b678ba6ea7892cb775d3ffc186c39183ea8dd3e59ab164df%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Fa810cd918b76f91bfc823bd5b8062bf615bd6f79e56f74e53462bb3fa65d2c24%2F5d6f7f18%2Ft08geidn_A_QiYXDqfgnhrO9wi1ZZTmTv0qd4niz2_IhE7mjIkyMkRtnmW78HYt92I-C_5WMDLqceKo1WZzIIQ%253D%253D%3Fuid%3D0%26filename%3Dtren22.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22945f133eb223affea7d9a190b64332c7c852d069c7b19f46b96f3ce909d22fd2%22%7D&amp;vsid=945f133eb223affea7d9a190b64332c7c852d069c7b19f46b96f3ce909d22fd2"></iframe>'
//            ],
//            [
//                'id' => 24, 'title' => 'Тренировка №23', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/df6zc32uxr5xmf2/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2023.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1_5fj-9txr-VPS4z_qsSJxMzSXR7QJ8m5wkC1zoZqNnE49P9Yevi2wYpeaKYNpynZgrUZeFcUZ1wDuiHjuCzTm4YXcdbosQQdccgWPld55TsHM1SE3khxhRGKsJeTq0DuqvBUj_qNbXUc92u2cCVr4maSL3WVzY-uRe5gy4zYNaMqmyUQp-mPguPq0ZUPVz_igGKkArRckKqrRMnipKjWtnJCgOUwFyqfr3CJXVUIJyZKpmrF0acBW52CuchVuKXE3n4o0DIr94Uie7W7r2MetEd_HjuPufSnnWy31BIESYo3fWOk_A5Jtn%2F591c752b43b00%2F2e0af9e246d75cbefc0185ddd0516d54fe4be2f13bd19ce068b823054f2e610f%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F2af3a148ba9f61f4a1414229817fb969dfbc98a084078004752e20bb30e7d9c4%2F5d6f7f3b%2FsY2WkkCwZUj1Jy-6LWFN3DcjBkKmoSDABhWXkh99CMiamD4K7vTgbFtxWKBu5tHiFI0qT-SToNXBq1seW8AFgw%253D%253D%3Fuid%3D0%26filename%3Dtren23.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22eb0ce03a3ba6a29b87b379fe1ce01deb8ff008d16a61dd417915f1a1c8e6b690%22%7D&amp;vsid=eb0ce03a3ba6a29b87b379fe1ce01deb8ff008d16a61dd417915f1a1c8e6b690"></iframe>'
//            ],
//            [
//                'id' => 25, 'title' => 'Тренировка №24', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/jhku7qwt12zwsg8/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2024.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1-5qtZZdCxSJwItQLwvP6qc0hX3UblGH4_Bqy-ZKsOTCaL8-5mqiP1zdd5CwUTIwrOgUJqVL0rZWymkMAWf09detmypZsnDegIX8b1Clxtlzvc09ug202JOkdQBZ18rm2ZY1mOt_2tbweFcUG3zKlkMWOVsQIcxeE-crawH8tHhI75UY3JHJwEC5WWtEPRRLAednlfFIzgBV0onDtqEdrn3VHuKP6mX7R82w7bHYR7Rb-D6uVxPxdNrdPvmVVKhDQAg1Uu6BpBlIS2L5wpHi51hz78xmu1axOP6Wqdq5NGwnyi7llSo8r-8%2F591c754c84df0%2Ff1f44fd55ae43c4c072b9b4b5b6b06b93aa19049582ad3bf0c009e8624b339a6%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2F16b438051d086e1d6beda105efe7c498cac6340ea770d7986b47032b5cc29fb6%2F5d6f7f5e%2FhO4Fb5B86uLhzeofDMrq7haX6gHFdBeQ2QkdkjbFjZy-J3ifS5cgeDkIoSxg9mOE02UwhOW2BYMnwafPkgRYKA%253D%253D%3Fuid%3D0%26filename%3Dtren24.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22d3d80dbf7149808a727fee21b27b4c5c3298b954fa4243c890ff0c3008fb7855%22%7D&amp;vsid=d3d80dbf7149808a727fee21b27b4c5c3298b954fa4243c890ff0c3008fb7855"></iframe>'
//            ],
//            [
//                'id' => 26, 'title' => 'Тренировка №25', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/ak5pig7gemfopua/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2025.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX196Tm7xtKlMMX_3oNgzYzur_JA5MOvmo7Jb_F0hqRbXyAPWWToDI8UwJlfMyozAOpcYxP3msZr5__SS52OBJqags8O3uFrLm9cqOHELg_Zk6OOE_8ieKTzOtRoZifvWhu5NEm86SXoHWCwFge2ZqfL3DrTrJPpgsVxCsfJrpxOoAUHgm88KAukJzuDxjuQC0_VM2lFZKFwCEEbnyY2QPPL25f4zwzwxFa25BQu33pq31HfkYgkdIWtjlhh1MVbuLenQ6GIMLp_c06qUVWVhOQL2CwtL7Qd1sJyoKi79cN5zO__zx7lNeUix%2F591c756783c28%2Fb83b5bb2dee752d61b6e0d8f5db1953981e47cb695385efcfddca1c16f8d4b49%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Ff4c6add70108f980c94c90399d24b7c5bc187422683c413ff1f2753818e6b955%2F5d6f7f7a%2F0tJZleNtTgEltyQgabZuREIEE8sxiKXuMsFV6eWTGK30uwn6lYALNSXsw9I4033yWcC62N8DX3aGRSVr4cV_Xg%253D%253D%3Fuid%3D0%26filename%3Dtren25.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22e7c711afd42ec9da427fa7fd93f54d322dfa7ad043ebc0e5f3600735f12f0c64%22%7D&amp;vsid=e7c711afd42ec9da427fa7fd93f54d322dfa7ad043ebc0e5f3600735f12f0c64"></iframe>'
//            ],
//            [
//                'id' => 27, 'title' => 'Тренировка №26', 'icon' => 'fa fa-running', 'color' => 'teal',
//                'url_viedo' => null,
//                'url_file' => 'https://www.dropbox.com/s/xtgfxjhll17sooq/%D0%A2%D1%80%D0%B5%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0%2026.pdf?dl=1',
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX18_WKkfzdKaypKc55yx7EJH8RwKVDK1zcTAjN-YUPMKAmSIuJUCiFgg58PgyTeLBmvKKrFs4G9p_qr-yIbRWd-0yXi7a9XEdSHS3-WoHjzJzixjy502n5bmAe6h7HD4fMYE0JLSbSCObN3F2Nn8V8ulgNPDP8qA7OEv33BF91fnQ3gptOArMuMbU-yIUc5w_QKAgnjs4_3HZj-_MqGEa4lsl_Ntfg2k3biJDHSQxgdjDOhV1Nc71gIM1CMmKDkciaCWfIoWh_UCfcdBMwPjZkjkcraEvavrtAMA4TI-suM0L8YG6RgwrsxV%2F591bedc623a40%2Faaeee68ac8372980f0468a467de713ffd1b777e1f51e5f27a5432a4fd5a699ab%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Fd8b9a7bf5b5f99661834dc1234dc1a4b2d0c15d9aa32b7abefe5a544ef95191b%2F5d6ef142%2F8-O1kjl0eZlEiX1An1niEkSggIpJCi9Udd9LiqnFwR5YwPNNW6MAm2bQ5clKKO_JvYI1umrBJDsCcSZQxHJHxw%253D%253D%3Fuid%3D0%26filename%3Dtren26.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22b01249f9261f9b3c7ca07147ac48883ff876d43f8b4ccf1efe800de8251fa665%22%7D&amp;vsid=b01249f9261f9b3c7ca07147ac48883ff876d43f8b4ccf1efe800de8251fa665"></iframe>'
//            ],
//            [
//                'id' => 28, 'title' => 'Раcтяжка', 'icon' => 'fa fa-burn', 'color' => 'blue',
//                'url_viedo' => null,
//                'url_file' => null,
//                'yadisk' => '<iframe scrolling="no" allowfullscreen="" gesture="media" allow="autoplay; encrypted-media" style="width: 100%; height: 350px; border-width: 0px; display: block;" src="https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-573/index.html?post_message_config=true&amp;stream_url=https%3A%2F%2Fstreaming.disk.yandex.net%2Fhls%2FU2FsdGVkX1_lWPc8vgVDgL0by7pWlLFlW4TQA865ilh5EndMDmdvfgf_PDKOtYqMwrAzX7QeX98JDa5-QLsuSLH7Xu_wvAy6_aDGzcJxJO7_xui5JOtOZ1U30JYFuSiF_BLLg2wR0W0VLj7ZipKrDTOTcZnUJVQqvDhK-cDkUUg47GBHIFl0f1LYyDBR18KBcCX1dhul2c5El9jmFbx3Y8oNFrTypV14j2GyLe7H4MiBzG43gOKxpkohlHwcdj9tnyKJUI4xnE0IXFXf4fnzJ_y9cvXpg4LHz4EYR1bucZBxGwGwt16da91US2LDCbAE%2F591c75bddfea0%2F92e961be724aa9b87a8dac6f46f76a06e297897c1c0705939b63cf05ab61f55e%2Fmaster-playlist.m3u8&amp;volume=100&amp;muted=false&amp;auto_quality=false&amp;report=false&amp;report_url=https%3A%2F%2Fyandex.ru%2Fsupport%2Fteletranslation%2Fform.html&amp;preview=https%3A%2F%2Fdownloader.disk.yandex.ru%2Fpreview%2Ffee8cc9c494bc9f6b0448bbac8450995a46a2899ce91bebaf1ca1a22df02132c%2F5d6f7fd4%2FS_aWmOuuzEMsWEZD-Gx-new5uDkyWJmSMGtkrlijyLVaj1RLn1I5b9pgiz6rp5LfMShnWrzCbISBzh7ONsJvpg%253D%253D%3Fuid%3D0%26filename%3Drastyazka.mov%26disposition%3Dinline%26hash%3D%26limit%3D0%26content_type%3Dimage%252Fjpeg%26owner_uid%3D0%26tknv%3Dv2%26size%3D1920x1080&amp;host=yadi.sk&amp;additional_params=%7B%22from%22%3A%22other%22%2C%22vsid%22%3A%22af8e88aa40515e2a627f71e8b3ddf318ee6ea7abaa6ce67f78b595b582ff505c%22%7D&amp;vsid=af8e88aa40515e2a627f71e8b3ddf318ee6ea7abaa6ce67f78b595b582ff505c"></iframe>'
//            ]
        ];
        return response()->json($result, 200, ['Content-Type' => 'application/json; charset=UTF-8'], JSON_UNESCAPED_UNICODE);
    }

    private function youtubeEmbed($link) {
        return '
            <div  style="width: 100%; height: 360px; position: relative;">
                <iframe src="' .$link .'"   width="100%" height="360" frameborder="0" scrolling="no" seamless="" allowfullscreen="1"></iframe>
                <div class="hidedrive" style="width: 80px; height: 80px; position: absolute; opacity: 1; right: -5px; top: -5px;">&nbsp;</div>
            </div>';
    }
}
