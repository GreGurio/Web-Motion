<!doctype html>
<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> </title>
<link type="text/css" rel="stylesheet" href="../css/reset.css" media="all" />
<link type="text/css" rel="stylesheet" href="../css/style.css" media="all" />
</head>
<body>


<?php
    $name = $_POST['form-name'];
    $phone = $_POST['form-phone'];
    $email = $_POST['form-mail'];
    $question = $_POST['form-text'];

    $mysql = new mysqli('localhost', 'root', '12345678', 'web-motion');

   echo '<div class="success-wrapper">
    <div class="container">
        <div class="message">
            <div class="text">';

    if ($mysql->connect_error) {
        echo "Нет подключения к БД. Ошибка:".mysqli_connect_error();
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "Неправильно введена пошта";
    } else {
        echo "Форма успішно відправлена";
        $mysql->query("INSERT INTO `users` (`name/surname`, `phone_num`, `email`, `question`) VALUES('$name', '$phone', '$email', '$question')");
    }

    echo '</div>
    </div>
    </div>
    </div>';
    
    $mysql->close();
    header('Refresh: 5; url=../contacts.html');
?>