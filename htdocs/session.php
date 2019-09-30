<?php
function get_session($name) {
  if (!session_id()) session_start();
  if (isset($_SESSION[$name])) {
    return $_SESSION[$name];
  }
  return false;
}

function set_session($name, $value) {
  if (!session_id()) session_start();
  $_SESSION[$name] = $value;
  return $value;
}
 ?>
