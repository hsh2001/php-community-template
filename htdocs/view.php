<?php
require_once "session.php";

$user_id = get_session('user_id');

if (!$user_id) {
  // 로그인 하지 않은 상황
  print("로그인 안하면 글 못봄 ㅅㄱ");
  die();
}

if (!isset($_GET['id'])) {
  print("무슨 글을 보겠다는거임?");
  die();
}

$topic_id = (int) $_GET['id'];
$mysql = new mysqli("localhost", "root", "111111", "wb");

$query = "SELECT
            topic.title,
            topic.description,
            user.user_id AS author
          FROM topic
          LEFT JOIN user
          ON user.id=topic.author
          WHERE topic.id=$topic_id
          LIMIT 1";
$result = $mysql->query($query);

if (!$result->num_rows) {
  print("그런 글 없음.");
  die();
}

$topic = $result->fetch_object();
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>
      제목:
      <?php
        echo $topic->title;
       ?>
    </h2>
    <p>
      작성자: <?php echo $topic->author; ?>
    </p>
    <p>
      본문:
      <?php
        echo $topic->description;
      ?>
    </p>
    <a href="/">메인 화면으로</a>
  </body>
</html>
