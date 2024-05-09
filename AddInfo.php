<?php
require "Connect.php";

//Получаем инфу с html и записываем в json формате
$infoPosts = file_get_contents('https://jsonplaceholder.typicode.com/posts');
$posts = json_decode($infoPosts, true);
$sumOperationPosts = 0;

$infoCom = file_get_contents('https://jsonplaceholder.typicode.com/comments');
$comments = json_decode($infoCom, true);
$sumOperationComm = 0;

//Парсим полученные данные и заносим в бд
foreach ($posts as $key => $val) {
    $userId = $val['userId'];
    $id = $val['id'];
    $title = $val['title'];
    $body = $val['body'];

    $query = "INSERT INTO `posts` (`userId`, `id`, `title`, `body`) VALUES ('$userId', '$id', '$title', '$body')";
    mysqli_query($db, $query);
    $sumOperationPosts = $sumOperationPosts + 1;
}

foreach ($comments as $key => $val) {
    $postId = $val['postId'];
    $id = $val['id'];
    $name = $val['name'];
    $email = $val['email'];
    $body = $val['body'];

    $query = "INSERT INTO `comments` (`postId`, `id`, `name`, `email`, `body`) VALUES ('$postId', '$id', '$name', '$email', '$body')";
    mysqli_query($db, $query);
    $sumOperationComm = $sumOperationComm + 1;
}

//Вывод в консоль результат операций
print_r("Загружено " . $sumOperationPosts . " записей и " . $sumOperationComm . " комментариев");

//Это для работы в браузере в удобном веб-формате
header("Location: /pages/searchForm.php");