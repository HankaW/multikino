<?php
session_start();
setcookie("zalogowany", "0", time() - 3600, "/");
setcookie("id", "0", time() - 3600, "/");


 $params = session_get_cookie_params();
 setcookie(session_name(), ' ', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
 session_destroy();

 session_start();
header("Location: multikino.php?warning=5")
?>