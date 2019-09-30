<?php
require_once "session.php";

$user_id = get_session('user_id');

if (!$user_id) {
  // 로그인 하지 않은 상황
  print("로그인 안하면 글 못씀 ㅅㄱ");
  die();
}

if (
  isset($_POST['title']) &&
  isset($_POST['description'])
) {
  // 값이 정상적으로 있음.
  $title = $_POST['title'];
  $desc = $_POST['description'];

  //비밀번호가 정상적으로 들어옴.
  $mysql = new mysqli("localhost", "root", "111111", "wb");

  $title = $mysql->real_escape_string($title);
  $desc = $mysql->real_escape_string($desc);

  $query = "INSERT INTO topic (
    title, description, author
  ) VALUES (
    '$title', '$desc', $user_id
  )";
  $mysql->query($query);

  Header("Location: view.php?id=$mysql->insert_id");
} else {
  // 값이 비정상적임.
  print("잘못된 값입니다.");
  die();
}
?>
