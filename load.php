<?php

// Je charge les commentaires par 3


include 'form.php';
//$page мы получаем из запроса GET в JavaScript.
// Каждый раз, когда вы нажимаете кнопку, мы увеличиваем $page на 1.
//Это позволяет нам определить смещение ($offset) для SQL запроса.
$page = isset($_GET['page']) ? $_GET['page'] : 0;//если page существет, то мы получаем page, иначе 0
$limit = 3;//лимит комментов
$offset = $page * $limit;//page = 1, если она есть, а нам надо показать 3 коммента, а не 1

//считаем сколько записей у нас есть
$query = $pdo->prepare("SELECT COUNT(*) as total FROM comments");
$query->execute();
$result = $query->fetch();
$totalComments = $result['total'];

//если было сделано больше запросов на показ комментариев,
//а комментариев не осталось, отправляем ошибку
if ($offset >= $totalComments) {
    echo 'No more comments';
    exit();
}

//достаем из базы комменты.
//Если же комментарии еще есть, то мы отправляем следующие $limit комментариев.
$query = $pdo->prepare("SELECT * FROM comments LIMIT :limit OFFSET :offset");
$query->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
$query->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
$query->execute();
$donne = $query->fetchAll();

foreach ($donne as $comments) {
    echo '<article>';
    echo '<p class="name_af">' . $comments['username'] . '</p>';
    echo '<p class="com_af">' . $comments['comment'] . '</p>';
    echo '</article>';
}


/*
 * для обычного отображения
include 'form.php';
//считаем сколько всего у нас есть записей
$query = $pdo->prepare("SELECT COUNT(*) as total FROM comments");
$query->execute();
$result = $query->fetch();
$totalComments = $result['total'];
//echo '<p>Total number of comments : ' . $totalComments . '</p>';
$donne = $pdo->query('SELECT * FROM comments')->fetchAll();
//donne - 1 cellule avec username et comment
foreach ($donne as $comments) {
    echo '<article>';
    echo '<p id="name_af">' . $comments['username'] . '</p>';
    echo '<p id="com_af">' . $comments['comment'] . '</p>';
    echo '</article>';
}
*/
/*
 * что было изначально
$pagination = $_GET['page'];

$mysql = new mysqli('localhost', 'root', '', 'test');
*/