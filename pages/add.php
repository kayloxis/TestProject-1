<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Добавление</title>
</head>
<body>
<div class="add_sk">

    <form action="../AddInfo.php" method="post"><!--Форма на добавление информации в бд. Просто чтобы было удобнее-->
        <button type="submit" class="btn" style="width: 225px; height: 28px;">Добавить информацию</button>
    </form>

    <h2>Предупреждение!!!</h2><!--ЭТО ОБЯЗАТЕЛЬНО. Иначе ошибки-->
    <h3>Если вы уже нажимали на кнопку выше, не стоит это делать повторно ;)</h3>

    <a href="searchForm.php">Вернуться к поиску</a>
</div>
</body>
</html>