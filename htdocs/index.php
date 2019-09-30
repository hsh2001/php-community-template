<?php

require_once "session.php";
$user_id = get_session('user_id');

if ($user_id) {
  // 글 가져오기
  $topic_list = '';
  $mysql = new mysqli("localhost", "root", "111111", "wb");
  $query = "SELECT * FROM topic ORDER BY id DESC";
  $result = $mysql->query($query);

  while ($topic = $result->fetch_object()) {
    $topic_list .= "<p><a href=\"view.php?id=$topic->id\">$topic->title</a></p>";
  }
}

?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>WB</title>
  </head>
  <body>
    <?php if ($user_id) { ?>
    <p>
      <a href="write.php">글쓰기</a>
      /
      <a href="logout.php">로그아웃</a>
    </p>
    <?php
      echo "<hr><div>$topic_list</div>";
    } else { ?>
    <form action="login.php" method="post">
      <h2>로그인</h2>
      <input type="text" name="id" placeholder="ID">
      <br>
      <input type="text" name="pw" placeholder="PW">
      <br>
      <input type="submit">
    </form>
    <p>
      <a href="sign_up.php">회원가입하기</a>
    </p>
    <?php } ?>
  </body>
</html>
