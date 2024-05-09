<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Тестовое задание</title>
</head>
<body>

<div class="form">
    <h3>Введите искомый комментарий</h3><!--Наша поисковая строка-->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"><!--То что в action - это адресация на текущую страницу-->
        <input type="text" name="query" class="inp_sk" style="">
        <input type="submit" name="submit" value="Найти" class="btn" style="width: 75px; height: 28px;">
    </form>

    <table border="1">
        <thead>
        <tr>
            <th>#</th>
            <th>Заголовок записи</th>
            <th>Комментарий</th>
        </tr>
        </thead>
        <tbody>
        <?php require "../Connect.php";
        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $query = $_POST['query'];
            if (!empty($query)) {
                //Тут позволяем пользователю ввести запрос начиная с букв верхнего и нижнего регистра потому-что:
                //НИКОГДА не доверяй пользователю
                if (preg_match("/[A-Za-z]+/", $query)) {
                    if (strlen($query) < 3) {
                        echo '<p>Вы ввели слишком короткий запрос</p>';
                    } else {
                        $queryComments = "SELECT `postId`, `body` FROM `comments` WHERE `body` LIKE '%$query%' ";

                        $Comments = mysqli_query($db, $queryComments);
                        $rowCom = mysqli_fetch_all($Comments);

                        foreach ($rowCom as $key => $comment) { //Парсим наши комменты и посты, чтобы можно было вывести их все
                            $queryPosts = "SELECT `title` FROM `posts` WHERE `id`='$comment[0]'";
                            $postsTitle = mysqli_query($db, $queryPosts);
                            $rowPosts = mysqli_fetch_all($postsTitle);

                            foreach ($rowPosts as $key => $title) {?>
                                <tr>
                                    <th><?=$comment[0]?></th>
                                    <th><?=$title[0]?></th>
                                    <th><?=$comment[1]?></th>
                                </tr>
        <?php }}}}} else { echo '<p>Ваш запрос пуст. Введите поисковой запрос.</p>'; }}?>

        </tbody>
    </table>
    <a href="add.php">Добавить информацию в базу данных</a>
</div>
</body>
</html>