<?php

namespace App\Source;

interface IMailerService
{
    /**
     * Отправка ссылки при регистрации
     * @param $mail_to
     * @param $name
     * @param string $headers
     * @param $token
     * @return mixed
     */
    public function EmailConfirmRegistration($mail_to, $name, $token, $headers = ''); //отправка почты для подтверждения регистрации

//    public function EmailResetPassword($mail_to, $headers = '', $token); //отправка почты для сброса пароля

    /** Отправка по почте обращения к разработчику
     * @param $mail_to
     * @param string $headers
     * @param $email
     * @param $comment
     * @return mixed
     */
//    public function NotifyNewFeedback($mail_to, $headers = '', $email, $comment);

}