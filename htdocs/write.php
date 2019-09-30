<?php
require_once "session.php";

$user_id = get_session('user_id');

if (!$user_id) {
  // 로그인 하지 않은 상황
  print("로그인 안하면 글 못씀 ㅅㄱ");
}
?>


<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>WB 글쓰기</title>
  </head>
  <body>
    <form action="write_process.php" method="post">
      <h2>글쓰세요 ^^</h2>
      <input type="text" name="title" placeholder="TITLE">
      <br>
      <br>
      <textarea name="description" placeholder="DESC"
       rows="8" cols="80"></textarea>
      <br>
      <input type="submit">
    </form>
  </body>
</html>
