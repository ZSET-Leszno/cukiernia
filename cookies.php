<?php
session_start();
$cookiename = 'Sesja';
$cookieval = $_SESSION['cookieval'];
setcookie($cookiename,$cookieval,time() + 3600, "/");

switch($_COOKIE[$cookiename]) {
    case 0:
        header('Location: misja1.php');
        break;
    case 1:
        header('Location: misja2.php');
        break;
    case 2:
        header('Location: misja3.php');
        break;
    case 3:
        header('Location: misja4.php');
        break;
    case 4:
        header('Location: misja5.php');
        break;
}
?>