<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div>
    Привет {{ $name }},
    <br>
    Спасибо за регистрацию на моём <a href="https://evgeniakabanova.com/" target="_blank">сайте</a>. Не забудь завершить регистрацию!
    <br>
    Пожалуйста кликни на ссылку чтобы подтвердить свой email:
    <br>
    <a href="{{ getenv('WEB_SITE').'/confirm/'.$verification_code}}">Подтвердить мой E-mail</a>
</div>
</body>
</html>