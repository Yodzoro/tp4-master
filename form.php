<?php
// J'insère les utilisateurs dans la base de données

$pdo = new PDO('sqlite:' . dirname(__FILE__) . '/base.db');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->query("CREATE TABLE  IF NOT EXISTS comments (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(200) NOT NULL,
    comment  TEXT NOT NULL
)");

$pdo->exec("PRAGMA busy_timeout = 2000;");//таймер на подключение

if (isset($_POST['username']) && isset($_POST['comment'])) {
    $username = htmlspecialchars($_POST['username']);
    $comment = htmlspecialchars($_POST['comment']);

    //взять данные из базы
    $statement = $pdo->prepare('SELECT * FROM comments WHERE username = :username AND comment = :comment');
    //bindValue - делаем связь между тем, что ввели и с valuers du base
    $statement->bindValue('username', $username, PDO::PARAM_STR);
    $statement->bindValue('comment', $comment, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch();

    //si user existe
    if ($user) {
        echo json_encode(['status' => 'error', 'message' => 'This user with this comment already exist']);
    } else {
        // Insert the new user into the database
        $statement = $pdo->prepare('INSERT INTO comments (username, comment) VALUES (:username, :comment)');

        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->bindValue(':comment', $comment, PDO::PARAM_STR);
        $statement->execute();

        echo json_encode(['status' => 'success', 'message' => 'User and comment added']);
    }
}

/*
$mysql = new mysqli('localhost', 'root', '', 'test');
$mysql->query("CREATE TABLE  IF NOT EXISTS comments (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(200) NOT NULL,
    comment  TEXT NOT NULL
)");

$mysql->query("INSERT INTO `comments` (`id`, `username`, `comment`) VALUES (NULL, '".$_POST['username']."', '".$_POST['comment']."')");
*/
