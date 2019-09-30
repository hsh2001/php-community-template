<?php
require_once "session.php";

if (
  isset($_POST['id']) &&
  isset($_POST['pw'])
) {
  // 값이 정상적으로 있음.
  $id = $_POST['id'];
  $pw = $_POST['pw'];

  //비밀번호가 정상적으로 들어옴.
  $mysql = new mysqli("localhost", "root", "111111", "wb");

  $id = $mysql->real_escape_string($id);
  $pw = $mysql->real_escape_string($pw);

  $query = "SELECT * FROM user WHERE user_id='$id' LIMIT 1";
  $result = $mysql->query($query);

  if (!$result->num_rows) {
    print("그런 아이디 없음.");
    die();
  }

  $user = $result->fetch_object();
  $pw_hash = $user->user_pw;
  $user_id = $user->id;

  if (!password_verify($pw, $pw_hash)) {
    print("비밀번호 틀림");
    die();
  }

  print("로그인 성공");
  set_session('user_id', $user_id);
  Header("Location: /");
} else {
  // 값이 비정상적임.
  print("잘못된 값입니다.");
  die();
}
?>
