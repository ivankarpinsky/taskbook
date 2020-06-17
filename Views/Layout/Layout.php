<? $user = unserialize($_COOKIE['user']) ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Задачник</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet" type="text/css">

    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/main.js"></script>
</head>
<body>
<header class="header">
    <? if (!$user): ?>
        <a href="/auth">
            <div class="authorize">authorize</div>
        </a>
    <? else: ?>
        <a href="/auth/logout">
            <div class="authorize">log out</div>
        </a>
    <? endif; ?>
</header>

<div class="body">
    <?= $body ?>
</div>
</body>
</html>