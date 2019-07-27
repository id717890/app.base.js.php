<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div>
    Привет {{ $name }},
    <br>
    Ты запросил восстановление пароля на моём <a href="https://evgeniakabanova.com/" target="_blank">сайте</a>.
    <br>
    Для продолжения восстановления пароля кликни на ссылку:
    <br>
    <a href="{{ getenv('WEB_SITE').'/reset/'.$reset_code}}">Восстановить пароль</a>
</div>
</body>
</html>