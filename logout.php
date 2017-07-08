<?php
session_destroy();
unset($_SESSION['name']);
unset($_SESSION['username']);
header('Location: index.html');
exit;
//readfile("C:/xampp/htdocs/xampp/index.html");




?>
