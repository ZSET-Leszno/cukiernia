<?php
session_start();
$cookiename = 'Sesja';
$cookieval = $_SESSION['cookieval'];
setcookie($cookiename,$cookieval,time() + 3600, "/");

// switch($_COOKIE[$cookiename]) {
//     case 0:
//         echo "Zostaniesz przeniesiony do misji 1 $cookieval";
//         // header('Location: misja1.php');
//         break;
//     case 1:
//         echo "Zostaniesz przeniesiony do misji 2 $cookieval";
//         // header('Location: misja2.php');
//         break;
//     case 2:
//         echo "Zostaniesz przeniesiony do misji 3 $cookieval";
//         // header('Location: misja3.php');
//         break;
//     case 3:
//         echo "Zostaniesz przeniesiony do misji 4 $cookieval";
//         // header('Location: misja4.php');
//         break;
//     case 4:
//         echo "Zostaniesz przeniesiony do misji 5 $cookieval";
//         // header('Location: misja5.php');
//         break;
// }

if ($cookieval == 0) {
    header('Location: misja1.php');
} elseif ($cookieval == 1) {
    header('Location: misja2.php');
} elseif ($cookieval == 2) {
    header('Location: misja3.php');
} elseif ($cookieval == 3) {
    header('Location: misja4.php');
} elseif ($cookieval == 4) {
    header('Location: misja5.php');
} elseif ($cookieval == 5) {
    header('Location: misja6.php');
} elseif ($cookieval == 6 or $cookieval == 7) {
    header('Location: misja7.php');
}
?>