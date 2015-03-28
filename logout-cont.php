<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['checked']);
header('Location: cont.php');
?>
