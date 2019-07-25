<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PaymentController extends Controller
{
    public function notify() {
        $secret_key = 'cX8NDkKhU1izhxXlnfhDEmFr'; // секретное слово, которое мы получили в предыдущем шаге.

        // возможно некоторые из нижеперечисленных параметров вам пригодятся
        // $_POST['operation_id'] - номер операция
        // $_POST['amount'] - количество денег, которые поступят на счет получателя
        // $_POST['withdraw_amount'] - количество денег, которые будут списаны со счета покупателя
        // $_POST['datetime'] - тут понятно, дата и время оплаты
        // $_POST['sender'] - если оплата производится через Яндекс Деньги, то этот параметр содержит номер кошелька покупателя
        // $_POST['label'] - лейбл, который мы указывали в форме оплаты
        // $_POST['email'] - email покупателя (доступен только при использовании https://)

//        $sha1 = sha1( $_POST['notification_type'] . '&'. $_POST['operation_id']. '&' . $_POST['amount'] . '&643&' . $_POST['datetime'] . '&'. $_POST['sender'] . '&' . $_POST['codepro'] . '&' . $secret_key. '&' . $_POST['label'] );

        $order = new Payment();
        $order->notification_type = Input::get('notification_type');
        $order->operation_id = Input::get('operation_id');
        $order->amount = Input::get('amount');
        $order->currency = Input::get('currency');
        $order->date = Input::get('datetime');
        $order->sender = Input::get('sender');
        $order->codepro = Input::get('codepro');
        $order->label = Input::get('label');
        $order->sha1hash = Input::get('sha1_hash');
        $order->email = Input::get('email');
        $order->save();


        $sha1 = sha1(
            $order->notification_type. '&' .
            $order->operation_id. '&' .
            $order->amount. '&'.
            $order->currency.'&' .
            $order->date. '&' .
            $order->sender. '&' .
            $order->codepro. '&' .
            $secret_key. '&' .
            $order->label
        );

        $order->yandex_string;
        $order->sha1hash_server = $sha1;

        if ($sha1 != $order->sha1hash) {
            $order->errors = 'Sha1 Hash not correct; ';
            $order->save();
        } else {
            $order->errors = 'OK';
            $order->save();
        }


        return response()->json(200);

        if ($sha1 != $_POST['sha1_hash'] ) {
            // тут содержится код на случай, если верификация не пройдена
            exit();
        }

// тут код на случай, если проверка прошла успешно

        exit();

    }
}
