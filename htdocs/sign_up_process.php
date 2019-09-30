<?php
if (
  isset($_POST['id']) &&
  isset($_POST['pw']) &&
  isset($_POST['re-pw'])
) {
  // 값이 정상적으로 있음.
  $id = $_POST['id'];
  $pw = $_POST['pw'];

  if ($pw !== $_POST['re-pw']) {
    print("비밀번호 일치 ㄴㄴ");
    die();
  }

  $pw = password_hash($pw, PASSWORD_DEFAULT);

  //비밀번호가 정상적으로 들어옴.
  $mysql = new mysqli("localhost", "root", "111111", "wb");

  $id = $mysql->real_escape_string($id);
  $pw = $mysql->real_escape_string($pw);

  $query = "SELECT * FROM user WHERE user_id='$id' LIMIT 1";
  $result = $mysql->query($query);

  if ($result->num_rows) {
    print("이미 그 아이디를 쓰고 있는 사용자가 있습니다.");
    die();
  }

  //아이디를 사용할 수 있는 상태임.
  $query = "INSERT INTO user (
    user_id, user_pw
  ) VALUES (
    '$id', '$pw'
  )";

  $mysql->query($query);

  print("가입 성공!");
} else {
  // 값이 비정상적임.
  print("잘못된 값입니다.");
  die();
}
?>
