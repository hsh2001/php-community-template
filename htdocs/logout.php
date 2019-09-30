<?php
require_once "session.php";
set_session('user_id', 0);
Header("Location: /");
?>
